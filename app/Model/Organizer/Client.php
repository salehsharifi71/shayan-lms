<?php

namespace App\Model\Organizer;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    //
    protected $guarded=[];
    public function Organizer(){
        return $this->belongsTo(Organizer::class);
    }
}
