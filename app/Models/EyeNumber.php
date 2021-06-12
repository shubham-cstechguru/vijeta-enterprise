<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EyeNumber extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function carts(){
        return $this->hasOne(Cart::class, 'id', 'cart_id');
    }
}
