<?php

namespace App\Points\Actions;

use App\Points\Actions\ActionAbstract;

class Commented extends ActionAbstract
{
    public function key()
    {
        return 'commented';
    }
}
