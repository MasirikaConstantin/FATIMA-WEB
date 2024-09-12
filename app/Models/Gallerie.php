<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallerie extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'user_id',
        'slug',
        'image',
        'lien'
    ];

    public function imageUrls(){
        return Storage::disk('public')->url($this->image); 
    }

}