<?php

namespace App;

use App\Traits\Historyable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{

    use Historyable;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        // Order by title ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('title', 'asc');
        });
        /** When creating, slug the title */
        static::creating(function($game){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = $maybe_slug = str_slug($game->title);
            while (Game::where('slug', '=', $slug)->first()) {
                $slug = "{$maybe_slug}.{$game->console}";
            }
            $game->slug = $slug;
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
     * A game has many releases
     * @return collection
     */
    public function releases(){
        return $this->hasMany(Release::class);
    }

    public function urls(){
        return $this->hasMany(Url::class);
    }
}
