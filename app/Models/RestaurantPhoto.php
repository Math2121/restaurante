<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantPhoto extends Model
{
    use HasFactory;

protected $table = 'restaurant_photos';
protected $fillable = ['photo'];


    public function restaurant(){
        return $this->hasMany(Menu::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->hasMany(RestaurantPhoto::class);
    }
}