<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productvariant extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function lense() {
        return $this->hasOne(Lense::class,'id', 'lense_id');
    }

    public function mirror() {
        return $this->hasOne(Mirror::class,'id', 'mirror_id');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function productmirrors() {
        return $this->hasMany(Productmirrors::class, 'prod_var', 'id');
    }
}
