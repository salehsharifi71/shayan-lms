<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Logdb extends Model
{
    //
    protected $guarded=[];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
