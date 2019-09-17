<?php

use Illuminate\Database\Seeder;

use App\Models\Answer as Answer;
use App\Models\Application as Application;
use App\Models\Contact as Contact;
use App\Models\Country as Country;
use App\Models\Discovery as Discovery;
use App\Models\Event as Event;
use App\Models\Measurement as Measurement;
use App\Models\Network as Network;
use App\Models\Question as Question;
use App\Models\Source as Source;
use App\Models\Step as Step;
use App\Models\Talent as Talent;
use App\Models\User as User;

class FakeSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //data randomizer
        $faker          = Faker\Factory::create();
        $steps          = App\Models\Step::all();
        $talents        = App\Models\Talent::all();
        $questions      = App\Models\Question::all();
        
        $talent         = new App\Models\Talent;
        $contact        = new App\Models\Contact;
        $application    = new App\Models\Application;
        $discovery      = new App\Models\Discovery;
        $measurement    = new App\Models\Measurement;
        $network        = new App\Models\Network;
        $_user          = new App\Models\User;
        
        /* ====================================>> Users <<========================================= */
        /* ===========================>> Will be generated only once <<=========================== */
        //======================================================================================================
        // $users = [

        //     ["admin", "admin", "admin", "admin@admin.com", Hash::make('admin'), ['admin']],
        //     ["Martin", "Gauthier", "multihead", "multihead@multihead.com", Hash::make('multihead'), ['booker', 'headbooker', 'scout', 'headscout']],
        //     ["Yan", "Bono", "headscout", "headscout@headscout.com", Hash::make('headscout'), ['headscout', 'scout']],
        //     ["Martin", "Alvarez", "headbooker", "headbooker@headbooker.com", Hash::make('headbooker'), ['heabooker', 'booker']],
        //     ["Karim", "Leduc", "superadmin", "superadmin@superadmin.com", Hash::make('superadmin'), ['admin', 'booker', 'headbooker', 'scout']],
        //     ["Laurie", "Gauthier", "booker1", "booker1@booker.com", Hash::make('booker1'), ['booker']],
        //     ["Martin", "Simard", "booker2", "booker2@booker.com", Hash::make('booker2'), ['booker']],
        //     ["Carianne", "Simard", "booker3", "booker3@booker.com", Hash::make('booker3'), ['booker']],
        //     ["Vanessa", "Lord", "booker4", "booker4@booker.com", Hash::make('booker4'), ['booker']],
        //     ["Justin", "Langlois", "scout1", "scout1@scout.com", Hash::make('scout1'), ['scout']],
        //     ["Marc", "Langlois", "scout2", "scout2@scout.com", Hash::make('scout2'), ['scout']],
        //     ["Marie", "Saint-Clair", "scout3", "scout3@scout.com", Hash::make('scout3'), ['scout']],
        //     ["Sabrina", "Leblanc", "scout4", "scout4@scout.com", Hash::make('scout4'), ['scout']],

        // ];

        // foreach($users as $user) {
        //     $_user          = new App\Models\User;
        //     $_user->firstname = $user[0];
        //     $_user->lastname  = $user[1];
        //     $_user->email     = $user[2];
        //     $_user->username  = $user[2];
        //     $_user->password  = $user[4];
        //     $_user->roles     = $user[5];
        //     $_user->office_id = 'Montreal office';
        //     $_user->save();
        // }

        /* ===========================>> Talents <<=========================== */
        //======================================================================================================
        // $quantity = 1000;
        // $listNo = 5;
        // for ($i = 0; $i < $quantity; $i++) {
        //     $talent         = new App\Models\Talent;
        //     //determine the gender of the fake talent
        //     $genderLetter = $faker->randomElement(['m', 'f']);
        //     ($genderLetter == 'm') ? ($gender = 'male') : ($gender = 'female');
        //     $firstname = $faker->firstName($gender);
        //     $lastname = $faker->lastname;

        //     //note generator by Faker
        //     for ($j=0; $j < $listNo; $j++) { 
        //         $notes[$j] = $faker->text($maxNbChars = 200);
        //     }
        //     //phone number generator by Faker
        //     for ($k=0; $k < $listNo; $k++) { 
        //         $phones[$k] = $faker->tollFreePhoneNumber;
        //     }

        //     $talent->firstname = $firstname;
        //     $talent->lastname = $lastname;
        //     $talent->email = $firstname.".".$lastname.'@'.$faker->safeEmailDomain;

        //     $talent->phone = $phones;
        //     $talent->notes = $notes;
        //     $talent->height = $faker->numberBetween(36,95);
        //     $talent->scoutID = $faker->randomElement([
        //                                                'scout1' => '5d7be52412b9ae15580076f3',
        //                                                'scout2' => '5d7be52412b9ae15580076f4',
        //                                                'scout3' => '5d7be52412b9ae15580076f6',
        //                                                'scout4' => '5d7be52412b9ae15580076fb',
        //                                                'scout5' => '5d7be52412b9ae15580076fc',
        //                                                'scout6' => '5d7be52412b9ae15580076fd',
        //                                                'scout7' => '5d7be52412b9ae15580076fe',
        //                                                ]);
        //     $step = $faker->randomElement($steps);
        //     $talent->step = $step->id;
        //     $talent->save();
        // }

        /* ===========================>> Contacts <<=========================== */
        //======================================================================================================
        // $quantity = 1000;
        // $listNo = 5;
        // for ($i = 0; $i < $quantity; $i++) {
        //     $contact        = new App\Models\Contact;
        //     //determine the gender of the fake talent
        //     $genderLetter = $faker->randomElement(['m', 'f']);
        //     ($genderLetter == 'm') ? ($gender = 'male') : ($gender = 'female');
        //     $firstname = $faker->firstName($gender);
        //     $lastname = $faker->lastname;

        //     //note generator by Faker
        //     for ($j=0; $j < $listNo; $j++) { 
        //         $notes[$j] = $faker->text($maxNbChars = 200);
        //     }
        //     //phone number generator by Faker
        //     for ($k=0; $k < $listNo; $k++) { 
        //         $phones[$k] = $faker->tollFreePhoneNumber;
        //     }
        //     // Get the country ID and adjust the postal code based on the country
        //     $country_id = $faker->randomElement(["USA", "CAN"]);
        //     $country_id === "USA" ? $postal = $faker->postcode : $postal = $faker->regexify('[A-Z][0-9][A-Z] [0-9][A-Z][0-9]');

        //     $contact->firstname = $firstname;
        //     $contact->lastname = $lastname;
        //     $contact->email = $firstname.".".$lastname.'@'.$faker->safeEmailDomain;

        //     $contact->phone = $phones;
        //     $contact->address = $faker->streetAddress;
        //     $contact->city = $faker->city;
        //     $contact->postal = $postal;
        //     $contact->country_id = $country_id;
        //     $contact->birthdate = $faker->date($format = 'Y-m-d', $max = '2002-02-02');
        //     $contact->sin = $faker->unique()->numberBetween(100000000,999999999);
        //     $contact->notes = $notes;

        //     $contact->save();
        // }

       /* ===========================>> Events <<=========================== */
       //======================================================================================================
        // $quantity = 1000;        

        // for ($i=0; $i < $quantity; $i++) { 
        //     $event = new Event;
        //     $event->name = $faker->streetName;
        //     $event->description = $faker->realText(200, 1);

        //     $event->save();
        // }

        /* ===========================>> Networks <<=========================== */
       //======================================================================================================
        // $quantity = 1000;        

        // for ($i=0; $i < $quantity; $i++) { 
        //     $network = new Network;
        //     $network->name = $faker->randomElement(['Instagram', 'Facebook', 'Youtube', 'Tweeter', 'Linkedin']);
        //     $network->username = $faker->userName;

        //     $network->save();
        // }
 
        /* ===========================>> Answers <<=========================== */
       //======================================================================================================
        // $quantity = 30;        

        // for ($i=0; $i < $quantity; $i++) { 
        //     $answer = new Answer;
        //     $answer->question_id = $faker->randomElement($this->getQuestions());
        //     $answer->text = $faker->realText(200, 1);

        //     $answer->save();
        // }

        /* ===========================>> Applications <<=========================== */
       //======================================================================================================
    //     $quantity = 1000;
    //     $listNo = 5;

    //     //Populating the information for applications
    //     for ($i=0; $i < $quantity; $i++) { 
    //         $application    = new App\Models\Application;

    //        //populating the Scount_id based on already created scouts
    //         $application->scout_id = $faker->randomElement($this->GetScouts());

    //         //populating the votes array based on persons who can vote
    //         $application->votes = "Vote Object will be added later";
            
    //         //populate the Step_id based on predefined array of Steps
    //         $application->step_id = $faker->randomElement($this->GetSteps());

    //         //populate the Source_id based on predefined array of Sources
    //         $application->source_id = $faker->randomElement($this->GetSources());

    //         $application->source_note = "Source Note will be added later";

    //         //populate the Event_id based on array of Events
    //         $application->event_id = $faker->randomElement($this->GetEvents());

    //         //Populate office id
    //         $application->office_id = 'Montreal office';

    //         //Populate the gender 
    //         $application->gender = $faker->randomElement(['m', 'f']);

    //         //Populate the measurements
    //         $application->eye_color = $faker->randomElement(['Blue', 'Brown']);
    //         $application->hair_color = $faker->randomElement(['Blonde', 'Black']);
    //         $height1 = $faker->numberBetween(3, 7);
    //         $height2 = $faker->numberBetween(0, 11);
    //         $application->height = (string)($height1 * 12) + $height2;
    //         $application->waist = $faker->randomFloat(1, 25, 30);
    //         $application->bust = $faker->randomElement(['34.B', '32.C', '33.D']);
    //         $application->hips = $faker->randomFloat(1, 36, 39);
    //         $application->neck = $faker->randomFloat(1, 15, 17);
    //         $application->sleeve = $faker->randomFloat(1, 32, 34);
    //         $application->dress = $faker->numberBetween(2, 8);
    //         $application->shoe = $faker->numberBetween(7, 10);
    //         $application->inseam = $faker->randomFloat(1, 30, 34);
    //         $application->networks = $faker->randomElements($this->getNetworks(), 3);
    //         //it is just for keeping the structure frame but it has the logical issue and must be restructured.
    //         $application->answers = $faker->randomElements($this->getAnswers(), 10);
    //         $application->contact_id = $faker->randomElement($this->getContacts());
    //         $application->guardian_id = $faker->randomElement($this->getContacts());
    //         $application->guardian_relation = $faker->randomElement(['Father', 'Mother', 'Brother', 'Sister', 'Grand Father', 'Grand Mother', 'Aunt', 'Uncle', 'Legal Guardian', 'Other']);
    //         $application->citizenships = $faker->randomElements($this->getCountries(), 2);
    //         $application->can_work_in = 'Yes';
    //         $application->note = $faker->realText(200, 1);

    //         $application->save();
    //     }
    // }

    //Return the array of already created Scouts Ids
    public function GetScouts(){
        $scouts = User::where('roles', 'scout')->get();
        foreach ($scouts as $scout) {
            $IDs[] = $scout->id;
        }

        return $IDs;
    }

    //return the array of step_ids
    public function GetSteps(){
        $steps = Step::all();
        foreach ($steps as $step) {
            $IDs[] = $step->id;
        }

        return $IDs;
    }

    //return the array of source_ids
    public function GetSources(){
        $sources = Source::all();
        foreach ($sources as $source) {
            $IDs[] = $source->id;
        }

        return $IDs;
    }

    //return the array of Event_ids
    public function GetEvents(){
        $Events = Event::all();
        foreach ($Events as $Event) {
            $IDs[] = $Event->id;
        }

        return $IDs;
    }

    //return the array of Network_ids
    public function getNetworks(){
        $networks = Network::all();
        foreach ($networks as $network) {
            $IDs[] = $network->id;
        }

        return $IDs;
    }

    //return the array of Question_ids
    public function getQuestions(){
        $questions = Question::all();
        foreach ($questions as $question) {
            $IDs[] = $question->id;
        }

        return $IDs;
    }

    //return the array of Answer_ids
    public function getAnswers(){
        $answers = Answer::all();
        foreach ($answers as $answer) {
            $IDs[] = $answer->id;
        }

        return $IDs;
    }

    //return the array of Contact_ids
    public function getContacts(){
        $contacts = Contact::all();
        foreach ($contacts as $contact) {
            $IDs[] = $contact->id;
        }

        return $IDs;
    }

    //return the array of Country_ids
    public function getCountries(){
        $countries = Country::all();
        foreach ($countries as $country) {
            $IDs[] = $country->id;
        }

        return $IDs;
    }
}