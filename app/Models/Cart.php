<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
      return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function products(){
      return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function lense(){
      return $this->hasOne(Lense::class, 'id', 'lense_id');
    }
    public function mirror(){
      return $this->hasOne(Mirror::class, 'id', 'mirror_id');
    }
    public function eyenumber(){
      return $this->belongsTo(EyeNumber::class);
    }
    public function productvariant() {
      return $this->hasOne(Productvariant::class, 'id', 'prod_var_id');
    }
}
