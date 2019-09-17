<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Scout_group extends Model
{
    public function headscout() {
        return $this->belongsTo('App/Models/User', 'user_id', 'headscout_id');
    }
}
