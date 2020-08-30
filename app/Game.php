<?php

namespace App;

use DateTimeInterface;
use App\Traits\Historyable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use Historyable;
    use SoftDeletes;

    protected $guarded = [];
    protected $hidden = ['data'];

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

    /**
     * [urls description]
     * @return [type] [description]
     */
    public function urls(){
        return $this->hasMany(Url::class);
    }

    /**
     * [genre description]
     * @return [type] [description]
     */
    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    /**
     * [console description]
     * @return [type] [description]
     */
    public function console(){
        return $this->belongsTo(Console::class);
    }

    /**
     * [images description]
     * @return [type] [description]
     */
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
    
    /**
     * [scopeReleasedOn description]
     * @param  Builder           $query [description]
     * @param  DateTimeInterface $date  [description]
     * @return [type]                   [description]
     */
    public function scopeReleasedOn(Builder $query, DateTimeInterface $date)
    {
        return $query
            ->whereDay('sweden_release', '=', $date->format('d'))
            ->whereMonth('sweden_release', '=', $date->format('m'));
    }

    /**
     * [scopeReleasedOnThisDay description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeReleasedOnThisDay($query)
    {
        return $this->releasedOn($this->freshTimestamp());
    }
}
