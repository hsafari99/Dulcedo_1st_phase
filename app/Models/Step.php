<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Step extends Model
{
    public function applications() {
        return $this->hasMany('App\Models\Application');
    }
}
