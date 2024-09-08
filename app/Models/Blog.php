<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =[
        "titre",
        'categorie_id',
        "user_id",
        "message",
        "slug",
        "etat",
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
{
    return $this->belongsTo(Categorie::class,"categorie_id");
}


}
