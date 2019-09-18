<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

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
