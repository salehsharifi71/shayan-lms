<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Model\Organizer\Organizer;
use Illuminate\Http\Request;

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
        return view('sites.login',compact('organizer'));
    }
}
