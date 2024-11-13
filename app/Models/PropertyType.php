<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PropertyType extends Model
{
    protected $fillable = [
        'type'
    ];
    protected $table = 'property_type';
    public $timestamps = false;
    public static function boot()
    {
        parent::boot();
        // protected $user_id =  Auth::id();
        static::created(function ($item){
            Log::info("A new Property Type was added by user ". Auth::id() . " with record_id:".$item->id);
        });
        static::updated(function ($item){
            $originalAttributes = $item->getOriginal();
            $originalAttributes = json_encode($originalAttributes);
            Log::info("Property Type record id ".$item->id. " was updated from {$originalAttributes} to {$item} by user_id ".Auth::id());
        });
        static::deleted(function ($item){
            Log::info("Property Type record id ".$item->id. "was Deleted by " .Auth::id());
        });

    }


}
