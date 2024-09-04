<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable=[
        'contenus',
            'user_id',
            'programme_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    
}
