<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class applicationController extends Controller
{
    //This function will direct user to new application form
    public function showform()
    {
        return view('pages/application');
    }

    //This function will record the new application in database and put the new photos in storage
    //folder with the contact name
    public function registerApplication(Request $request)
    {
        echo "Application recorder :)";
    }

    //This function will respond to the AJAX for returning the list of the contact match the
    //search criteria in blade it will return a JSON to blade for show in Modal
    public function searchContact(Request $request)
    {
        echo "contact searching... :)";
    }
}
