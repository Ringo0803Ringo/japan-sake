<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlavorTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'tag_id'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function tag() {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
