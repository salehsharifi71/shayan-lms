<?php

namespace App\Http\Controllers;

use App\Model\Meeting\Demo;
use App\Model\Meeting\Meet;
use App\Model\Organizer\Packagesite;
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
            return redirect()->intended($bbb->joinRoom($meeting,'saleh'));

        return redirect()->intended($bbb->joinRoomAdmin($meeting,'saleh'));

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
            return redirect()->intended($bbb->joinRoomAdmin($meeting,$name[0]));
        }
        return view('demo');
    }
}
