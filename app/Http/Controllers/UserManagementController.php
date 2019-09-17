<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class UserManagementController extends Controller
{

    const ROLES = [
        'admin', 'headbooker', 'booker', 'headscout', 'scout'
    ];

    public function index() {

        $users = User::all();
        $headscouts = User::whereIn('roles', ['headscout'])->get();

        return view('pages.admin.users.manage',[
                "users" => $users,
                "headscouts" => $headscouts,
                "roles" => self::ROLES
        ]);
    }

    public function addUser() {

        try{
            $user = new User;
            $contact = new Contact;

            $password = request("new-password");
            $hashPassword = Hash::make($password);

            $contact->firstname = request('new-firstname');
            $contact->lastname = request('new-lastname');
            $user->username = request('new-username');
            $contact->email = request('new-email');
            $user->password = $hashPassword;

            $user->contact()->associate($contact);
            $user->save();
            return redirect('/users')->with('success', 'A new user has been created.');

        } catch (Exception $ex) {
            return redirect('/users')->with('error', "User couldn't be added. Make sure their email and username are unique and that all required fields have been filled.");
        }
    }

    public function editUser($id) {

        //get the user to edit
        $user = User::find($id);
        $contact = $user->contact;

        //edit the user infos and/or password
        try {
            //check whether the user was a headscout before being modified
            $wasHeadscout = $user->hasAccess('headscout');

            //edit basic info
            $contact->firstname = request('edit-firstname');
            $contact->lastname = request('edit-lastname');
            $user->username = request('edit-username');
            $contact->email = request('edit-email');

            //edit roles
            //check for each new roles
            foreach (self::ROLES as $role) {
                if (request('edit-'.$role) === 'on')
                    $user->addRole($role);
                else
                    $user->removeRole($role);
            }

            //if the user was a headscout and their group isn't empty, redirect to users with an error
            if ($wasHeadscout && request('edit-headscout') !== 'on') {
                if (!empty($user->scout_group()->scouts))
                    return redirect('/users')->with('error', 'You need to switch all subscouts to another headscout before removing this user from headscouts');
            }

            //edit password if requested
            $password = request("edit-password");
            if(isset($password)) {
                $hashPassword = Hash::make($password);
                $user->password = $hashPassword;
            }

            //save the new infos
            $user->contact()->associate($contact);
            $user->save();
            return redirect('/users')->with('success', 'The informations have been changed.');

        } catch (Exception $ex) {
            return redirect('/users')->with('error', "User couldn't be edited. Make sure all fields have valid information.");
        }
    }
}
