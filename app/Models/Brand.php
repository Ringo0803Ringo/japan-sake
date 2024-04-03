<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'breweryId'
    ];

    public function brewery() {
        return $this->belongsTo(Brewery::class, 'breweryId', 'id');
    }

    public function flavor_tags() {
        return $this->hasMany(FlavorTag::class);
    }

    public function ranking() {
        return $this->hasOne(Ranking::class, 'brand_id', 'id');
    }

    public function area() {
        return $this->belongsTo(Area::class);
    }
}
