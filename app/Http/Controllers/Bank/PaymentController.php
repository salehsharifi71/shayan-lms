<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Model\Bank\Payment;
use App\Model\Bank\Transaction;
use App\Model\Meeting\Meet;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function makePayment($kind,$id=null){
        $payment=new Payment();
        $user = auth()->user();
        if($kind==1){
            $meet=Meet::where('user_id',$user->id)->where('hash',$id)->firstOrFail();
            $payment->inv_id=$meet->id;
            $payment->amount=$meet->price;
        }
        $payment->kind=$kind;
        $payment->user_id=$user->id;
        $payment->save();

        return $this->startZarinPal($payment);
    }
    public function startSEP($payment){
        $sep_MID	 		= "11006932";						// کد پذیرنده
        $sep_Amount 		= $payment->amount*10;							// قیمت به ریال
        $sep_ResNum 		= $payment->id;							// شماره سفارش
        $sep_RedirectURL 	= route('callbackSaman');	// لینک برگشت و برسی نتیجه تراکنش
        return '


<form action="https://sep.shaparak.ir/payment.aspx" method="post">
	<input type="hidden" name="Amount" value="'.$sep_Amount.'" />
	<input type="hidden" name="ResNum" value="'.$sep_ResNum.'">
	<input type="hidden" name="RedirectURL" value="'.$sep_RedirectURL.'"/>
	<input type="hidden" name="MID" value="'.$sep_MID.'"/>
	<input type="submit" name="submit_payment" value="انتقال به درگاه پرداخت" class="Sep-submit"/>
</form>

<script type="text/javascript">window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>';
    }

    public function callbackSaman(){
//        return $_POST;
//        return 1;
        if(isset($_POST['State']) && $_POST['State'] == "OK") {
//return $_POST;
            $soapclient = new \SoapClient('https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL');
            $res = $soapclient->VerifyTransaction($_POST['RefNum'], $_POST['MID']);
//            return $res;
            if( $res <= 0 ) {
                $error="";
            } else {
                if(!payment::where('ref',$_POST['RefNum'])->first()) {


                    $payment = payment::where('id', $_POST['ResNum'])->firstOrFail();

                    $user = $payment->user;

                    if($res==$payment->amount*10) {

                        $payment->status = 100;
                        $payment->card = $_POST['SecurePan'];
                        $payment->ref = $_POST['RefNum'];
                        $payment->gateway = 'سامان';
                        $payment->save();
                        $user->credit = $user->credit + $payment->amount;
                        $user->save();

                        $transaction = new Transaction();
                        $transaction->user_id = $user->id;
                        $transaction->amount = $payment->amount;
                        if($payment->kind==1) {
                            $transaction->description = "فعال سازی کلاس";
                            $meet=Meet::where('id',$payment->inv_id)->first();
                            if($meet->status==0)
                                $meet->status=10;
                            else{
                                $meet->status=10;
                                if($meet->clength==1)
                                    $meet->expired_at=  $meet->expired_at->addDays(7);
                                elseif($meet->clength==2)
                                    $meet->expired_at=  $meet->expired_at->addMonth();
                                elseif($meet->clength==3)
                                    $meet->expired_at=  $meet->expired_at->addYear();
                            }
                            $meet->save();
                        }else
                            $transaction->description = "افزایش اعتبار ";
                        $transaction->kind = 1;
                        $transaction->save();
                        $text=__('info.successPayment');

                    }
                }
            }

        }
        if(!isset($text))
            $text=__('info.cancelPayment');


        return view('payment.result',compact('text'));

    }
    public function startZarinPal($payment){

        $MerchantID = '1d86c271-a4ea-412c-88e8-672f6a183bd2'; //Required
        $Amount = $payment->amount; //Amount will be based on Toman - Required
        $Description = $payment->User->name; // Required
        $Email = $payment->User->email; // Optional
        $Mobile = ''; // Optional
        $CallbackURL = route('callbackZarinPal');; // Required


        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            $payment->stb=$result->Authority;
            $payment->save();
            return redirect('https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
        } else {
            return 'ERR: '.$result->Status;
        }
    }
    public function callbackZarinPal(){
//        return $_POST;
//        return 1;
        if(isset($_GET['Authority'])&&isset($_GET['Status']) && $_GET['Status'] == "OK") {
            $Authority = $_GET['Authority'];
            $MerchantID = '1d86c271-a4ea-412c-88e8-672f6a183bd2';

            $payment=Payment::where('stb',$Authority)->firstOrFail();

            $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $payment->amount,
                ]
            );

            if ($result->Status == 100) {

                $user=$payment->User;
                $payment->status = 100;
                $payment->card = '';
                $payment->ref = $result->RefID;
                $payment->gateway = 'زرین پال';
                $payment->save();

                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->amount = $payment->amount;
                if($payment->kind==1) {
                    $transaction->description = "فعال سازی کلاس";
                    $transaction->kind = 0;
                    $meet=Meet::where('id',$payment->inv_id)->first();
                    if($meet->status==0)
                        $meet->status=10;
                    else{
                        $meet->status=10;
                        $date=new Carbon($meet->expired_at);
                        if($meet->clength==1)
                            $meet->expired_at= $date->addDays(7);
                        elseif($meet->clength==2)
                            $meet->expired_at=  $date->addMonth();
                        elseif($meet->clength==3)
                            $meet->expired_at= $date->addYear();
                    }
                    $meet->save();
                }else {
                    $transaction->description = "افزایش اعتبار ";
                    $user->credit = $user->credit + $payment->amount;
                    $user->save();
                    $transaction->kind = 1;
                }
                $transaction->save();
                $text=__('info.successPayment');
            } else {
                $text= __('info.cancelPayment');
            }
        } else {
            $text= __('info.cancelPayment');
        }


        if(!isset($text))
            $text=__('info.cancelPayment');


        return view('payment.result',compact('text'));

    }

}
