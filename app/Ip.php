<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot; #??
use App\Users;

class Ip extends Pivot
{
    protected $table = 'users_ip';

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
