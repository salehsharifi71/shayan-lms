<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\BBBController;
use App\Http\Controllers\Controller;
use App\Model\Meeting\Meet;
use App\Model\Organizer\ClientMeta;
use App\Model\Organizer\Organizer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    //
    protected $organizer;
    function __construct()
    {
        $this->middleware('auth:organizer');
        $this->organizer=Organizer::where('domain', request()->server->get('HTTP_HOST'))->firstOrFail();
    }

    public function dashboard(){
        return redirect(route('PublicSite'));
        return 1;
    }
    public function signUpMeeting($hash){
        $client = auth()->user();
        $meeting=Meet::where('hash',$hash)->where('user_id',$this->organizer->user_id)->where('status',10)->firstOrFail();
        if($meeting->signUpKind!=1) {
            $meetClass = ClientMeta::firstOrNew([
                'client_id' => $client->id,
                'meta_key' => 'meet',
                'meta_value' => $hash,
            ]);
            $meetClass->save();
        }
        return redirect(route('PublicClass',$hash))->with(['success'=>__('info.signUpSuccess')]);
    }
    public function joinMeeting($hash){
        $client = auth()->user();
        $meeting=Meet::where('hash',$hash)->where('user_id',$this->organizer->user_id)->where('status',10)->firstOrFail();
        $chkAccess=ClientMeta::where('client_id', $client->id)->where('meta_key', 'meet')->where('meta_value', $hash)->first();
        $tz_obj = new \DateTimeZone(env('TIME_ZONE'));
        $today = new \DateTime("now", $tz_obj);
        $hour = $today->format('H');
        $minitue = $today->format('i');
        $startAt=explode(':',$meeting->openTime);
        $closeAt=explode(':',$meeting->closeTime);
        $open=false;
        if(intval($startAt[0]) <= $hour && intval($closeAt[0]) >= $hour){
            $open=true;
        }
        if(!$chkAccess){
            return redirect(route('PublicClass',$hash))->withErrors(['error'=>__('info.accessDeny')]);
        }
        if($meeting->start_at < Carbon::now()){
            if($meeting->expired_at <Carbon::now()){
                return redirect(route('PublicClass',$hash))->withErrors(['error'=>__('info.expired')]);

            }else{
                if($open){
                    $bbb=new BBBController();
                    if($client->role==1)
                        $url =$bbb->joinRoomAdmin($meeting,$client->name);
                    else
                        $url =$bbb->joinRoom($meeting,$client->name);

                    $organizer= $this->organizer;
                    if(!$organizer){
                        return 0;
                    }
                    return view('iframePrivate',compact('url','organizer'));
//                    return redirect()->intended($url);
                }else{
                    return redirect(route('PublicClass',$hash))->withErrors(['error'=>__('info.dontStartYetTime')]);

                }
            }
        }else{
            return redirect(route('PublicClass',$hash))->withErrors(['error'=>__('info.dontStartYet')]);
        }
    }
}
