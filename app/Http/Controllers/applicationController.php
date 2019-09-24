<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact as Contact;
use App\Models\Country as Country;
use App\Models\Source as Source;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class applicationController extends Controller
{

    //This function return the list of the sources an applicant may apply to the form through the AJAX
    public function getSources(Request $request){
        $sources = Source::all();

        $myJSON = json_encode($sources);
        echo ($myJSON);
    }
    //This function will return the list of the scouts in a specific office through AJAX
    public function getScoutList(Request $request){
        $office_id = $request->input('office_id');

        $scoutList = User::where('office_id', $office_id)->whereIn('roles', ['scout'])->get();

        $myJSON = json_encode($scoutList);
        echo ($myJSON);
    }

    //This function will return the array of countries through AJAX
    public function getCountries(Request $request)
    {
        $countries = Country::all();

        $myJSON = json_encode($countries);
        echo ($myJSON);
    }

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

    //This function will return the contact information based on the receive contact_id from AJAX request.
    public function populateData(Request $request)
    {
        $contact_id = $request->input('contact_id');

        $contactInfo = Contact::where("_id", $contact_id)->first();

        $myJSON = json_encode($contactInfo);
        echo ($myJSON);
    }

    //This function will respond to the AJAX for returning the list of the contact match the
    //search criteria in blade it will return a JSON to blade for show in Modal
    public function searchContact(Request $request)
    {
        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
        $email = $request->input('email');
        $contacts = Contact::where('firstname', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($firstname)))
            ->where('lastname', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($lastname)))
            ->where('email', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($email)))
            ->get();

        $myJSON = json_encode($contacts);
        echo ($myJSON);
    }

    //function which will check the fields and create the suitable regex generator for each field.
    public function regexGenerator(string $variable = null)
    {
        (is_null($variable) || $variable === '') ? $variable = '' : '';
        return '.*' . $variable . '.*';
    }
}
