<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class Location extends Model
{
    protected $fillable = [
        'location'
    ];
    protected $table = 'location';
    public $timestamps = false;
    public static function boot()
    {
        parent::boot();
        // protected $user_id =  Auth::id();
        static::created(function ($item){
            Log::info("A new Location was added by user ". Auth::id() . " with record_id:".$item->id);
        });
        static::updated(function ($item){
            $originalAttributes = $item->getOriginal();
            $originalAttributes = json_encode($originalAttributes);
            Log::info("Location record id ".$item->id. " was updated from {$originalAttributes} to {$item} by user_id ".Auth::id());
        });
        static::deleted(function ($item){
            Log::info("Location record id ".$item->id. "was Deleted by " .Auth::id());
        });

    }
}
