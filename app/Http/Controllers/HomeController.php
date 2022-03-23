<?php

namespace App\Http\Controllers;

use App\Model\JoinRoom;
use App\Model\Meeting\Demo;
use App\Model\Meeting\HashMeeting;
use App\Model\Meeting\Meet;
use App\Model\Organizer\Packagesite;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        return view('home');
    }
    public function landing(){

        $price2=ceil((env('USER_PRICE')+env('USER_MIC')+env('USER_WC'))*50/1000)*1000;
        $price3=ceil((env('USER_PRICE')+env('USER_MIC')+env('USER_WC')+env('USER_HALF_PRICE'))*500/1000)*1000;
        $packages=[
            [
                'img'=>'icofont-gift',
                'title'=>__('info.landingPack1'),
                'price'=> 0,
                'isActiveMic'=>1,
                'isActiveWebcam'=>0,
                'isActiveHalfPrice'=>0,
                'maxUser'=>5,
            ],
            [
                'img'=>'icofont-rocket',
                'title'=>__('info.landingPack2'),
                'price'=>$price2,
                'isActiveMic'=>1,
                'isActiveWebcam'=>1,
                'isActiveHalfPrice'=>0,
                'maxUser'=>50,
            ],
            [
                'img'=>'icofont-diamond',
                'title'=>__('info.landingPack3'),
                'price'=>$price3,
                'isActiveMic'=>1,
                'isActiveWebcam'=>1,
                'isActiveHalfPrice'=>1,
                'maxUser'=>500,
            ],
        ];
//        return $packages;
//        $packages=Packagesite::where('isActive',1)->get();
        return view('welcome',compact('packages'));
    }
    public function page($slug){
        if($slug=='contact'){
            //TODO : send email
            if(request()->has('message')){
                $text='name : '. request()->name .'
email : '.request()->email.'
phone : '.request()->phone.'
subject : '.request()->subject.'
-------------------------

'.request()->message;

                $text=urlencode($text);
                $post = "https://api.telegram.org/bot142679334:AAESZv1iyhsdSpyjVs38wSU9IczcHzTYK3M/sendMessage?text=$text&chat_id=123969916";
                 file_get_contents($post);
                 return redirect(route('page','contact'))->with(['success'=>__('info.sendMessageSuccess')]);
            }
            return view('contact');
        }elseif($slug=='legal' ||$slug=='privacy' ){
            return view('page',compact('slug'));
        }else{
            return abort(404);
        }
    }
    public function salehgoto(){
        $meeting=Meet::where('id',1)->firstOrFail();
        $bbb=new BBBController();
        if(request()->has('user'))
            $url=$bbb->joinRoom($meeting,'saleh');

        $url=$bbb->joinRoomAdmin($meeting,'saleh');
        return view('iframe',compact('url'));

    }
    public function joinQuickRoom($hash){
        $jm=JoinRoom::where('hash',$hash)->firstOrFail();
        $url=$jm->url;
        return view('iframePrivate',compact('url'));

    }
    public function directAccess($hash){
        $meetHash=HashMeeting::where('hash',$hash)->where('isActive',1)->firstOrFail();
        $meet=Meet::where('id',$meetHash->meet_id)->firstOrFail();
        if($meetHash->user_id){
            $user=User::where('id',$meetHash->user_id)->firstOrFail();
            $name=$user->name;
        }else{
            $name=$meetHash->name;
        }
        if(strlen($name)<2){
            $name='مهمان';
        }
        $bbb=new BBBController();
//        return '<iframe=src="'.$bbb->joinRoomAdmin($meet,$name).'" width="100%" height="100%">';
        $url=$bbb->joinRoomAdmin($meet,$name);
        return view('iframe',compact('url'));
    }
    public function demo(){
        if(request()->has('email')){
            if($demo=Demo::where('email',request()->email)->first()){
                $demo->qty=$demo->qty+1;
                $demo->save();
            }else{
                $demo = Demo::firstOrNew([
                    'email'=>request()->email
                ]);
            }
            $demo->save();
            $meeting=Meet::where('id',1)->firstOrFail();
            $bbb=new BBBController();
            $name= explode('@',request()->email);
            $url=$bbb->joinRoomAdmin($meeting,$name[0]);
            return view('iframe',compact('url'));
            return redirect()->intended($bbb->joinRoomAdmin($meeting,$name[0]));
        }
        return view('demo');
    }
}
