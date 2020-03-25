<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = [];

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
