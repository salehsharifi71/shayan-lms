<?php

namespace App\Model\Bank;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded=[];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
