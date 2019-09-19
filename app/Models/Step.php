<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Step extends Model
{
    use SoftDeletes;

    public function applications() {
        return $this->hasMany('App\Models\Application');
    }
}
