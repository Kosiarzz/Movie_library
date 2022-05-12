<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMovie extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'movie_id',
        'group_id',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
