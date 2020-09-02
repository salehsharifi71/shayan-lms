<?php
/**
 * Created by PhpStorm.
 * User: MrFenj
 * Date: 22/08/2020
 * Time: 11:59 AM
 */

namespace App\Services;


use App\Model\Meeting\Meet;
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
        $date=$date->addDays(60);
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

        $startAt = now();
        $meet=new Meet();
        $meet->start_at=  now();
            $meet->expired_at=  $startAt->addMonths(2);
        $meet->clength=2;
        $meet->maxUser=5;
        $meet->hash=substr(md5(uniqid()), 0, 5);
        $price=env('USER_PRICE');
        $price =$price+env('USER_MIC');
        $meet->isActiveMic=1;

        $price=$price*5;
        $meet->price=ceil($price/1000)*1000;
        $meet->user_id=$user->id;
        $meet->openTime = '07:00';
        $meet->closeTime = '23:00';

        $meet->title = __('info.firstClass');
        $meet->description ='';
        $meet->status =10;
        $meet->signUpKind = 2;
        $meet->save();
        $this->logdb->sendLog('SYSTEM_MAKE_CLASS','  کلاس جدید ساخته شد',$user->id);
        return $orgnaizer;
    }
    public function checkDomain($domain,$uid){

        if(Organizer::where('domain',$domain)->where('user_id','!=',$uid)->first())
            return true;
        return false;
    }
}