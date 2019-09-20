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
        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
        $email = $request->input('email');
        $contacts = DB::collection('contacts')
            ->where('firstname', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($firstname)))
            ->where('lastname', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($lastname)))
            ->where('email', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($email)))
            ->get();

        if (count($contacts) > 0) {
            $myJSON = json_encode($contacts);
            echo ($myJSON);
        } else {
            echo (count($contacts));
        }

    }

    //function which will check the fields and create the suitable regex generator for each field.
    public function regexGenerator(string $variable = null)
    {
        is_null($variable) ? $variable = '' : '';
        return '.*' . $variable . '.*';
    }
}
