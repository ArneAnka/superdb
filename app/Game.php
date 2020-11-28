<?php

namespace App;

use DateTimeInterface;
use App\Traits\Historyable;
use App\Points\Actions\UpdatedGame;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use Historyable, SoftDeletes, Notifiable;

    protected $hidden = ['data'];
    protected $guarded = [];
    protected $with = ['modes', 'publishers', 'developers', 'history'];

    protected static function boot(){
        parent::boot();
        // Order by title ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('title', 'asc');
        });

        /**
         * When creating, slug the title.
         * So that two games can have the same title, but not the same slug.
         */
        static::creating(function($game){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = $maybe_slug = str_slug($game->title);
            while(Game::where('slug', '=', $slug)->first()) {
                $slug = "{$maybe_slug}.{$game->console}";
            }
            $game->slug = $slug;
            return true;
        });

        /**
         * To give the user points for each updated field
         */
        static::saving(function($record){
            $dirty = $record->getDirty();
            foreach ($dirty as $field => $newdata){
              $olddata = $record->getOriginal($field);
              if ($olddata != $newdata){
                auth()->user()->givePoints(new UpdatedGame());
              }
            }
            return true;
          }
        );
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
     * [comments description]
     * @return [type] [description]
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
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
     * [modes description]
     * @return [type] [description]
     */
    public function modes() 
    {
        return $this->belongsToMany(Mode::class); 
    }

    /**
     * [developers description]
     * @return [type] [description]
     */
    public function developers() 
    {
        return $this->belongsToMany(Developer::class); 
    }

    /**
     * [publishers description]
     * @return [type] [description]
     */
    public function publishers() 
    {
        return $this->belongsToMany(Publisher::class); 
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
