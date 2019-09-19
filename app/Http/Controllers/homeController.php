<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application as Application;

class homeController extends Controller
{
    //This function will return all applications related to this scout
    public function show()
    {
        $applications = Application::where("scout_id", Auth::user()->id)->get();
        echo ("test: " . count($applications));
        // $myJSON = json_encode($applications);
        // echo ($myJSON);
    }
}
