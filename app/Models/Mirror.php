<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mirror extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productvariant() {
        return $this->belongsTo(Productvariant::class);
    }
    public function productmirrors() {
        return $this->hasOne(Productmirrors::class, 'mirror_id', 'id');
    }

//    public function product(){
//        return $this->belongsTo(Product::class);
//    }
}
