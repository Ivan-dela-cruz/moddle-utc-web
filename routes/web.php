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
Route::get('dashboard/courses/detail','Admin\DashboardController@detailByCourses')->name('detailcourses');
Auth::routes();
Route::namespace('Admin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
       // Route::group(['middleware' => 'role:Administrador'], function() {

        Route::group(['middleware' => ['permission:create_ac_period|update_ac_period|destroy_ac_period|read_ac_period']], function () {
            Route::get('dashboard/periods','DashboardController@periods')->name('periods');
        });
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('dashboard','DashboardController@index')->name('dashboard');

        Route::group(['middleware' => ['permission:create_subject|update_subject|destroy_subject|read_subject']], function () {
            Route::get('dashboard/subjects','DashboardController@subjects')->name('subjects');
        });
        Route::group(['middleware' => ['role:SuperAdmin']], function () {
            Route::get('dashboard/roles','DashboardController@roles')->name('roles');
        });
        Route::group(['middleware' => ['permission:create_student|update_student|destroy_student|read_student']], function () {

            Route::get('dashboard/students','DashboardController@students')->name('students');

        });
        Route::group(['middleware' => ['permission:create_techier|update_techier|destroy_techier|read_techier']], function () {
            Route::get('dashboard/teachers','DashboardController@teachers')->name('teachers');
        });

        Route::group(['middleware' => ['permission:create_level|update_level|destroy_level|read_level']], function () {
            Route::get('dashboard/levels','DashboardController@levels')->name('levels');
        });
        Route::group(['middleware' => ['permission:create_task|update_task|destroy_task|read_task']], function () {
            Route::get('dashboard/tasks','DashboardController@tasks')->name('tasks');
        });
        Route::group(['middleware' => ['permission:create_file|update_file|destroy_file|read_file']], function () {
            Route::get('dashboard/files','DashboardController@files')->name('files');
        });

        Route::get('dashboard/student-period-level','DashboardController@periodsStudent')->name('levelstudent');
        Route::get('dashboard/student-level-course','DashboardController@courseStudent')->name('coursebystudent');

        //Code
        Route::group(['middleware' => ['permission:create_user|update_user|destroy_user|read_user']], function () {
            Route::get('dashboard/users','DashboardController@users')->name('users');
        });
        Route::group(['middleware' => ['permission:create_file|update_file|destroy_file|read_file']], function () {
            Route::get('dashboard/practices','DashboardController@practices')->name('practices');
        });
        Route::group(['middleware' => ['permission:create_file|update_file|destroy_file|read_file']], function () {
            Route::get('dashboard/cs_activities','DashboardController@cs_activities')->name('cs_activities');
        });
        Route::get('dashboard/profile','DashboardController@profile')->name('view.profile');

        Route::group(['middleware' => ['permission:create_education|update_education|destroy_education|read_education']], function () {
            Route::get('dashboard/continuing-education','DashboardController@education_create')->name('education.create');
            Route::get('dashboard/continuing-education/list','DashboardController@education_list')->name('education.list');
        });


    });
});

Route::post('files/upload/store','Admin\DashboardController@fileStore')->name('store.filesTask');
Route::post('files/delete','Admin\DashboardController@fileDestroy')->name('destroy.filesTask');
Route::post('files/load','Admin\DashboardController@fileLoad')->name('load.filesTask');
