<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'category', 'published_at', 'author_id'];

    // Associe l'article à un auteur
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Assurez-vous que published_at est automatiquement géré
    protected $casts = [
        'published_at' => 'datetime',
    ];
}
