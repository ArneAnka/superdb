<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * 
     */
    public static function boot() {
        parent::boot();
    
        //while creating/inserting item into db  
        // static::creating(function ($model) { 
        //     $model->ip = $model->request->ip(); //assigning value
        // });
    }

    /**
     * Get all of the models that own comments.
     */
    public function commentable(){
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
