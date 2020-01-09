<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function()
{
	Route::resource('users','UserController');
	Route::resource('bachelor','BachelorController');
	Route::resource('patient','PatientController');
	Route::resource('medicine', 'MedicineController');
	Route::resource('diagnosis','DiagnosisController');
	Route::controller('/','AdminController');
});

Route::controller('/','PagesController');



