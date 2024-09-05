<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'date_debut',
        'date_fin',
        'h_debut',
        'h_fin',
        'description',
        'image',
        'slug',
        'created_at',
        'updated_at',
        'user_id',
        'etat'
    ];
}
