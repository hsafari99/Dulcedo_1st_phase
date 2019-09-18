<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Event extends Model
{
    public function discoveries() {
        return $this->hasMany('App\Models\Discovery');
    }

    public function applications() {
        return $this->hasMany('App\Models\Application');
    }
}
