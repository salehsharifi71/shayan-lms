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
}