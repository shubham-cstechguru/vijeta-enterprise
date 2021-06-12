<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function cart(){
      return $this->belongsTo(Cart::class);
    }

    public function productvariant() {
        return $this->hasMany(Productvariant::class);
    }
//    public function lense() {
//        return $this->hasMany(Lense::class);
//    }
//    public function mirror() {
//        return $this->hasMany(Mirror::class);
//    }
}
