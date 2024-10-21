<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'discount', 'image',
    ];

    public function getImageFilename()
    {
        $imageMap = [
            'The Witcher 3: Wild Hunt' => 'witcher3.jpg',
            'Ghost of Tsushima' => 'ghost.jpg',
            'Among Us' => 'amongus.jpg',
            'Hades' => 'hades.jpg',
            'Cyberpunk 2077' => 'cyberpunk.jpg',
            'DOOM Eternal' => 'doom.jpg',
            'Celeste' => 'celeste.jpg',
            'Stardew Valley' => 'stardewvalley.jpg',
        ];

        // First, try to match the exact title
        if (isset($imageMap[$this->title])) {
            return $imageMap[$this->title];
        }

        // If not found, try to match partially
        foreach ($imageMap as $title => $image) {
            if (stripos($this->title, $title) !== false) {
                return $image;
            }
        }

        // If still not found, return a default image
        return 'default.jpg';
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
