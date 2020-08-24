<?php

namespace App\Model\Meeting;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    //
    protected $guarded=[];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
