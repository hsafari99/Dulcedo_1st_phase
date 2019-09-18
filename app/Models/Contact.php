<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Contact extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function application()
    {
        return $this->hasMany('App\Models\application');
    }
}
