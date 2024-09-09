<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireBlog extends Model
{
    protected $table = 'commentaireblogs';

    use HasFactory;

    protected $fillable=[
        'contenus',
            'user_id',
            'blog_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function blogs()
{
    return $this->belongsTo(Blog::class ,'blog_id');
}
}
