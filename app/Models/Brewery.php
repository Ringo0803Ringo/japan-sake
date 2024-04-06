<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'area_id'
    ];

    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function brands() {
        return $this->hasMany(Brand::class);
    }
}
