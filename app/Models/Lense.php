<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lense extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productvariant() {
        return $this->belongsTo(Productvariant::class);
    }
}
