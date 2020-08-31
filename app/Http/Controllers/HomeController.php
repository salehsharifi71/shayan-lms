<?php

namespace App\Http\Controllers;

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
        $packages=Packagesite::where('isActive',1)->get();
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
        return redirect()->intended($bbb->joinRoomAdmin($meeting,'saleh'));

    }
}
