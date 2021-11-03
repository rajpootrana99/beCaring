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
})->middleware(['is_admin'])->name('index');

Route::resource('nurse', 'Admin\NurseController')->middleware(['is_admin']);
Route::get('fetchNurses', 'Admin\NurseController@fetchNurses')->middleware(['is_admin']);

Route::resource('patient', 'Admin\PatientController')->middleware('is_admin');
Route::get('fetchPatients', 'Admin\PatientController@fetchPatients')->middleware(['is_admin']);

Route::resource('appointment', 'Admin\AppointmentController')->middleware('is_admin');
Route::get('fetchAppointments', 'Admin\AppointmentController@fetchAppointments')->middleware(['is_admin']);

Route::resource('notification', 'Admin\NotificationController')->middleware('is_admin');
Route::get('fetchNotifications', 'Admin\NotificationController@fetchNotifications')->middleware(['is_admin']);

Route::resource('medication', 'Admin\MedicationController')->middleware('is_admin');
Route::get('fetchMedications', 'Admin\MedicationController@fetchMedications')->middleware(['is_admin']);

Route::resource('wishList', 'Admin\WishListController')->middleware('is_admin');
Route::get('fetchWishLists', 'Admin\WishListController@fetchWishLists')->middleware(['is_admin']);

require __DIR__ . '/auth.php';
