<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class StorageController extends Controller
{
    public function getPhoto($path) {

        try {
            $photo = storage_path('photos/'.$path);
            $response = response()->file($photo);
        } catch (Exception $ex) {
            $photo = storage_path('photos/default/noimage.jpg');
            $response = response()->file($photo);
        }

        return $response;
    }

        //This function will create a folder with the talentID and put the photos there
    public function recordTalentImages(Request $request, string $talentID){
        $directory = "/$talentID";
        Storage::makeDirectory($directory);
        if ($request->hasFile('faceshot')){
            $request->file('faceshot')->storeAs($directory, 'faceshot'.$request->file('faceshot')->getClientOriginalExtension());
        }
        if ($request->hasFile('profile')){
            $request->file('profile')->storeAs($directory, 'profile'.$request->file('profile')->getClientOriginalExtension());
        }
        if ($request->hasFile('waistup')){
            $request->file('waistup')->storeAs($directory, 'waistup'.$request->file('waistup')->getClientOriginalExtension());
        }
        if ($request->hasFile('headtotoes')){
            $request->file('headtotoes')->storeAs($directory, 'headtotoes'.$request->file('headtotoes')->getClientOriginalExtension());
        }
        if ($request->hasFile('extra1')){
            $request->file('extra1')->storeAs($directory, 'extra1'.$request->file('extra1')->getClientOriginalExtension());
        }        
        if ($request->hasFile('extra2')){
            $request->file('extra2')->storeAs($directory, 'extra2'.$request->file('extra2')->getClientOriginalExtension());
        }
        if ($request->hasFile('extra3')){
            $request->file('extra3')->storeAs($directory, 'extra3'.$request->file('extra3')->getClientOriginalExtension());
        }
        if ($request->hasFile('extra4')){
            $request->file('extra4')->storeAs($directory, 'extra4'.$request->file('extra4')->getClientOriginalExtension());
        }
        app('App\Http\Controllers\LogController')->LogAction(Auth()->user()->id, $talentID, "New Talent Image(s) Added To Storage Folder");
    }
}
