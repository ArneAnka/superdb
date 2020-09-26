<?php

namespace App\Points\Actions;

use App\Points\Actions\ActionAbstract;

class Posted extends ActionAbstract
{
    public function key()
    {
        return 'posted';
    }
}
