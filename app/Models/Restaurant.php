<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','address'
    ];
    public function menus(){
        return $this->hasMany(Menu::class);

    }
    public function owner(){
        return $this->belongsTo(User::class);
    }
    public function photos()
    {
        return $this->hasMany(RestaurantPhoto::class);
    }

}
