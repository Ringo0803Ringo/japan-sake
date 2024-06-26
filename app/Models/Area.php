<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function breweries() {
        return $this->hasMany(Brewery::class);
    }

    public function brands() {
        return $this->hasManyThrough(Brand::class, Brewery::class); 
    }
}
