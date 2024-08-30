<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Programme extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'titre',
        'date',
        'h_debut',
        'h_fin',
        'description',
        'image',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function imageUrls(){
        return Storage::disk('public')->url($this->image); 
    }

}
