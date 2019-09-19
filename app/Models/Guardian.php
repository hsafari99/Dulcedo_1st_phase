<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Guardian extends Model
{
    public function contact()
    {
        return $this->embedsOne('App\Models\Contact');
    }

    // public function application()
    // {
    //     return $this->hasMany('App\Models\application');
    // }
}
