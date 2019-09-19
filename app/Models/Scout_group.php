<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Scout_group extends Model
{
    use SoftDeletes;

    public function headscout() {
        return $this->belongsTo('App/Models/User', 'user_id', 'headscout_id');
    }
}
