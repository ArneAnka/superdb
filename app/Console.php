<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    protected $table = "consoles_games";

    public function games(){
        return $this->hasMany(Game::class);
    }
}
