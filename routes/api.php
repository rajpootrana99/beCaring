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
Route::post('completeProfile', 'NurseController@completeProfile')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::post('setInterviewDate', 'NurseController@setInterviewDate')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('nurse', 'NurseController@nurse')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('nurseLogout', 'NurseController@logout')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::post('nurseUpdate/{nurse}', 'NurseController@update')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('fetchReward', 'NurseController@fetchReward')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

//AppointmentController Routes
Route::get('fetchAppointments', 'AppointmentController@fetchAppointments')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('fetchBookings', 'AppointmentController@fetchBookings')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('fetchPastBookings', 'AppointmentController@fetchPastBookings')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::post('bookAppointment', 'AppointmentController@bookAppointment')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::post('completeAppointment', 'AppointmentController@completeAppointment')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::post('fetchAppointmentDetails', 'AppointmentController@fetchAppointmentDetails')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

//MedicationController Route
Route::get('fetchPatients', 'MedicationController@fetchPatients')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('fetchNurseMedication', 'MedicationController@fetchNurseMedication')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('fetchPatientMedication', 'MedicationController@fetchPatientMedication')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::post('createMedication', 'MedicationController@createMedication')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

//WishListController Route
Route::post('wishList', 'WishListController@store');

//TrainingController Route
Route::post('markVideoComplete', 'TrainingController@markVideoComplete')->middleware(['auth:api', 'role:Nurse', 'is_approved']);
Route::get('fetchTrainingVideos', 'TrainingController@fetchTrainingVideos')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

//PatientController Route
Route::post('patientDetail', 'PatientController@patientDetail')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

//FeedbackController Route
Route::post('sendFeedback', 'FeedbackController@sendFeedback')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

//HelpController Route
Route::get('fetchHelps', 'HelpController@fetchHelps')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

//NotificationController Route
Route::get('fetchNotifications', 'NotificationController@fetchNotifications')->middleware(['auth:api', 'role:Nurse', 'is_approved']);

