<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Guardian extends Model
{
    public function contact() {
        return $this->embedsOne('App\Models\Contact');
    }
}
