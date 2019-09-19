<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Vote extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
