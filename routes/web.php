<?php

use App\Models\Student;
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


Route::resource('faculties', FacultyController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('students', StudentController::class);

Route::delete('/marks/{marks}/delete', 'StudentController@markDelete')->name('marks.delete');
Route::get('/marks/{marks}/edit', 'StudentController@markEdit')->name('marks.edit');
Route::post('/marks/store', 'StudentController@markStore')->name('marks.store');

