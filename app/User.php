<?php

namespace App;

use App\Points\CollectsPoints;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, CollectsPoints;

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
        'avatar', 'name', 'email', 'password',
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
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getAvatarAttribute($value)
    {
        if(!$value){
            return asset('images/avatar.jpg');
        }
        return asset($value);
    }
}
