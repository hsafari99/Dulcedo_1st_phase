<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Application extends Model
{
    public function step() {
        return $this->belongsTo('App\Models\Step');
    }

    public function talent() {
        return $this->belongsTo('App\Models\Talent');
    }

    public function guardian() {
        return $this->embedsOne('App\Models\Guardian');
    }

    public function discovery() {
        return $this->embedsOne('App\Models\Discovery');
    }

    public function measurement() {
        return $this->embedsOne('App\Models\Measurement');
    }

    public function answers() {
        return $this->embedsMany('App\Models\Answer');
    }

    public function votes() {
        return $this->embedsMany('App\Models\Vote');
    }

    public function network() {
        return $this->embedsMany('App\Models\Network');
    }
}
