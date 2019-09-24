<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application as Application;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    //This function will return all applications related to this scout
    public function show(Request $request)
    {
        $scout_id = Auth::user()->id;
        $applications = Application::where("scout_id", $scout_id)->get();

        $myJSON = json_encode($applications);
        echo ($myJSON);
    }
}
