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
        'brewery_id'
    ];

    public function brewery() {
        return $this->belongsTo(Brewery::class);
    }

    public function flavor_tags() {
        return $this->hasMany(FlavorTag::class);
    }

    public function ranking() {
        return $this->hasOne(Ranking::class);
    }
}
