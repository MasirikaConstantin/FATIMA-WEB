<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Actu extends Model
{
    use HasFactory;

    protected $fillable=[
        'titre',
        'description',
            'slug',
            'image',
            'user_id',
            'etat',
    ];

    public function imageUrls(){
        return Storage::disk('public')->url($this->image); 
    }
}