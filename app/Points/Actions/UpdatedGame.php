<?php

namespace App\Points\Actions;

use App\Points\Actions\ActionAbstract;

class UpdatedGame extends ActionAbstract
{
    public function key()
    {
        return 'updated-game';
    }
}
