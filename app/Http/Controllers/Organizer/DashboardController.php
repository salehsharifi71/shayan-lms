<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Model\Organizer\Organizer;
use App\Services\SiteOrgCreate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(SiteOrgCreate $siteOrgCreate)
    {
        $user = auth()->user();
        $organizer=Organizer::where('user_id',$user->id)->first();
        if(!$organizer){
            $organizer = $siteOrgCreate->makeSite($user);
        }
        return view('home');
    }
}
