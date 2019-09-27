<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class applicationValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //=============================== APPLICANT ERROR MESSAGES
            //for first name
            'fName.required'            => 'Applicant: First name must be filled.',
            'fName.min'                 => 'Applicant: First name must has at least 2 characters.',
            'fName.max'                 => 'Applicant: First name must has less than 50 characters.',
            'fName.alpha'               => 'Applicant: First name could not contain the number or special characters.',
            //for last name
            'lName.required'            => 'Applicant: Last name must be filled.',
            'lName.min'                 => 'Applicant: Last name must has at least 2 characters.',
            'lName.max'                 => 'Applicant: Last name must has less than 50 characters.',
            'lName.alpha'               => 'Applicant: Last name could not contain the number or special characters.',
            //for email
            'email.required'            => 'Applicant: Email address must be entered.',
            'email.email'               => 'Applicant: Invalid Email Entered.',
            //for phone number
            'phone.regex'               => "Applicant: Invalid phone number format.",
            //for city
            'city.alpha'                => 'Applicant: City could not contain the number or special characters.',
            //for postal code
            'postal.regex'              => 'Applicant: Only canadian postal code format is accepted.',
            //for date of birth
            'dob.after_or_equal'        => 'Applicant: Data of birth out of range',
            'dob.before_or_equal'       => 'Applicant: Data of birth out of range',
            //for SIN number
            'sin.regex'                 => "Applicant: invalid SIN number.",
            //=============================== GUARDIAN ERROR MESSAGES
            //for first name
            'gfName.required'           => 'Guardian: First name must be filled.',
            'gfName.min'                => 'Guardian: First name must has at least 2 characters.',
            'gfName.max'                => 'Guardian: First name must has less than 50 characters.',
            'gfName.alpha'              => 'Guardian: First name could not contain the number or special characters.',
            //for last name
            'glName.required'           => 'Guardian: last name must be filled.',
            'glName.min'                => 'Guardian: last name must has at least 2 characters.',
            'glName.max'                => 'Guardian: last name must has less than 50 characters.',
            'glName.alpha'              => 'Guardian: last name could not contain the number or special characters.',
            //for email
            'gemail.required'           => 'Guardian: Email address must be entered.',
            'gemail.email'              => 'Guardian: Invalid Email Entered.',
            //for phone number
            'gphone.regex'              => "Guardian: Invalid phone number format.",
            //for city
            'gcity.alpha'               => 'Guardian: City could not contain the number or special characters.',
            //for postal code
            'gpostal.regex'             => 'Guardian: Only canadian postal code format is accepted.',
            //for date of birth
            'gdob.after_or_equal'       => 'Guardian: Data of birth out of range',
            'gdob.before_or_equal'      => 'Guardian: Data of birth out of range',
            //for SIN number
            'gsin.regex'                => "Guardian: invalid SIN number.",
            //for guardian_relation
            'guardian_relation.alpha'   => "Guardian: Invalid relationship",
            //=============================== MEASUREMENT ERROR MESSAGES
            //for waist
            'waist.min'                 => "Measurement: The waist size is out of range (between 15~70 in)",
            'waist.max'                 => "Measurement: The waist size is out of range (between 15~70 in)",
            //for bust
            'bust.min'                  => "Measurement: The bust size is out of range (between 20~50 in)",
            'bust.max'                  => "Measurement: The bust size is out of range (between 20~50 in)",
            //for hips
            'hips.min'                  => "Measurement: The hips size is out of range (between 30~60 in)",
            'hips.max'                  => "Measurement: The hips size is out of range (between 30~60 in)",
            //for neck
            'neck.min'                  => "Measurement: The neck size is out of range (between 10~25 in)",
            'neck.max'                  => "Measurement: The neck size is out of range (between 10~25 in)",
            //for shoe
            'shoe.min'                  => "Measurement: The shoe size is out of range (between 3.5~15.5 in)",
            'shoe.max'                  => "Measurement: The shoe size is out of range (between 3.5~15.5 in)",
            'shoe.step'                 => "Measurement: The shoe size is out of range (0.5 steps accepted only)",
            //for insteam
            'insteam.min'               => "Measurement: The insteam size is out of range (between 20~40 in)",
            'insteam.max'               => "Measurement: The insteam size is out of range (between 20~40 in)",
            //=============================== NETWORKS ERROR MESSAGES
            //for NETWORKS
            'network0.alpha'            => "Social Media: Invalid social media name!",
            'network0.regex'            => "Social Media: Entered Social Media not in list",
            'network1.alpha'            => "Social Media: Invalid social media name!",
            'network1.regex'            => "Social Media: Entered Social Media not in list",
            'network2.alpha'            => "Social Media: Invalid social media name!",
            'network2.regex'            => "Social Media: Entered Social Media not in list",
            'network3.alpha'            => "Social Media: Invalid social media name!",
            'network3.regex'            => "Social Media: Entered Social Media not in list",
            'network4.alpha'            => "Social Media: Invalid social media name!",
            'network4.regex'            => "Social Media: Entered Social Media not in list",
            'network5.alpha'            => "Social Media: Invalid social media name!",
            'network5.regex'            => "Social Media: Entered Social Media not in list",    
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                //for applicant information
            'fName'             => 'required|max:50|min:2|alpha',
            'lName'             => 'required|max:50|min:2|alpha',
            'email'             => 'required|email',
            'phone'             => ['nullable','regex:/[0-9]{10}|[0-9]{3}-[0-9]{3}-[0-9]{4}|([0-9]{3})\s[0-9]{3}-[0-9]{4}|d{3}\s[0-9]{3}\s[0-9]{4}|d{3}\.[0-9]{3}\.[0-9]{4}/'],
            'address'           => 'nullable',
            'city'              => 'nullable|alpha',
            'postal'            => ['nullable','regex:/[a-zA-Z][0-9][a-zA-Z][0-9][a-zA-Z][0-9]|[a-zA-Z][0-9][a-zA-Z] [0-9][a-zA-Z][0-9]/'],
            'dob'               => ['nullable','date','after_or_equal:01/01/1940', 'before_or_equal:now - 1 year'],
            'sin'               => ['nullable','regex:/[0-9]{9}|[0-9]{3} [0-9]{3} [0-9]{3}|d{9}|[0-9]{3}-[0-9]{3}-[0-9]{3}/'],
                //for Guardian information
            'gfName'            => 'required|max:50|min:2|alpha',
            'glName'            => 'required|max:50|min:2|alpha',
            'gemail'            => 'required|email',
            'gphone'            => ['nullable','regex:/[0-9]{10}|[0-9]{3}-[0-9]{3}-[0-9]{4}|([0-9]{3})\s[0-9]{3}-[0-9]{4}|[0-9]{3}\s[0-9]{3}\s[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4}/'],
            'gaddress'          => 'nullable',
            'gcity'             => 'nullable|alpha',
            'gpostal'           => ['nullable','regex:/[a-zA-Z][0-9][a-zA-Z][0-9][a-zA-Z][0-9]|[a-zA-Z][0-9][a-zA-Z] [0-9][a-zA-Z][0-9]/'],
            'gdob'              => ['nullable','date','after_or_equal:01/01/1940', 'before_or_equal:now - 1 year'],
            'gsin'              => ['nullable','regex:/[0-9]{9}|[0-9]{3} [0-9]{3} [0-9]{3}|d{9}|[0-9]{3}-[0-9]{3}-[0-9]{3}/'],
            'guardian_relation' => 'required|alpha',

                //for measurements
            'waist'             => 'nullable|numeric|min:15|max:70',
            'bust'              => 'nullable|numeric|min:20|max:50',
            'hips'              => 'nullable|numeric|min:30|max:60',
            'neck'              => 'nullable|numeric|min:10|max:25',
            'sleeve'            => 'nullable|numeric',
            'dress'             => 'nullable|numeric|min:0|max:20',
            'shoe'              => 'nullable|numeric|min:3.5|max:15.5',
            'insteam'           => 'nullable|numeric|min:20|max:40',

                //networks
            'network0'          => ['nullable','alpha','regex:/[Ff]acebook|[Ww]hatsApp|[qQ][qQ]|[Ii]nstagram|[tT]witter|[Gg]oogle|[Pp]interest|[Ll]inkedIn|[Yy]ouTube|[Mm]eetup/'],
            'network1'          => ['nullable','alpha','regex:/[Ff]acebook|[Ww]hatsApp|[qQ][qQ]|[Ii]nstagram|[tT]witter|[Gg]oogle|[Pp]interest|[Ll]inkedIn|[Yy]ouTube|[Mm]eetup/'],
            'network2'          => ['nullable','alpha','regex:/[Ff]acebook|[Ww]hatsApp|[qQ][qQ]|[Ii]nstagram|[tT]witter|[Gg]oogle|[Pp]interest|[Ll]inkedIn|[Yy]ouTube|[Mm]eetup/'],
            'network3'          => ['nullable','alpha','regex:/[Ff]acebook|[Ww]hatsApp|[qQ][qQ]|[Ii]nstagram|[tT]witter|[Gg]oogle|[Pp]interest|[Ll]inkedIn|[Yy]ouTube|[Mm]eetup/'],
            'network4'          => ['nullable','alpha','regex:/[Ff]acebook|[Ww]hatsApp|[qQ][qQ]|[Ii]nstagram|[tT]witter|[Gg]oogle|[Pp]interest|[Ll]inkedIn|[Yy]ouTube|[Mm]eetup/'],
            'network5'          => ['nullable','alpha','regex:/[Ff]acebook|[Ww]hatsApp|[qQ][qQ]|[Ii]nstagram|[tT]witter|[Gg]oogle|[Pp]interest|[Ll]inkedIn|[Yy]ouTube|[Mm]eetup/'],
        ];
    }
}
