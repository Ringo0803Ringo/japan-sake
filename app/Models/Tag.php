<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tag'
    ];

    public function flavor_tags() {
        return $this->hasMany(FlavorTag::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'flavor_tags', 'tag_id', 'brand_id');
    }
}
