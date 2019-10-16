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

    Route::get('/form', 'talentSubmitForm@show');
    Route::post('/form_submit', 'talentSubmitForm@formSubmitionProcessing');

    //Route::post('/test', 'applicationController@test');

