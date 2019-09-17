<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeasurementsController extends Controller
{
    public function index($id) {

        return view('pages.booker.talent.measure');
    }
}
