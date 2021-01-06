<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $table = 'game_releases';

    protected $casts = [
            'misc' => 'json'
        ];

    protected $fillable = [
            'misc',
            "box",
            "pcb" => '',
            "manual",
            "cartridge_front",
            "cartridge_back" => '',
            "cartridge_number" => "numeric",
            "inner_box",
            "register_pampflet",
            "booklet",
            "special",
    ];
}
