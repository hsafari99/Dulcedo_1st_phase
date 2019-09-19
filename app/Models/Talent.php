<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Talent extends Eloquent
{
    use SoftDeletes;

    public function applications() {
        return $this->hasMany('App\Models\Application');
    }

    public function contact() {
        return $this->embedsOne('App\Models\Contact');
    }

    //Talent information will be added to MongoDB are:

        // Talent registeration form by Scout: (first step)        
            // notes  (remarks)         
            // firstname       
            // lastname         
            // email           
            // phone  
            // Height (in) => (int)$TalentInfo['height_feet'] * 12 + (int)$TalentInfo['height_inches']  
            // Scout ID
            //step

}
