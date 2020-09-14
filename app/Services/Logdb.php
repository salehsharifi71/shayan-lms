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
        if($log->ip!='127.0.0.1') {
            $post = "https://api.telegram.org/bot142679334:AAESZv1iyhsdSpyjVs38wSU9IczcHzTYK3M/sendMessage?text=$tag&chat_id=123969916";
            file_get_contents($post);
        }
    }
}