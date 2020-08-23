<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    //
    protected $guarded=[];
    public $timestamps=false;
    public function User(){
        return $this->belongsTo(User::class);
    }
}
