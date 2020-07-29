<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['topic', 'body', 'user_id'];

    /**
     * nothing in line
     * @return bool
     */
    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = $maybe_slug = strtolower(str_slug($model->topic));
            $next = 2;
            while (Post::where('slug', '=', $slug)->first()) {
                $slug = "{$maybe_slug}.{$next}";
                $next++;
            }
            $model->slug = $slug;
            return true;
        });
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
