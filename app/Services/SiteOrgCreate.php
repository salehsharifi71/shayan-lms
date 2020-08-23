<?php
/**
 * Created by PhpStorm.
 * User: MrFenj
 * Date: 22/08/2020
 * Time: 11:59 AM
 */

namespace App\Services;


use App\Model\Organizer\Organizer;
use Carbon\Carbon;

class SiteOrgCreate
{
    private  $logdb;
    function __construct(Logdb $logdb)
    {
        $this->logdb=$logdb;
    }

    public function makeSite($user){
        $domain=str_replace('.','',substr($user->email,0,strpos($user->email,'@')));
        $c=0;
        $chkDomain=$domain.'.'.env('APP_LTE');
        $date = Carbon::now();
        $date=$date->addYear();
        while ($this->checkDomain($chkDomain,$user->id)){
            $c++;
            $chkDomain=$domain.$c.'.'.env('APP_LTE');
        }
        $orgnaizer=new Organizer();
        $orgnaizer->user_id=$user->id;
        $orgnaizer->domain=$chkDomain;
        $orgnaizer->title=$user->name;
        $orgnaizer->expireAt=$date;
        $orgnaizer->packagesite_id=1;
        $orgnaizer->save();
        $this->logdb->sendLog('SYSTEM_MAKE_SITE','سایت جدید برای کاربر ایجاد شد',$user->id);
        return $orgnaizer;
    }
    public function checkDomain($domain,$uid){

        if(Organizer::where('domain',$domain)->where('user_id','!=',$uid)->first())
            return true;
        return false;
    }
}