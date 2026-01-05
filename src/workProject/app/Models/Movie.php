<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'release_year',
        'title',
        'genre',
        'image',
        'rating',
        'user_id',
    ];
}
