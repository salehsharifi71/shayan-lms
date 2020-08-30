<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Model\Organizer\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    //
    protected $organizer;
    function __construct()
    {

        $this->organizer=Organizer::where('domain', request()->server->get('HTTP_HOST'))->firstOrFail();
    }

    public function index(){
        $organizer= $this->organizer;
        if(!$organizer){
            return 0;
        }
        return view('sites.index',compact('organizer'));
    }
}
