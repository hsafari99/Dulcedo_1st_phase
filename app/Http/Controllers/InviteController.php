<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function index($lang) {

        //get countries
        $countries = App\Models\Country::all();
        //get sources
        $discoveries = App\Models\Source::all();
        //get language
        App::setLocale($lang);
        //retrive all questions
        $questions = Question::all();

        //return view with data
        return view('pages.invite', [
            'lang' => $lang,
            'questions' => $questions,
            'countries' => $countries,
            'discoveries' => $discoveries
        ]);
    }
}