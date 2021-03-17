<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\BBBController;
use App\Http\Controllers\Controller;
use App\Model\Meeting\Meet;
use App\Model\Organizer\Client;
use App\Model\Organizer\ClientMeta;
use App\Model\Organizer\Organizer;
use App\Services\Logdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClassController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function classWebinar(){

        $user = auth()->user();
        $meetings=Meet::where('user_id',$user->id)->orderByRaw('id DESC')->paginate(15);
        return view('meeting.meet',compact('meetings','user'));
    }
    public function classWebinarEdit($id, Logdb $logdb){
        $user = auth()->user();
        if($id==='0'){
            $id='new';
        }
        if($id=='new'){
            $meet=new Meet();
            if(request()->has('title')) {
                $this->validate(request(), [
                    'title' => 'required',
                    'signUpKind' => 'required|integer',
                    'maxUser' => 'required|integer|min:5',
                    'clength' => 'required|integer',
                    'openTime' => 'required',
                    'closeTime' => 'required',
                    'start_at' => 'required',
                    'logo' => 'mimes:jpeg,png,jpg,gif',
                ]);

                $startAt = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d H:i:s', request()->start_at.' 07:00:00');
                $meet->start_at=  \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d H:i:s', request()->start_at.' 07:00:00');
                if(request()->clength==1)
                    $meet->expired_at=  $startAt->addDays(7);
                elseif(request()->clength==2)
                    $meet->expired_at=  $startAt->addMonth();
                elseif(request()->clength==3)
                    $meet->expired_at=  $startAt->addYear();
                $meet->clength=request()->clength;
                $meet->maxUser=request()->maxUser;
                $meet->hash=$this->findHash($user->id);
                $price=env('USER_PRICE');
                if(request()->has('isActiveMic')){
                    $price =$price+env('USER_MIC');
                    $meet->isActiveMic=1;
                }
                if(request()->has('isActiveWebcam')){
                    $price =$price+env('USER_WC');
                    $meet->isActiveWebcam=1;
                }
                if(request()->has('isActiveHalfPrice')){
                    $price =$price+env('USER_HALF_PRICE');
                    $meet->isActiveHalfPrice=1;
                }
                $price=$price*request()->maxUser;
                if(request()->clength==1) {
                    $price=$price/3;
                }elseif(request()->clength==3)
                    $price=$price*11;

                if(request()->has('isActiveRecording')){
                    $price =$price+env('USER_REC');
                    $meet->isActiveRecording=1;
                }
                $meet->price=ceil($price/1000)*1000;
                $meet->user_id=$user->id;
                $logdb->sendLog('ORGANIZER_CREATE_CLASS','کاربر  کلاس جدید ساخت',$user->id);

            }else{
                $meet->openTime = '07:00';
                $meet->closeTime = '23:00';
                $meet->start_at = date('Y/m/d');
                $meet->maxUser = 25;
                $meet->isActiveMic = 1;
                $meet->clength = 2;
            }
        }else{
            $meet=Meet::where('user_id',$user->id)->where('hash',$id)->firstOrFail();
        }
        if(request()->has('title')) {
            $this->validate(request(), [
                'title' => 'required',
                'signUpKind' => 'required|integer',
                'openTime' => 'required',
                'closeTime' => 'required',
                'logo' => 'mimes:jpeg,png,jpg,gif',
            ]);
            $meet->title = request()->title;
            $meet->description = request()->description;
            $meet->openTime = request()->openTime;
            $meet->closeTime = request()->closeTime;
            $meet->signUpKind = request()->signUpKind;
            if (request()->has('logo')) {
                $photoName = time() . '-' . uniqid() . '.' . request()->logo->getClientOriginalExtension();
                request()->logo->move(public_path('myup'), $photoName);
                $photoName = '/myup/' . $photoName;
                $meet->logo = $photoName;
            }
            $meet->save();
            $logdb->sendLog('ORGANIZER_CHANGE_CLASS_SETTING','کاربر تنظیمات کلاس را ویرایش کرد',$user->id);
            return redirect(route('orgClass'))->with(['success' => __('info.saveChange')]);

        }
        return view('meeting.meetEdit',compact('meet','user','id'));

    }
    private function findHash($user){
        $num=uniqid();
        return substr(md5($num), 0, 5);

    }
    public function addUser(){
        $user = auth()->user();
        if(request()->has('name')) {
            $this->validate(request(), [
                'name' => 'required',
                'password' => 'required',
                'username' => 'required',
                'logo' => 'mimes:jpeg,png,jpg,gif',
            ]);
            $client=Client::firstOrNew([
                'username'=>request()->username,
                'organizer_id'=>$user->Organizer->id,
            ]);
            $client->name=request()->name;
            $client->password= Hash::make(request()->password);
            if(request()->has('role'))
                $client->role=request()->role;
            $client->save();
            if(request()->has('class')){
                if(Meet::where('user_id',$user->id)->where('hash',request()->class)->first()) {
                    $meetClass = ClientMeta::firstOrNew([
                        'client_id'=>$client->id,
                        'meta_key'=>'meet',
                        'meta_value'=>request()->class,
                    ]);
                    $meetClass->save();
                    if($client->role==0)
                        return redirect(route('orgClassStudent',request()->class))->with(['success' => __('info.saveChange')]);
                    else
                        return redirect(route('orgClassTeacher',request()->class))->with(['success' => __('info.saveChange')]);
                }
            }
            //TODO: edit redirect

            return redirect(route('orgClassEdit',request()->class))->with(['success' => __('info.saveChange')]);

        }
        return redirect()->back();
    }
    public function classStudentEdit($id, Logdb $logdb){
        $user = auth()->user();
        $meet=Meet::where('user_id',$user->id)->where('hash',$id)->firstOrFail();
        $clients=Client::where('organizer_id',$user->Organizer->id)->where('role',0)->get();
        $clientsId=Client::where('organizer_id',$user->Organizer->id)->where('role',0)->get()->pluck('id');
        $clientInClass=ClientMeta::whereIn('client_id',$clientsId)->where('meta_key','meet')->where('meta_value',$id)->get();
        $clientInClassId=ClientMeta::whereIn('client_id',$clientsId)->where('meta_key','meet')->where('meta_value',$id)->get()->pluck('client_id');
        $otherClient=Client::where('organizer_id',$user->Organizer->id)->where('role',0)->whereNotIn('id',$clientInClassId)->get();

        return view('meeting.classStudentEdit',compact('meet','user','clients','clientInClass','otherClient'));

    }
    public function changeUser($action,$id){

        $user = auth()->user();
        $meet=Meet::where('user_id',$user->id)->where('hash',$id)->first();
        if(!$meet){
            return json_encode(array('result'=>'nok','msg'=>__('info.classNotFound')));
        }
        if($action=='remove'){
            if(request()->has('client')) {
                ClientMeta::where('client_id',request()->client)->where('meta_key','meet')->where('meta_value',$id)->delete();
            }
        }
        if($action=='add'){
            if(request()->has('client')) {
                $client=ClientMeta::firstOrNew([
                    'client_id'=>request()->client,
                    'meta_key'=>'meet',
                    'meta_value'=>$id
                ]);
                $client->save();
            }
        }
        return json_encode(array('result'=>'ok','msg'=>__('info.saveChange')));

    }
    public function classTeacherEdit($id, Logdb $logdb){
        $user = auth()->user();
        $meet=Meet::where('user_id',$user->id)->where('hash',$id)->firstOrFail();
        $clients=Client::where('organizer_id',$user->Organizer->id)->where('role',1)->get();
        $clientsId=Client::where('organizer_id',$user->Organizer->id)->where('role',1)->get()->pluck('id');
        $clientInClass=ClientMeta::whereIn('client_id',$clientsId)->where('meta_key','meet')->where('meta_value',$id)->get();
        $clientInClassId=ClientMeta::whereIn('client_id',$clientsId)->where('meta_key','meet')->where('meta_value',$id)->get()->pluck('client_id');
        $otherClient=Client::where('organizer_id',$user->Organizer->id)->where('role',1)->whereNotIn('id',$clientInClassId)->get();

        return view('meeting.classTeacherEdit',compact('meet','user','clients','clientInClass','otherClient'));

    }
    public function changeTeacher($action,$id){

        $user = auth()->user();
        $meet=Meet::where('user_id',$user->id)->where('hash',$id)->first();
        if(!$meet){
            return json_encode(array('result'=>'nok','msg'=>__('info.classNotFound')));
        }
        if($action=='remove'){
            if(request()->has('client')) {
                ClientMeta::where('client_id',request()->client)->where('meta_key','meet')->where('meta_value',$id)->delete();
            }
        }
        if($action=='add'){
            if(request()->has('client')) {
                $client=ClientMeta::firstOrNew([
                    'client_id'=>request()->client,
                    'meta_key'=>'meet',
                    'meta_value'=>$id
                ]);
                $client->save();
            }
        }
        return json_encode(array('result'=>'ok','msg'=>__('info.saveChange')));

    }
    public function quickLogin($id){
        $user = auth()->user();
        $meet=Meet::where('user_id',$user->id)->where('hash',$id)->firstOrFail();
        $bbb=new BBBController();
        $url =$bbb->joinRoomAdmin($meet,$user->name);
        return view('iframe',compact('url'));
        return redirect()->intended($url);

    }
}
