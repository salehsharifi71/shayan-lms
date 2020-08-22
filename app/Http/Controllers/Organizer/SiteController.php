<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Services\Logdb;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(Logdb $logdb){
        $logdb->sendLog('salam','khoobi');
        return 1;
    }
}
