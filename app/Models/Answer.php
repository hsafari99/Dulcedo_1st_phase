<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Answer extends Model
{
    public function question() {
        return $this->belongsTo('App\Models\Question');
    }
}
