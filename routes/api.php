<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::post('admin-login', 'API\AdminControoler@login');
Route::post('admin-register', 'API\AdminControoler@register');

Route::get('getUsers','API\UserController@getUsers');

Route::post('storeAppointment','API\AppointmentsController@store');
Route::delete('deleteAppointment/{appointmentId}','API\AppointmentsController@delete');
Route::get('getAppointments','API\AppointmentsController@getAppointment');
Route::get('getUserAppointment/{user_id}','API\AppointmentsController@getUserAppointment');
Route::get('getAllUsersAppo','API\AppointmentsController@getAllUsersAppo');



Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});

