<?php
namespace App\Models;

class Subscription extends AppModel
{
    public $timestamps = false;
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
   
}
