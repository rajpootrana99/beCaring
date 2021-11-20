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
})->middleware(['role:Admin|Company|Moderator'])->name('index');

Route::resource('nurse', 'Admin\NurseController')->middleware('permission:Manage Nurse');
Route::get('fetchNurses', 'Admin\NurseController@fetchNurses')->middleware('permission:Show Nurse');

Route::resource('patient', 'Admin\PatientController')->middleware('permission:Manage Patient');

Route::resource('appointment', 'Admin\AppointmentController')->middleware('permission:Manage Appointments');
Route::get('fetchAppointments', 'Admin\AppointmentController@fetchAppointments')->middleware('permission:Show Appointments');

Route::resource('notification', 'Admin\NotificationController')->middleware('permission:Manage Notification');
Route::get('fetchNotifications', 'Admin\NotificationController@fetchNotifications')->middleware('permission:Show Notification');

Route::resource('medication', 'Admin\MedicationController')->middleware('permission:Manage Medication');
Route::get('fetchMedications', 'Admin\MedicationController@fetchMedications')->middleware('permission:Show Medication');

Route::resource('wishList', 'Admin\WishListController')->middleware('permission:Manage Wish List');
Route::get('fetchWishLists', 'Admin\WishListController@fetchWishLists')->middleware('permission:Show Wish List');

Route::resource('company', 'Admin\CompanyController')->middleware('permission:Manage Company');
Route::get('fetchCompanies', 'Admin\CompanyController@fetchCompanies')->middleware('permission:Show Company');

Route::resource('role', 'Admin\RoleController')->middleware('permission:Manage Role');
Route::get('fetchRoles', 'Admin\RoleController@fetchRoles')->middleware('permission:Show Role');

Route::resource('training', 'Admin\TrainingController')->middleware('permission:Manage Training');
Route::get('fetchTrainings', 'Admin\TrainingController@fetchTrainings')->middleware('permission:Show Training');

Route::resource('employee', 'Admin\EmployeeController')->middleware('permission:Manage Employee');
Route::get('fetchEmployees', 'Admin\EmployeeController@fetchEmployees')->middleware('permission:Show Employee');

require __DIR__ . '/auth.php';
