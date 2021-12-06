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

//NurseForgotController Routes
Route::post('forgot', 'NurseForgotController@forgot');
Route::post('reset', 'NurseForgotController@reset');
Route::post('checkToken', 'NurseForgotController@checkToken');

//NurseController Routes
Route::post('nurseLogin', 'NurseController@login');
Route::post('nurseRegister', 'NurseController@register');
Route::post('verifyToken', 'NurseController@verifyToken');
Route::post('verifyEmail', 'NurseController@verifyEmail');
Route::post('completeProfile', 'NurseController@completeProfile')->middleware('auth:api');
Route::post('setInterviewDate', 'NurseController@setInterviewDate')->middleware('auth:api');
Route::get('nurse', 'NurseController@nurse')->middleware('auth:api');
Route::get('nurseLogout', 'NurseController@logout')->middleware('auth:api');
Route::get('nurseIndex', 'NurseController@index')->middleware('auth:api');
Route::post('nurseUpdate/{nurse}', 'NurseController@update')->middleware('auth:api');

//AppointmentController Routes
Route::get('fetchAppointments', 'AppointmentController@fetchAppointments')->middleware('auth:api');
Route::get('fetchBookings', 'AppointmentController@fetchBookings')->middleware('auth:api');
Route::get('fetchPastBookings', 'AppointmentController@fetchPastBookings')->middleware('auth:api');
Route::post('bookAppointment', 'AppointmentController@bookAppointment')->middleware('auth:api');
Route::post('completeAppointment', 'AppointmentController@completeAppointment')->middleware('auth:api');

//MedicationController Route
Route::get('fetchPatients', 'MedicationController@fetchPatients')->middleware('auth:api');
Route::get('fetchNurseMedication', 'MedicationController@fetchNurseMedication')->middleware('auth:api');
Route::get('fetchPatientMedication', 'MedicationController@fetchPatientMedication')->middleware('auth:api');
Route::post('createMedication', 'MedicationController@createMedication')->middleware('auth:api');

//WishListController Route
Route::post('wishList', 'WishListController@store');

//TrainingController Route
Route::post('markVideoComplete', 'TrainingController@markVideoComplete')->middleware('auth:api');
Route::get('fetchTrainigVideos', 'TrainingController@fetchTrainigVideos')->middleware('auth:api');

//PatientController Route
Route::post('patientDetail', 'PatientController@patientDetail')->middleware('auth:api');
