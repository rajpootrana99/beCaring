<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('index');
})->middleware(['role:Admin|Company|Moderator','is_approved','auth'])->name('index');

Route::resource('carer', 'Admin\NurseController')->middleware(['permission:Manage Nurse', 'auth']);
Route::get('fetchNurses', 'Admin\NurseController@fetchNurses')->middleware(['permission:Show Nurse', 'auth']);

Route::resource('patient', 'Admin\PatientController')->middleware(['permission:Manage Patient', 'auth']);
Route::get('fetchPatients', 'Admin\PatientController@fetchPatients')->middleware(['permission:Show Appointments', 'auth']);

Route::resource('appointment', 'Admin\AppointmentController')->middleware(['permission:Manage Appointments', 'auth']);
Route::get('fetchAppointments', 'Admin\AppointmentController@fetchAppointments')->middleware(['permission:Show Appointments', 'auth']);
Route::post('createPatient', 'Admin\AppointmentController@createPatient')->middleware(['permission:Manage Appointments', 'auth']);

Route::resource('notification', 'Admin\NotificationController')->middleware(['permission:Manage Notification', 'auth']);
Route::get('fetchNotifications', 'Admin\NotificationController@fetchNotifications')->middleware(['permission:Show Notification', 'auth']);

Route::resource('medication', 'Admin\MedicationController')->middleware(['permission:Manage Medication', 'auth']);
Route::get('fetchMedications', 'Admin\MedicationController@fetchMedications')->middleware(['permission:Show Medication', 'auth']);

Route::resource('wishList', 'Admin\WishListController')->middleware(['permission:Manage Wish List', 'auth']);
Route::get('fetchWishLists', 'Admin\WishListController@fetchWishLists')->middleware(['permission:Show Wish List', 'auth']);

Route::resource('company', 'Admin\CompanyController')->middleware(['permission:Manage Company', 'auth']);
Route::get('fetchCompanies', 'Admin\CompanyController@fetchCompanies')->middleware(['permission:Show Company', 'auth']);
Route::get('approveUser/{user}', 'Auth\RegisteredUserController@approveUser')->middleware(['permission:Manage Company|Manage Nurse', 'auth']);

Route::resource('role', 'Admin\RoleController')->middleware(['permission:Manage Role', 'auth']);
Route::get('fetchRoles', 'Admin\RoleController@fetchRoles')->middleware(['permission:Show Role', 'auth']);

Route::resource('training', 'Admin\TrainingController')->middleware(['permission:Manage Training', 'auth']);
Route::get('fetchTrainings', 'Admin\TrainingController@fetchTrainings')->middleware(['permission:Show Training', 'auth']);

Route::resource('employee', 'Admin\EmployeeController')->middleware(['permission:Manage Employee', 'auth']);
Route::get('fetchEmployees', 'Admin\EmployeeController@fetchEmployees')->middleware(['permission:Show Employee', 'auth']);

Route::resource('help', 'Admin\HelpController')->middleware(['permission:Manage Help', 'auth']);
Route::get('fetchHelps', 'Admin\HelpController@fetchHelps')->middleware(['permission:Show Help', 'auth']);

Route::resource('feedback', 'Admin\FeedbackController')->middleware(['permission:Manage Feedback', 'auth']);
Route::get('fetchFeedbacks', 'Admin\FeedbackController@fetchFeedbacks')->middleware(['permission:Show Feedback', 'auth']);

Route::resource('earnings', 'Admin\EarningsController')->middleware(['permission:Manage Earnings', 'auth']);
Route::get('fetchEarnings', 'Admin\EarningsController@fetchEarnings')->middleware(['permission:Show Earnings', 'auth']);
Route::get('approveEarning/{earning}', 'Admin\EarningsController@approveEarning')->middleware(['permission:Manage Earnings', 'auth']);

Route::resource('chat', 'Admin\ChatController')->middleware(['permission:Manage Chat', 'auth']);
require __DIR__ . '/auth.php';
