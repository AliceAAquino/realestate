<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Property extends Model
{
    protected $fillable = [
        'property_name',
        'description',
        'cat_id',
        'loc_id',
        'type_id',
        'price',
    ];
    protected $table = 'property';
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        
        static::created(function ($item){
            Log::info("A new Property was added by user ". Auth::id() . " with record_id:".$item->id);
        });
        static::updated(function ($item){
            $originalAttributes = $item->getOriginal();
            $originalAttributes = json_encode($originalAttributes);
            Log::info("Property record id ".$item->id. " was updated from {$originalAttributes} to {$item} by user_id ".Auth::id());
        });
        static::deleted(function ($item){
            Log::info("Property record id ".$item->id. "was Deleted by " .Auth::id());
        });

    }
}
