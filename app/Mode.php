<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $fillable = ['mode'];
    public $timestamps = false;
    
    /**
     * [games description]
     * @return [type] [description]
     */
    public function games(){
        return $this->belongsToMany(Game::class); 
    }
}
