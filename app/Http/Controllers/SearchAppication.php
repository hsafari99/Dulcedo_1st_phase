<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application as Application;
use App\Models\Contact as Contact;
use App\Models\Country as Country;
use App\Models\Event as Event;
use App\Models\Step as Step;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class SearchAppication extends Controller
{
    public function show()
    {
        $results = DB::collection('applications')->count();
        return view('pages/searchApplications', [
            'results' => $results,
        ]);
    }

    //This function will return the results based on application status
    public function getApplicationByStatus(Request $request)
    {
        $status = $request->input('status');
        if ($status !== 'NA' || is_null($status)) {
            $contactIDs = [];
            $applications = Application::where("step_id", $status)->get();

            foreach ($applications as $application) {
                $id = $application['contact_id'];
                $firstname = Contact::where('_id', $id)->first()->firstname;
                $lastname = Contact::where('_id', $id)->first()->lastname;
                $contactIDs[] = [
                    'id' => $id,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'appsInfo' => $this->getApplicationsByTalent($id),
                ];
            }
            return View::make('pages/results', compact('contactIDs'));
        } else {
            return back()->withErrors(['No status is selected... Please try again']);
        }
    }

    //This function will return the list of application statuses for showing in the select
    //Related to search by application status
    public function getApplicationStatusList()
    {
        $list = Step::all();

        foreach ($list as $key => $step) {
            $steps[$step['_id']] = $step['en'];
        }

        $myJSON = json_encode($steps);
        echo ($myJSON);
    }

    //This function will return the application information through the Ajax to the modal
    public function getApplicationById(Request $request)
    {
        $app_id = $request->input('application_id');

        $app_info = [
            'scout_id' => Application::where("_id", $app_id)->first()['scout_id'],
            'votes' => Application::where("_id", $app_id)->first()['votes'],
            'step_id' => Application::where("_id", $app_id)->first()['step_id'],
            'source_id' => Application::where("_id", $app_id)->first()['source_id'],
            'source_note' => Application::where("_id", $app_id)->first()['source_note'],
            'event_id' => Application::where("_id", $app_id)->first()['event_id'],
            'office_id' => Application::where("_id", $app_id)->first()['office_id'],
            'gender' => Application::where("_id", $app_id)->first()['gender'],
            'eye_color' => Application::where("_id", $app_id)->first()['eye_color'],
            'hair_color' => Application::where("_id", $app_id)->first()['hair_color'],
            'height' => Application::where("_id", $app_id)->first()['height'],
            'waist' => Application::where("_id", $app_id)->first()['waist'],
            'bust' => Application::where("_id", $app_id)->first()['bust'],
            'hips' => Application::where("_id", $app_id)->first()['hips'],
            'neck' => Application::where("_id", $app_id)->first()['neck'],
            'sleeve' => Application::where("_id", $app_id)->first()['sleeve'],
            'dress' => Application::where("_id", $app_id)->first()['dress'],
            'shoe' => Application::where("_id", $app_id)->first()['shoe'],
            'inseam' => Application::where("_id", $app_id)->first()['inseam'],
            'networks' => Application::where("_id", $app_id)->first()['networks'],
            'answers' => Application::where("_id", $app_id)->first()['answers'],
            'contact_id' => Application::where("_id", $app_id)->first()['contact_id'],
            'guardian_id' => Application::where("_id", $app_id)->first()['guardian_id'],
            'guardian_relation' => Application::where("_id", $app_id)->first()['guardian_relation'],
            'citizenships' => Application::where("_id", $app_id)->first()['citizenships'],
            'can_work_in' => Application::where("_id", $app_id)->first()['can_work_in'],
            'note' => Application::where("_id", $app_id)->first()['note'],
            'updated_at' => Application::where("_id", $app_id)->first()['updated_at'],
            'created_at' => Application::where("_id", $app_id)->first()['created_at'],
        ];
        $myJSON = json_encode($app_info);
        echo ($myJSON);
    }

    //This function will return the scount information through the Ajax to the modal
    public function getEventById(Request $request)
    {
        $application_id = $request->input('application_id');
        $event = [
            'name' => Application::find($application_id)->event->name,
            'description' => Application::find($application_id)->event->description,
            'creation_date' => Application::find($application_id)->event->created_at,
            'last_update' => Application::find($application_id)->event->updated_at,
        ];
        $myJSON = json_encode($event);
        echo ($myJSON);

    }

    //This function will return the applicant information through AJAX to the modal
    public function getContactById(Request $request)
    {
        $id = $request->input('contact_id');
        //var_dump(Contact::where("_id", $id)->get()[0]['firstname']);

        if (Contact::where("_id", $id)->count()) {
            $country_id = Contact::where("_id", $id)->get()[0]['country_id'];

            $applicant = [
                "firstname" => Contact::where("_id", $id)->get()[0]["firstname"],
                "lastname" => Contact::where("_id", $id)->get()[0]["lastname"],
                "email" => Contact::where("_id", $id)->get()[0]["email"],
                "phone" => Contact::where("_id", $id)->get()[0]["phone"],
                "address" => Contact::where("_id", $id)->get()[0]["address"],
                "city" => Contact::where("_id", $id)->get()[0]["city"],
                "postal" => Contact::where("_id", $id)->get()[0]["postal"],
                "country" => Country::where("_id", $country_id)->get()[0]["en"],
                "birthdate" => Contact::where("_id", $id)->get()[0]["birthdate"],
                "sin" => Contact::where("_id", $id)->get()[0]["sin"],
                "notes" => Contact::where("_id", $id)->get()[0]["notes"],
            ];

            $myJSON = json_encode($applicant);
            echo ($myJSON);
        } else {
            echo "Error";
        }
    }

    /**
    This function with search the contacts database for extracting the reults matching the given
    search criterias. It will return the array of the contactsIDs
     */
    public function searchApplication(Request $request)
    {
        // $app_id = $request->input('firstName');
        // dd(Application::find('5d7f969512b9ae0d94004bf2')->event->name);
        // dd(Step::all());

        $firstname = $request->input('firstName');
        $lastname = $request->input('lastName');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $country = $request->input('country');
        $ageFrom = (int) (is_null($request->input('ageFrom')) ? ($ageFrom = 0) : ($ageFrom = $request->input('ageFrom')));
        $ageTo = (int) (is_null($request->input('ageTo')) ? ($ageTo = 0) : ($ageTo = $request->input('ageTo')));

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
                'id' => $id,
                'firstname' => $contact['firstname'],
                'lastname' => $contact['lastname'],
                'appsInfo' => $this->getApplicationsByTalent($id),
            ];
        }

        // $this->getApplicationsByTalent($talentId);
        return View::make('pages/results', compact('contactIDs'));
    }

    //function which will check the fields and create the suitable regex geenerator for each field.
    public function regexGenerator(string $variable = null)
    {
        is_null($variable) ? $variable = '' : '';
        return '.*' . $variable . '.*';
    }

    //function which will create the birth date based on from Age field.
    public function fromDateGenerator(int $year = null)
    {
        is_null($year) ? ($year = date("Y")) : $year = (date("Y") - $year);
        return ($year . '-01-01');
    }

    //function which will create the birth date based on to Age field.
    public function toDateGenerator(int $year = null)
    {
        is_null($year) ? ($year = 1900) : $year = (date("Y") - $year);
        return ($year . '-01-01');
    }

    //This function will retun the application information based on received contact IDs
    public function getApplicationsByTalent(string $talentId)
    {
        $applicationsInfo = [];
        if (Contact::where('_id', $talentId)->count()) {
            $applications = Application::where('contact_id', $talentId)->get();
            foreach ($applications as $application) {
                $application_id = $application['_id'];
                $application_step_id = Step::where('_id', $application['step_id'])->get()[0]['en'];
                $scout_id = $application['scout_id'];
                $scoutfname = User::where('_id', $scout_id)->get()[0]->firstname;
                $scoutlname = User::where('_id', $scout_id)->get()[0]->lastname;
                $event_id = $application['event_id'];
                $event_name = Event::where('_id', $event_id)->get()[0]->name;
                $applicationsInfo[] = [
                    'applicationId' => $application_id,
                    'applicationStatus' => $application_step_id,
                    'scoutedBy' => $scoutfname . ' ' . $scoutlname,
                    'event_name' => $event_name,
                ];
            }
            return $applicationsInfo;
        } else {
            return null;
        }
    }
}
