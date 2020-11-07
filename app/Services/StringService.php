<?php
/**
 * Created by PhpStorm.
 * User: MrFenj
 * Date: 22/08/2020
 * Time: 11:59 AM
 */

namespace App\Services;


use Illuminate\Foundation\Application;

class StringService
{
    private $application;
    function __construct( Application $application)
    {
        $this->application=$application;
    }

    public function prettyNumber($string){

        if($this->application->getLocale()=='fa'){
            $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
            $latin_num = range(0, 9);
            $ar_num = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
            $string = str_replace($ar_num, $latin_num, $string);
            $string = str_replace($latin_num,$persian_num, $string);
        }
        return $string;
    }
    public function findSymbol($string){
        $arr=explode(' ',$string);
        $txt=substr($string,0,2);
        if(count($arr)>2){
            foreach ($arr as $item){
                $last=$item;
            }
            $txt=$txt.'‌'.substr($item,0,2);
        }else{
            if(isset($arr[1]))
                $txt=$txt.'‌'.substr($arr[1],0,2);
        }

        return $txt;
    }
    public  function getSlice($html,$char,$addText='...')
    {
        $string=strip_tags($html);
        $getlength=strlen($string);

        if ($getlength > $char) {
            $end=$char/100*20;
            $text= substr($string, 0, strrpos($string, ' ', $char-$end));
            $text.=$addText;
        } else {
            $text= $string;
        }
        return $text;

    }
}