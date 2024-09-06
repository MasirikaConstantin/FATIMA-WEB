<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireEvent extends Model
{
    use HasFactory;
    protected $table = 'commentaireevents';
    protected $fillable=[
        'contenus',
            'user_id',
            'evenements_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function evenement()
    {
        return $this->belongsTo(Evenements::class, 'id');
    }

}
