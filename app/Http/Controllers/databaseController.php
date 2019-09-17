<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Talent as Talent;
use App\Http\Controllers\LogController as LogController;

class databaseController extends Controller
{
    //will record the talent in the database after validation of the inputs
    public function recordTalent(Array $TalentInfo){
        $newTalent = new Talent();

        $newTalent->notes           =   [
                                            0 => $TalentInfo['remark'],
                                        ];
        $newTalent->firstname       =   $TalentInfo['firstName'];
        $newTalent->lastname        =   $TalentInfo['lastName'];
        $newTalent->email           =   $TalentInfo['email'];
        $newTalent->phone           =   [
                                            0 => $TalentInfo['phone'],
                                        ];
        $newTalent->height          =   (int)$TalentInfo['height_feet'] * 12 + (int)$TalentInfo['height_inches'];
        $newTalent->scoutID         =   Auth()->user()->id;
        $newTalent->step            =   "TEM";

        $newTalent->save();

        app('App\Http\Controllers\LogController')->LogAction(Auth()->user()->id, $newTalent->getKey(), "New Talent Added To DataBase");
        return $newTalent->getKey();
    }
}
