<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id', 'title', 'description',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
