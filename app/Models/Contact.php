<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Contact extends Model
{
    public function country() {
        return $this->belongsTo('App\Models\Country');
    }
}
