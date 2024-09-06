<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Evenements extends Model
{
    use HasFactory;
    protected $table = 'evenements';

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
    public function imageUrls(){
        return Storage::disk('public')->url($this->image); 
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function commentaires()
    {
        return $this->hasMany(CommentaireEvent::class, 'evenements_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
