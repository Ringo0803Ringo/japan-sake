<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlavorTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'brandId',
        'tagIds'
    ];
}
