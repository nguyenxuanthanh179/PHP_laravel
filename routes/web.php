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

Route::delete('/students/{student}/delete', 'StudentController@delete')->name('students.delete');
Route::get('/marks/create', 'StudentController@markCreate')->name('marks.create');

