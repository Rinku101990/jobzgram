<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login','Api\LoginController@login');
Route::post('register','Api\RegisterController@register');
Route::get('categories','Api\UserController@category');
Route::get('membershipPackages','Api\UserController@membershipPackages');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('verifyProfileOtpSend','Api\RegisterController@verifyProfileOtpSend');
    Route::post('verifyProfileOtp','Api\RegisterController@verifyProfileOtp');
    Route::post('editProfile','Api\UserController@editProfile');
    Route::post('uploadMedia','Api\UserController@uploadMedia');
    Route::get('uploadMediaList','Api\UserController@uploadMediaList');
    Route::post('deleteMedia','Api\UserController@deleteMedia');
    #project
    Route::post('addProject','Api\UserController@addProject');
    Route::get('projectList','Api\UserController@projectList');
    Route::post('editProject','Api\UserController@editProject');
    Route::post('deleteProject','Api\UserController@deleteProject');
    #Job
    Route::post('addEditJob','Api\JobController@addJob');
    Route::post('deleteJob','Api\JobController@deleteJob');
    Route::post('myJobList','Api\JobController@myJobList');
});


/*--- Zoom::Video Calling Application Integration ---*/ 

// Get list of meetings.
Route::get('/meetings', 'Zoom\MeetingController@list');

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings', 'Zoom\MeetingController@create');
// Get information of the meeting room by ID.
Route::get('/meetings/{id}', 'Zoom\MeetingController@get')->where('id', '[0-9]+');
//Route::patch('/meetings/{id}', 'Zoom\MeetingController@update')->where('id', '[0-9]+');
Route::delete('/meetings/{id}', 'Zoom\MeetingController@delete')->where('id', '[0-9]+');