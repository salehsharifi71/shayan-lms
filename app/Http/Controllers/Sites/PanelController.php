<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
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
}
