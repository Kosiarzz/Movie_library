<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'year',
        'original_title',
        'time',
        'rate',
        'votes',
        'img',
        'watched',
        'genre_id',
        'country_id',
        'user_id',
    ];
}
