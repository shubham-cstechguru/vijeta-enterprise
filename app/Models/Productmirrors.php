<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productmirrors extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mirror() {
        return $this->hasOne(Mirror::class,'id', 'mirror_id');
    }
    
}