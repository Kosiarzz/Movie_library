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

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function movieCast()
    {
        return $this->hasMany(MovieCast::class);
    }

    public function movieCategory()
    {
        return $this->hasMany(MovieCategory::class);
    }

    public function movieGroup()
    {
        return $this->hasMany(GroupMovie::class);
    }

}
