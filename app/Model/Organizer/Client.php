<?php

namespace App\Model\Organizer;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded=[];
    public function Organizer(){
        return $this->belongsTo(Organizer::class);
    }
}
