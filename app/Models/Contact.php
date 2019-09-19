<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contact extends Model
{
    use SoftDeletes;

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function application()
    {
        return $this->hasMany('App\Models\application');
    }
}
