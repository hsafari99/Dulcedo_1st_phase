<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\Models\Application as Application;
use App\Models\Contact as Contact;
use App\Models\Country as Country;
use App\Models\Event as Event;
use App\Models\Talent as Talent;
use App\Models\User as User;
use App\Models\Step as Step;

class SearchAppication extends Controller
{
    public function show(){
        $results = DB::collection('applications')->count();
        return view('pages/searchApplications', [
            'results' => $results,
        ]);
    }

    //This function will return the scount information through the Ajax to the modal
    public function getEventById(Request $request){
        $application_id = $request->input('application_id');

        //Application::find("_id", [$application_id])->event()->name;
        echo (Application::find("_id", [$application_id]));

    }

    //This function will return the applicant information through AJAX to the modal
    public function getContactById(Request $request){
        $id = $request->input('contact_id');
        //var_dump(Contact::where("_id", $id)->get()[0]['firstname']);
        
       if(Contact::where("_id", $id)->count()){
        $country_id = Contact::where("_id", $id)->get()[0]['country_id'];

        $applicant = [
            "firstname" => Contact::where("_id", $id)->get()[0]["firstname"],
            "lastname"  => Contact::where("_id", $id)->get()[0]["lastname"],
            "email"     => Contact::where("_id", $id)->get()[0]["email"],
            "phone"     => Contact::where("_id", $id)->get()[0]["phone"],
            "address"   => Contact::where("_id", $id)->get()[0]["address"],
            "city"      => Contact::where("_id", $id)->get()[0]["city"],
            "postal"    => Contact::where("_id", $id)->get()[0]["postal"],
            "country"   => Country::where("_id", $country_id)->get()[0]["en"],
            "birthdate" => Contact::where("_id", $id)->get()[0]["birthdate"],
            "sin"       => Contact::where("_id", $id)->get()[0]["sin"],
            "notes"     => Contact::where("_id", $id)->get()[0]["notes"],
        ];

        $myJSON = json_encode($applicant);      
        echo($myJSON);
       }else{
           echo "Error";
       }
    }

    //This function with search the contacts database for extracting the reults matching the given 
    //search criterias. It will return the array of the contactsIDs 
    public function searchApplication(Request $request){
        // dd(Step::all());
        
        $firstname = $request->input('firstName');
        $lastname = $request->input('lastName');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $country = $request->input('country');
        $ageFrom = (int)(is_null($request->input('ageFrom'))? ($ageFrom = 0) : ($ageFrom = $request->input('ageFrom')));
        $ageTo = (int)(is_null($request->input('ageTo')) ? ($ageTo = 0) : ($ageTo = $request->input('ageTo')));

        $contacts = DB::collection('contacts')
            ->where('firstname', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($firstname)))
            ->where('lastname', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($lastname)))
            ->where('email', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($email)))
            ->where('phone', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($phone)))
            ->where('city', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($city)))
            ->where('country_id', 'regex', new \MongoDB\BSON\Regex($this->regexGenerator($country)))
            //->whereBetween('birthdate', [$this->fromDateGenerator((int)$ageTo), $this->toDateGenerator((int)$ageFrom)])
            ->get();

        $contactIDs = [];
        foreach ($contacts as $contact) {
            $id = get_object_vars($contact['_id'])["oid"];
            $contactIDs[] = [
                'id'            => $id,
                'firstname'     => $contact['firstname'],
                'lastname'      => $contact['lastname'],
                'appsInfo'      => $this->getApplicationsByTalent($id),
            ];
        }

        // $this->getApplicationsByTalent($talentId);
        return View::make('pages/results', compact('contactIDs'));
    }

    //function which will check the fields and create the suitable regex geenerator for each field. 
    public function regexGenerator(string $variable = null){
        is_null($variable)? $variable = '' : '';
        return '.*'.$variable.'.*';
    }

    //function which will create the birth date based on from Age field. 
    public function fromDateGenerator(int $year = null){
        is_null($year)? ($year = date("Y")) : $year = (date("Y")-$year);
        return ($year.'-01-01');
    }

    //function which will create the birth date based on to Age field.  
    public function toDateGenerator(int $year = null){
        is_null($year)? ($year = 1900) : $year = (date("Y")-$year);
        return ($year.'-01-01');
    }

    //This function will retun the application information based on received contact IDs
    public function getApplicationsByTalent(string $talentId){
        $applicationsInfo = [];
        if(Contact::where('_id', $talentId)->count()){
        $applications = Application::where('contact_id', $talentId)->get();
        foreach ($applications as $application) {
            $application_id = $application['_id'];
            $application_step_id = Step::where('_id' , $application['step_id'])->get()[0]['en'];
            $scout_id = $application['scout_id'];
            $scoutfname = User::where('_id', $scout_id)->get()[0]->firstname;
            $scoutlname = User::where('_id', $scout_id)->get()[0]->lastname;
            $event_id = $application['event_id'];
            $event_name = Event::where('_id', $event_id)->get()[0]->name;
            $applicationsInfo[] = [
                'applicationId'     =>  $application_id,
                'applicationStatus' =>  $application_step_id , 
                'scoutedBy'         =>  $scoutfname.' '.$scoutlname,
                'event_name'        =>  $event_name,
            ];
        }
         return $applicationsInfo;
        }else{
            return null;
        }
    }
}
