<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Discovery extends Model
{
    use SoftDeletes;

    public function scout() {
        return $this->belongsTo('App\Models\User');
    }

    public function event() {
        return $this->belongsTo('App\Models\Event');
    }

    public function source() {
        return $this->belongsTo('App\Models\Source');
    }
}
