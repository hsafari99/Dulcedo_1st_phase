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
        //I have found this way too but i did not test it.
        //======================================================
        //$validator = \Validator::make($request->all(), [
        //'footballername' => 'required',
        //'club' => 'required',
        //'country' => 'required',
        //]);
        
        //if ($validator->fails())
        // {
        //     return response()->json(['errors'=>$validator->errors()->all()]);
        // }
        // return response()->json(['success'=>'Record is successfully added']);

        $validated = $request->validated();
        if ($validated->fails()) {
            echo (json_encode($validated->getMessageBag()->toArray()));
        }else{

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
        for($i =0; $i<10; $i++){
            if(null !== $request->input('network'.strval($i))){
                $networks[] = [
                    'network'   => $request->input('network'.strval($i)),
                    'username'  => $request->input('username'.strval($i)),
                ];
            }
        }
        $questions_IDs = Question::all();
        foreach($questions_IDs as $question){
            $id = $question['_id'];
            if(null !== $request->input($id)){
                $answers[] = [
                    'question_id'   => $id,
                    'answer'        => $request->input($id)
                ];
            }
        }

        $contact_id = $request->input('id');
        //getting the applicant information in case that it is not a registered applicant
        //In case that the contact already registered, It will check if the information changed or not?
        //If yes, it will update the existing applicant 
        if((null === $contact_id) || ($contact_id === '') || empty($contact_id)){
            $newContact = [
                'firstname'  =>  $validated['fName'],
                'lastname'   =>  $validated['lName'],
                'email'      =>  $validated['email'],
                'phone'      =>  $validated['phone'],
                'address'    =>  $validated['address'],
                'city'       =>  $validated['city'],
                'postal'     =>  $validated['postal'],
                'country_id' =>  $request->input('country'),
                'birthdate'  =>  $validated['dob'],
            ];

            $contact_id = $this->recordNewContact($newContact);
        }else{
            $needUpdate = false;
            $contact_info = Contact::where("_id", $contact_id)->first();

            if($validated['fName'] !== $contact_info['firstname']){
                $updatedInfo = [ 
                    'firstname' => $validated['fName']
                ];
                $needUpdate = true;
            }

            if($validated['lname'] !== $contact_info['lastname']){
                $updatedInfo = [ 
                    'lastname' => $validated['lname']
                ];
                $needUpdate = true;
            }

            if($validated['email'] !== $contact_info['email']){
                $updatedInfo = [
                    'email' => $validated['email']
                ];
                $needUpdate = true;
            }

            if(!in_array($validated['phone'] , $contact_info['phone']) && !empty($validated['phone'])){
                $updatedInfo = [
                    'phone' => $contact_info['phone']
                ];
                $updatedInfo['phone'] = $validated['phone'];
                $needUpdate = true;
            }

            if($validated['address'] !== $contact_info['address']){
                $updatedInfo = [ 
                    'address' => $validated['address']
                ];
                $needUpdate = true;
            }

            if($validated['city'] !== $contact_info['city']){
                $updatedInfo = [ 
                    'city' => $validated['city']
                ];
                $needUpdate = true;
            }

            if($validated['postal'] !== $contact_info['postal']){
                $updatedInfo = [ 
                    'postal' => $validated['postal']
                ];
                $needUpdate = true;    
            }

            if($request->input('country') !== $contact_info['country_id']){
                $updatedInfo = [ 
                    'country_id' => $validated['country_id']
                ];
                $needUpdate = true;
            }

            if($validated['birthdate'] !== $contact_info['birthdate']){
                $updatedInfo = [ 
                    'birthdate' => $validated['birthdate']
                ];
                $needUpdate = true;
            }

            if($needUpdate){
                $this->updateContact($contact_id, $updatedInfo);
            }
        }

        if(null !== $request->input('gid')){
            $contact_id = $request->input('gid');
            //getting the applicant information in case that it is not a registered applicant
            //In case that the contact already registered, It will check if the information changed or not?
            //If yes, it will update the existing applicant 
            if((null === $contact_id) || ($contact_id === '') || empty($contact_id)){
                $newContact = [
                    'firstname'  =>  $validated['gfName'],
                    'lastname'   =>  $validated['glName'],
                    'email'      =>  $validated['gemail'],
                    'phone'      =>  $validated['gphone'],
                    'address'    =>  $validated['gaddress'],
                    'city'       =>  $validated['gcity'],
                    'postal'     =>  $validated['gpostal'],
                    'country_id' =>  $request->input('gcountry'),
                    'birthdate'  =>  $validated['gdob'],
                ];

                $contact_id = $this->recordNewContact($newContact);
                $guardian_id[] = $contact_id;
                $guardian_relation[] = [
                    'guardian_id'       => $contact_id,
                    'guardian_relation' => $request->input('guardian_relation'),
                ];
            }else{
                $needUpdate = false;
                $contact_info = Contact::where("_id", $contact_id)->first();

                if($validated['gfName'] !== $contact_info['firstname']){
                    $updatedInfo = [ 
                        'firstname' => $validated['gfName']
                    ];
                    $needUpdate = true;
                }

                if($validated['glname'] !== $contact_info['lastname']){
                    $updatedInfo = [ 
                        'lastname' => $validated['glname']
                    ];
                    $needUpdate = true;
                }

                if($validated['gemail'] !== $contact_info['email']){
                    $updatedInfo = [
                        'email' => $validated['gemail']
                    ];
                    $needUpdate = true;
                }

                if(!in_array($validated['gphone'] , $contact_info['phone']) && !empty($validated['gphone'])){
                    $updatedInfo = [
                        'phone' => $contact_info['phone']
                    ];
                    $updatedInfo['phone'] = $validated['gphone'];
                    $needUpdate = true;
                }

                if($validated['gaddress'] !== $contact_info['address']){
                    $updatedInfo = [ 
                        'address' => $validated['gaddress']
                    ];
                    $needUpdate = true;
                }

                if($validated['gcity'] !== $contact_info['city']){
                    $updatedInfo = [ 
                        'city' => $validated['gcity']
                    ];
                    $needUpdate = true;
                }

                if($validated['gpostal'] !== $contact_info['postal']){
                    $updatedInfo = [ 
                        'postal' => $validated['gpostal']
                    ];
                    $needUpdate = true;    
                }

                if($request->input('gcountry') !== $contact_info['country_id']){
                    $updatedInfo = [ 
                        'country_id' => $request->input('gcountry')
                    ];
                    $needUpdate = true;
                }

                if($validated['gbirthdate'] !== $contact_info['birthdate']){
                    $updatedInfo = [ 
                        'birthdate' => $validated['gbirthdate']
                    ];
                    $needUpdate = true;
                }

                if($needUpdate){
                    $this->updateContact($contact_id, $updatedInfo);
                }
            }
        }

        if(null !== $request->input('gid2')){
            $contact_id = $request->input('gid2');
            //getting the applicant information in case that it is not a registered applicant
            //In case that the contact already registered, It will check if the information changed or not?
            //If yes, it will update the existing applicant 
            if((null === $contact_id) || ($contact_id === '') || empty($contact_id)){
                $newContact = [
                    'firstname'  =>  $validated['g2fName'],
                    'lastname'   =>  $validated['g2lName'],
                    'email'      =>  $validated['g2email'],
                    'phone'      =>  $validated['g2phone'],
                    'address'    =>  $validated['g2address'],
                    'city'       =>  $validated['g2city'],
                    'postal'     =>  $validated['g2postal'],
                    'country_id' =>  $request->input('g2country'),
                    'birthdate'  =>  $validated['g2dob'],
                ];

                $contact_id = $this->recordNewContact($newContact);
                $guardian_id[] = $contact_id;
                $guardian_relation[] = [
                    'guardian_id'       => $contact_id,
                    'guardian_relation' => $request->input('guardian_relation'),
                ];
            }else{
                $needUpdate = false;
                $contact_info = Contact::where("_id", $contact_id)->first();

                if($validated['g2fName'] !== $contact_info['firstname']){
                    $updatedInfo = [ 
                        'firstname' => $validated['g2fName']
                    ];
                    $needUpdate = true;
                }

                if($validated['g2lname'] !== $contact_info['lastname']){
                    $updatedInfo = [ 
                        'lastname' => $validated['g2lname']
                    ];
                    $needUpdate = true;
                }

                if($validated['g2email'] !== $contact_info['email']){
                    $updatedInfo = [
                        'email' => $validated['g2email']
                    ];
                    $needUpdate = true;
                }

                if(!in_array($validated['g2phone'] , $contact_info['phone']) && !empty($validated['g2phone'])){
                    $updatedInfo = [
                        'phone' => $contact_info['phone']
                    ];
                    $updatedInfo['phone'] = $validated['g2phone'];
                    $needUpdate = true;
                }

                if($validated['g2address'] !== $contact_info['address']){
                    $updatedInfo = [ 
                        'address' => $validated['g2address']
                    ];
                    $needUpdate = true;
                }

                if($validated['g2city'] !== $contact_info['city']){
                    $updatedInfo = [ 
                        'city' => $validated['g2city']
                    ];
                    $needUpdate = true;
                }

                if($validated['g2postal'] !== $contact_info['postal']){
                    $updatedInfo = [ 
                        'postal' => $validated['g2postal']
                    ];
                    $needUpdate = true;    
                }

                if($request->input('g2country') !== $contact_info['country_id']){
                    $updatedInfo = [ 
                        'country_id' => $request->input('g2country')
                    ];
                    $needUpdate = true;
                }

                if($validated['g2birthdate'] !== $contact_info['birthdate']){
                    $updatedInfo = [ 
                        'birthdate' => $validated['g2birthdate']
                    ];
                    $needUpdate = true;
                }

                if($needUpdate){
                    $this->updateContact($contact_id, $updatedInfo);
                }
            }
        }

        //getting the list of the countries the applicant has the citizenship from
        //and put it in the array of the citizenships
        //Consider that the max no. of countries are 3 now. 
        for($i=0; $i<3;$i++){
            if(null !== $request->input('country'.strval($i))){
                $citizenships[] = $request->input('country'.strval($i));
            }
        }

        $can_work_in = 'yes';
        $note = $request->input('notes'); 
    }
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

    //function for registering a contact in database
    public function recordNewContact(Array $newContact){
        $contact_id = Contact::insertGetId($newContact);

        return strval($contact_id);
    }

    //function for updating the contact in database
    public function updateContact(string $contact_id, Array $updatedInfo){
        Contact::where("_id", $contact_id)
                ->update($updatedInfo);
    }

    public function test(){
        dd($errors->all());
    }
}
