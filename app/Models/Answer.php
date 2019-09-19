<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answer extends Model
{
    use SoftDeletes;

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
