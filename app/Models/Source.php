<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Source extends Model
{
    use SoftDeletes;

    public function discoveries()
    {
        return $this->hasMany('App\Models\Discovery');
    }

    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }
}
