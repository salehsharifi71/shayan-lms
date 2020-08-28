<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Model\Bank\Payment;
use App\Model\Bank\Transaction;
use App\Model\Meeting\Meet;
use App\User;
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
        return $this->startSEP($payment);
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

}
