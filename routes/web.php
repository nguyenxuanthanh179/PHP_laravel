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

Route::get('/', function () {
    return view('welcome');
});

Route::get('faculty', 'FacultyController@index')->name('faculty.index'); // Hiển thị danh sách khoa
Route::get('faculty/create', 'FacultyController@create')->name('faculty.create'); // Thêm mới khoa
Route::post('faculty/store', 'FacultyController@store')->name('faculty.store');; // Xử lý thêm mới khoa
Route::get('faculty/{id}/edit', 'FacultyController@edit')->name('faculty.edit'); //Sửa khoa
Route::post('faculty/{id}/update', 'FacultyController@update')->name('faculty.update'); // Xử lý sửa khoa
Route::get('faculty/{id}/delete', 'FacultyController@destroy')->name('faculty.delete');; // Xóa khoa
