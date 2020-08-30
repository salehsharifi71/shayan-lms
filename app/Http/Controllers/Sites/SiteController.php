<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Model\Meeting\Meet;
use App\Model\Organizer\Client;
use App\Model\Organizer\ClientMeta;
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
        $meetings=Meet::where('user_id',$organizer->user_id)->where('status',10)->orderByRaw('created_at DESC')->paginate(15);
        return view('sites.index',compact('organizer','meetings'));
    }
    public function showClass($hash){
        $organizer= $this->organizer;
        if(!$organizer){
            return 0;
        }
        $meeting=Meet::where('hash',$hash)->where('user_id',$organizer->user_id)->where('status',10)->firstOrFail();
        $clientsId=Client::where('organizer_id',$organizer->id)->where('role',1)->get()->pluck('id');
        $teachers=ClientMeta::whereIn('client_id',$clientsId)->where('meta_key','meet')->where('meta_value',$hash)->get();

        return view('sites.meeting',compact('organizer','meeting','teachers'));
    }
}
