<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TalentsValidation;

class talentSubmitForm extends Controller
{
    public function show()
    {
        return view('/pages/scout/talent/new', $data = []);
    }

    public function formSubmitionProcessing(TalentsValidation $request)
    {
        $validated = $request->validated();
        $createdTalentId = (app('App\Http\Controllers\databaseController')->recordTalent($validated));
        app('App\Http\Controllers\storageController')->recordTalentImages($request, $createdTalentId);

        return redirect('form')->with('success', 'new Talent has been successfully added');
    }
}