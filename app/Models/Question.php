<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Question extends Model
{
    public function answers() {
        return $this->hasMany('App\Models\Answer');
    }
}
