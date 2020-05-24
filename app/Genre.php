<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "games_genres";

    public function games(){
        return $this->belongsToMany(Games::class);
    }
}
