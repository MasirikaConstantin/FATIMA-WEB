<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lecture';

    use HasFactory;
    protected $fillable = [
        'titre_1',
            'titre_2',
            'titre_3',
            'description_1',
            'description_2',
            'description_3',
            'meditation',
            'date',
            'slug',
            'user_id',

    ];
}
