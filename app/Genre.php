<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Genre extends Model
{
    /**
     * 
     */
    public function games(){
        return $this->belongsToMany(Game::class);
    }

    /**
     * 
     */
    public function scopeSameGenre($query)
    {
        return $this->games(function($q){
            return $q->where('genre', '!=', 'unknown');
        });
    }
}
