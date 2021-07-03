<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $table = 'films';

    public $fillable = [
        'name',
        'author',
        'country',
        'category',
        'episodes',
        'description',
        'star',
        'date',
        'type',
        'image',
        'banner',
    ];
}
