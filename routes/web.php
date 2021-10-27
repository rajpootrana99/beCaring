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
Route::resource('patient', 'Admin\PatientController')->middleware('is_admin');
Route::get('fetchPatients', 'Admin\PatientController@fetchPatients')->middleware(['is_admin']);
require __DIR__.'/auth.php';
