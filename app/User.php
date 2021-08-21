<?php

namespace App;

use Cache;
use App\Ip;
use App\Points\CollectsPoints;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements Viewable
{
    use Notifiable, CollectsPoints, InteractsWithViews, SoftDeletes;

    /**
     * nothing in line
     * @return bool
     */
    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = $maybe_slug = strtolower(str_slug($model->name));
            $next = 2;
            while (User::where('slug', '=', $slug)->first()) {
                $slug = "{$maybe_slug}.{$next}";
                $next++;
            }
            $model->slug = $slug;
            return true;
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'password',
        'description',
        'registration_ip',
        'registration_country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
     * [history description]
     * @return [type] [description]
     */
    public function history(){
        return $this->hasMany(History::class);
    }

    /**
     * [getAvatarAttribute description]
     * https://eu.ui-avatars.com/
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getAvatarAttribute($value)
    {
        if(!$value){
            return "https://www.gravatar.com/avatar/?d=mp&f=y";
        }
        return asset('storage/images/avatars/' . $value);
    }

    /**
     *
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     *
     */
    public function isOnline(){
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     *
     */
    public function ip()
    {
        return $this->hasMany(Ip::class);
    }
}
