<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = [];

    /**
     * Get all of the models that own history.
     */
    public function historyable(){
        return $this->morphTo();
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
