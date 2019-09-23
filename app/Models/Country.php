<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    use SoftDeletes;

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function application()
    {
        return $this->hasOne('App\Models\Application');
    }
}
