<?php

namespace App\Model\Organizer;

use Illuminate\Database\Eloquent\Model;

class ClientMeta extends Model
{
    //
    protected $guarded=[];
    public $timestamps=false;
    public function Client(){
        return $this->belongsTo(Client::class);
    }
}
