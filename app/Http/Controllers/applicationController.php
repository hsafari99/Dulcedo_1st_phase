<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\applicationValidator;
use App\Models\Contact as Contact;
use App\Models\Country as Country;
use App\Models\Event as Event;
use App\Models\Question as Question;
use App\Models\Source as Source;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class applicationController extends Controller
{

    //This function will return the list of questions through AJAX
    public function getQuestions(Request $request){
        $questions = Question::all();

        $myJSON = json_encode($questions);
        echo ($myJSON);
    }

    // This function will return the search result of the Event to UI through AJAX
    public function getEvents(Request $request)
    {
        $event = $request->input('event');

        $eventList = Event::where('name', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($event)))->get();
        $myJSON = json_encode($eventList);
        echo ($myJSON);
    }

    //This function return the list of the sources an applicant may apply to the form through the AJAX
    public function getSources(Request $request)
    {
        $sources = Source::all();

        $myJSON = json_encode($sources);
        echo ($myJSON);
    }
    //This function will return the list of the scouts in a specific office through AJAX
    public function getScoutList(Request $request)
    {
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
    public function registerApplication(applicationValidator $request)
    {   
        $scout_id = $request->input('scouted');
        $step_id = (isset($scout_id) && !empty($scout_id))? 'SCT' : 'APP';
        $source_id = $request->input('source');
        $source_note = $request->input('source_note');
        $event_id = $request->input('event');
        $office_id = $request->input('app_office');
        $gender = $request->input('gender');
        $eye_color = $request->input('eye_color');
        $hair_color = $request->input('hair_color');
        $height = (int)($request->input('height_feet'))*12 + (int)($request->input('height_inches'));
        $waist = (int)($request->input('waist'));
        $bust = (int)($request->input('bust'));
        $hips = (int)($request->input('hips'));
        $neck = (int)($request->input('neck'));
        $sleeve = (int)($request->input('sleeve'));
        $dress = (int)($request->input('dress'));
        $shoe = (int)($request->input('shoe'));
        $inseam = (int)($request->input('inseam'));
        $index = "goos";
        for($i =0; $i<10; $i++){
            $index = 'network'+$i 
            $$index = $request->input($index);
        }
        $contact_id = $request->input('id');
        $guardian_id = $request->input('gid');
        $validated = $request->validated();
        
        dd($$index);
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
