<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $table = 'superheroes';

    protected $fillable = [
        'id',
        'nickname',
        'real_name',
        'origin_description',
        'superpowers',
        'catch_phrase'
    ];

    use HasFactory;
}
