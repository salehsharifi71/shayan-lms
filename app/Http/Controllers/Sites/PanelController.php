<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Model\Meeting\Meet;
use App\Model\Organizer\ClientMeta;
use App\Model\Organizer\Organizer;
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
}
