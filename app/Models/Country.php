<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Country extends Model
{
    public function contacts() {
        return $this->hasMany('App\Models\Contact');
    }
}
