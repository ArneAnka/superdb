<?php

namespace App;

use App\Traits\Historyable;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use Historyable;
    
    protected $table = "games_urls";
    protected $fillable = ['host', 'url', 'game_id'];

    /**
     * [game description]
     * @return [type] [description]
     */
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
