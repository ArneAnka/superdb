<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['name', 'description'];
    public $timestamps = false;

    /**
     * [games description]
     * @return [type] [description]
     */
    public function games(){
        return $this->belongsToMany(Game::class); 
    }
}
