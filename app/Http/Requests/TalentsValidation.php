<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TalentsValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->user()->hasAccess('scout');
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                    'firstName'        => 'required|alpha|min:2|max:25',
                    'lastName'         => 'required|alpha|min:2|max:25',
                    'height_feet'      => 'required',
                    'height_inches'    => 'required',
                    'phone'            => 'required',
                    'email'            => 'required|email',
                    'remark'           => 'nullable',
                    'faceshot'         => 'nullable|file|image|max:2048',
                    'profile'          => 'nullable|file|image|max:2048',
                    'waistup'          => 'nullable|file|image|max:2048',
                    'headtotoes'       => 'nullable|file|image|max:2048',
                    'extra1'           => 'nullable|file|image|max:2048',
                    'extra2'           => 'nullable|file|image|max:2048',
                    'extra3'           => 'nullable|file|image|max:2048',
                    'extra4'           => 'nullable|file|image|max:2048',
                ];
    }
}
