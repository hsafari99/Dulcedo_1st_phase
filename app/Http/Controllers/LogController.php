<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;

class LogController extends Controller
{
    public function LogAction(string $userId, string $talentId, string $action){
        $newLog = new Log();

        $newLog->userId = $userId;
        $newLog->talentId = $talentId;
        $newLog->action = $action;
        $newLog->when = date('m/d/Y h:i:s a', time());

        $newLog->save();
        return;
    }
}
