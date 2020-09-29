<?php
/**
 * Created by PhpStorm.
 * User: MrFenj
 * Date: 22/08/2020
 * Time: 11:59 AM
 */

namespace App\Services;


use Illuminate\Foundation\Application;

class MainService
{
    public function convertNumbersToEnglish($matches){
        $farsi_array = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_array = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $english_array = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $matches = str_replace($arabic_array, $english_array, $matches);
        $matches = str_replace($farsi_array, $english_array, $matches);
        return $matches;
    }
}