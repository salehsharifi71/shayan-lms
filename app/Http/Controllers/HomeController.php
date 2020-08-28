<?php

namespace App\Http\Controllers;

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
}
