<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Followed this articel
 * https://www.codechief.org/article/polymorphic-relationship-in-laravel#gsc.tab=0
 */
class Tag extends Model
{
    protected $fillable = ['name'];

    /**
     * [boot description]
     * @return [type] [description]
     */
    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = strtolower(str_slug($model->name));
            $model->slug = $slug;
            return true;
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * [posts description]
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }


}
