<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Model\Organizer\Client;
use App\Model\Organizer\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    protected $organizer;
    function __construct()
    {
        $this->organizer=Organizer::where('domain', request()->server->get('HTTP_HOST'))->firstOrFail();
    }

    public function login(){
        $organizer= $this->organizer;
        if(!$organizer){
            return 0;
        }
        if(request()->has('username')) {
            $this->validate(request(), [
                'username' => 'required',
                'password' => 'required'
            ]);
            if (Auth::guard('organizer')->attempt(['organizer_id'=>$organizer->id,'username' => request()->username, 'password' => request()->password],0)) {

                return redirect()->intended('/dashboard');
            }

            return back()->withInput(request()->only('username'))->withErrors(['error'=>__('auth.failed')]);
        }
        return view('sites.login',compact('organizer'));
    }

    public function register(){
        $organizer= $this->organizer;
        if(!$organizer){
            return 0;
        }
        if(request()->has('username')) {
            $this->validate(request(), [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed'
            ]);
            if(Client::where('username',request()->username)->where('organizer_id',$organizer->id)->first()){
                return back()->withErrors(['error'=>__('validation.unique',['attribute'=>__('info.userName')])]);
            }else{
                $client=Client::firstOrNew([
                    'organizer_id'=>$organizer->id,
                    'username'=>request()->username,
                    'name'=>request()->name,
                    'password'=>Hash::make(request()->password),
                ]);
                $client->save();
                if (Auth::guard('organizer')->attempt(['organizer_id'=>$organizer->id,'username' => request()->username, 'password' => request()->password],0)) {

                    return redirect()->intended('/dashboard');
                }
            }
        }
        return view('sites.register',compact('organizer'));
    }

}
