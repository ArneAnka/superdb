<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Followed this articel
 * https://www.codechief.org/article/polymorphic-relationship-in-laravel#gsc.tab=0
 */
class Tag extends Model
{
    protected $fillable = ['name'];
    /**
     * [posts description]
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
