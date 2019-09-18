<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Country extends Model
{
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function application()
    {
        return $this->hasOne('App\Models\Application');
    }
}
