<?php

/**
 * Created by PhpStorm.
 * User: MrFenj
 * Date: 22/08/2020
 * Time: 11:20 AM
 */

namespace App\Services;
use Illuminate\Http\Client\Request;

class Logdb
{



    public function sendLog($tag,$msg,$user=null){
        $log=new \App\Model\Logdb();
        $log->tag=$tag;
        $log->msg=$msg;
        $log->user_id=$user;
        $log->ip=\Request::ip();
        $log->save();
    }
}