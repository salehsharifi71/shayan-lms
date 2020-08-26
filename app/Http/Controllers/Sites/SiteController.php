<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Model\Organizer\Organizer;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    protected $organizer;
    function __construct()
    {
        $this->organizer=Organizer::where('domain', request()->server->get('HTTP_HOST'))->firstOrFail();
    }

    public function index(){
        return 1;
    }
}
