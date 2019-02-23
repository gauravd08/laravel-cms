<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class AppModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['files', 'Search_website'];

    public static function boot()
    {
        parent::boot();
        
        self::creating(function($model)
        {
            if(Schema::hasColumn($model->getTable(), 'created_by'))
            {
                $model->setAttribute("created_by", Auth::user()->id);
            }
            
            if(Schema::hasColumn($model->getTable(), 'updated_by'))
            {
                $model->setAttribute("updated_by", Auth::user()->id);
            }
        });

        self::updating(function($model)
        {
            if(Schema::hasColumn($model->getTable(), 'updated_by'))
            {
                $model->setAttribute("updated_by", Auth::user()->id);
            }
        });
    }

}
