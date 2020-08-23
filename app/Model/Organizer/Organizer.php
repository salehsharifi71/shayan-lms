<?php

namespace App\Model\Organizer;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    //
    protected $guarded=[];
    public $timestamps=false;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Packagesite(){
        return $this->belongsTo(Packagesite::class);

    }
}
