<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{    
    /**
     * [posts description]
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'imageable');
    }

    /**
     * [games description]
     * @return [type] [description]
     */
    public function games()
    {
        return $this->morphedByMany(Game::class, 'imageable');
    }
}
