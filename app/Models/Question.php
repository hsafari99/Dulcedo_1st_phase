<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    public function answers() {
        return $this->hasMany('App\Models\Answer');
    }
}
