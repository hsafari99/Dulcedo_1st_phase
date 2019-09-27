<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//routes for login, password_reset, verify_mail and ask for password_reset
Auth::routes();

//accessing the root of the website leads to /home
Route::redirect('/', '/home');

//route for application form upon invitation
Route::get('/invite/{lang}', 'InviteController@index');

//routes for all registered users
Route::middleware('auth')->group(function () {

    //fetches private photos in storage
    Route::get('/photo/{path}', 'StorageController@getPhoto')->where('path', '.*');

    //homepage
    Route::get('/home', function () {
        return view('pages.all.home');
    });
    //homepage controls
    Route::post('/getRelevantApplications', 'homeController@show');

    //Search for applications
    Route::get('/searchApplications', 'SearchAppication@show');
    Route::post('/search', 'SearchAppication@searchApplication');
    Route::post('/applicant', 'SearchAppication@getContactById');
    Route::post('/event', 'SearchAppication@getEventById');
    Route::get('/results', 'SearchAppication@showResults');
    Route::post('/application', 'SearchAppication@getApplicationById');
    Route::post('/getStatusList', 'SearchAppication@getApplicationStatusList');
    Route::post('/searchStatus', 'SearchAppication@getApplicationByStatus');
    Route::post('/searchEvent', 'SearchAppication@getApplicationByEvent');
    Route::post('/deleteApplication', 'SearchAppication@deleteApplication');

    //Create new application (profile)
    Route::get('/createApplication', 'applicationController@showform');
    Route::post('/registerApplication', 'applicationController@registerApplication');
    Route::post('/test', 'applicationController@searchContact');
    Route::post('/populate', 'applicationController@populateData');
    Route::post('/getCountries', 'applicationController@getCountries');
    Route::post('/getScoutList', 'applicationController@getScoutList');
    Route::post('/getSources', 'applicationController@getSources');
    Route::post('/getEvents', 'applicationController@getEvents');
    Route::post('/getQuestions', 'applicationController@getQuestions');
});

//routes for the admins
Route::middleware(['auth', 'grantaccess:admin'])->group(function () {

    //user management page
    Route::get('/users', 'UserManagementController@index');

    //add a new user
    Route::post('/users/new', "UserManagementController@addUser");

    //edit a user
    Route::post('/users/edit/{id}', 'UserManagementController@editUser');
});

//routes for the headbookers
Route::middleware(['auth', 'grantaccess:headbooker'])->group(function () {});

//routes for the bookers
Route::middleware(['auth' /*, 'grantaccess:booker'*/])->group(function () {

    //get photos and measurements for the applicants
    Route::get('/invite/{id}/measurements', 'MeasurementsController@index');
});

//routes for the headscouts
Route::middleware(['auth', 'grantaccess:headscout'])->group(function () {});

//routes for the scouts
Route::middleware(['auth', 'grantaccess:scout'])->group(function () {
    Route::get('/form', 'talentSubmitForm@show');
    Route::post('/form_submit', 'talentSubmitForm@formSubmitionProcessing');
    // Route::post('/record', 'databaseConnector@recordTalent');
});
