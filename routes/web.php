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

Route::get('/', function () {
    //return view('welcome');
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('aircrafts', 'aircraftController');

Route::resource('aircraft_category', 'AircraftCategoryController');

Route::resource('aircraft_class', 'AircraftClassController');

Route::resource('crewmember_type', 'CrewmemberTypeController');

Route::resource('crewmember', 'CrewmemberController');

Route::resource('flight', 'FlightController');

Route::resource('airport', 'AirportController');

Route::get('crewmembersAjax', "CrewmemberController@crewmembersAjax");

Route::get("crewmemberTypeByIdAjax","CrewmemberTypeController@crewmemberTypeByIdAjax");

Route::get("crewmemberTypeByIdAjax/{id}","CrewmemberTypeController@crewmemberTypeByIdAjax");

Route::get("crewmemberTypesAjax", "CrewmemberTypeController@crewmemberTypesAjax");
Route::get("crewmemberByIdAjax/{id}","CrewmemberController@crewmemberByIdAjax");

/** Preferences */
Route::resource('preferences', 'PreferencesController');
Route::get("getPreferencesAjax","PreferencesController@getPreferencesAjax");

Route::get("flightCrewMemberAssignmentsByAjax/{id}", "FlightController@flightCrewMemberAssignmentsByAjax");
