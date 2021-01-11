<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $table = 'game_releases';

    protected $casts = [
            'misc' => 'json'
        ];

    protected $fillable = [
            'misc',
            "box",
            "pcb" => '',
            "manual",
            "cartridge_front",
            "cartridge_back" => '',
            "cartridge_number" => "numeric",
            "inner_box",
            "register_pampflet",
            "booklet",
            "special",
    ];

    /**
     * [comments description]
     * @return [type] [description]
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * [comments description]
     * @return [type] [description]
     */
    public function game(){
        return $this->belongsTo(Game::class);
    }

    /**
     * [images description]
     * @return [type] [description]
     */
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}
