<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Publisher extends Model
{
    protected $fillable = ['name', 'description'];
    public $timestamps = false;

    protected static function boot(){
        parent::boot();
        
        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name', 'asc');
        });
        
        /**
         * When creating, slug the name.
         * So that two games can have the same name, but not the same slug.
         */
        static::creating(function($publisher){
            // Make a slug for the developer ex: {slug}
            $slug = $maybe_slug = str_slug($publisher->name);
            while(Publisher::where('slug', '=', $slug)->first()) {
                $slug = "{$maybe_slug}";
            }
            $publisher->slug = $slug;
            return true;
        });
    }

    /**
     * [games description]
     * @return [type] [description]
     */
    public function games(){
        return $this->belongsToMany(Game::class); 
    }
}
