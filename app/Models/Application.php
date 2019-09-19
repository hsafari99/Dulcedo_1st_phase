<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Application extends Model
{
    use SoftDeletes;

    public function step()
    {
        return $this->belongsTo('App\Models\Step');
    }

    public function talent()
    {
        return $this->belongsTo('App\Models\Talent');
    }

    public function guardian()
    {
        return $this->embedsOne('App\Models\Guardian');
    }

    public function discovery()
    {
        return $this->embedsOne('App\Models\Discovery');
    }

    public function measurement()
    {
        return $this->embedsOne('App\Models\Measurement');
    }

    public function answers()
    {
        return $this->embedsMany('App\Models\Answer');
    }

    public function votes()
    {
        return $this->embedsMany('App\Models\Vote');
    }

    public function network()
    {
        return $this->embedsMany('App\Models\Network');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function source()
    {
        return $this->belongsTo('App\Models\source');
    }

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

    public function countries()
    {
        return $this->belongsToMany('App\Models\Country');
    }
}
