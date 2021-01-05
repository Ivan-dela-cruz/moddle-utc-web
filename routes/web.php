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
Route::get('dashboard/courses','Admin\DashboardController@courses')->name('courses');
Auth::routes();
Route::get('dashboard/periods','Admin\DashboardController@periods')->name('periods');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
Route::get('dashboard/subjects','Admin\DashboardController@subjects')->name('subjects');
Route::get('dashboard/roles','Admin\DashboardController@roles')->name('roles');
Route::get('dashboard/students','Admin\DashboardController@students')->name('students');

Route::get('dashboard/teachers','Admin\DashboardController@teachers')->name('teachers');
Route::get('dashboard/levels','Admin\DashboardController@levels')->name('levels');
Route::get('dashboard/tasks','Admin\DashboardController@tasks')->name('tasks');
Route::get('dashboard/files','Admin\DashboardController@files')->name('files');

Route::get('dashboard/student-period-level','Admin\DashboardController@periodsStudent')->name('levelstudent');

