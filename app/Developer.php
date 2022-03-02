<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Developer extends Model
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
        static::creating(function($developer){
            // Make a slug for the developer ex: {slug}.{xx}
            $slug = $maybe_slug = str_slug($developer->name);
            // while(Developer::where('slug', '=', $slug)->first()) {
            //     $slug = "{$maybe_slug}";
            // }
            $developer->slug = $slug;
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
     * [games description]
     * @return [type] [description]
     */
    public function games(){
        return $this->belongsToMany(Game::class); 
    }
}
