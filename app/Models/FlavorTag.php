<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlavorTag extends Model
{
    use HasFactory;

    protected $table = 'flavorTags';

    protected $fillable = [
        'brandId',
        'tagIds'
    ];
}
