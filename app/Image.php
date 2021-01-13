<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * [boot description]
     * @return [type] [description]
     */
    public static function boot() {
        parent::boot();
        static::creating(function($image) {
            $image->user_id = auth()->id();
        });
    }
    /**
     * [posts description]
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'imageable');
    }

    /**
     * [games description]
     * @return [type] [description]
     */
    public function games()
    {
        return $this->morphedByMany(Game::class, 'imageable');
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Create a thumbnail of specified size
     *
     * @param string $path path of thumbnail
     * @param int $width
     * @param int $height
     */
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
