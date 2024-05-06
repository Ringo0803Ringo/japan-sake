<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'filename',
        'brand_id'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}
