<?php

namespace App\Points\Actions;

use App\Points\Actions\ActionAbstract;

class UploadedImage extends ActionAbstract
{
    public function key()
    {
        return 'uploaded-image';
    }
}
