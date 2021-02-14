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


Auth::routes();
Route::namespace('Admin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
       // Route::group(['middleware' => 'role:Administrador'], function() {

        //CURSOS
        Route::group(['middleware' => ['permission:create_course|update_course|destroy_course|read_course']], function () {
            Route::get('dashboard/courses','DashboardController@courses')->name('courses');
            Route::get('dashboard/courses/detail','DashboardController@detailByCourses')->name('detailcourses');
        });
        //PERIODOS
        Route::group(['middleware' => ['permission:create_ac_period|update_ac_period|destroy_ac_period|read_ac_period']], function () {
            Route::get('dashboard/periods','DashboardController@periods')->name('periods');
        });
        //HOME
        Route::get('/home', 'HomeController@index')->name('home');
        //DASHBOARD
        Route::get('dashboard','DashboardController@index')->name('dashboard');

        //MATERIAS
        Route::group(['middleware' => ['permission:create_subject|update_subject|destroy_subject|read_subject']], function () {
            Route::get('dashboard/subjects','DashboardController@subjects')->name('subjects');
        });
        //ROLES
        Route::group(['middleware' => ['role:SuperAdmin']], function () {
            Route::get('dashboard/roles','DashboardController@roles')->name('roles');
        });
        //STUDENT
        Route::group(['middleware' => ['permission:create_student|update_student|destroy_student|read_student']], function () {

            Route::get('dashboard/students','DashboardController@students')->name('students');
            Route::get('dashboard/student-period-level','DashboardController@periodsStudent')->name('levelstudent');

        });
        //TEACGER
        Route::group(['middleware' => ['permission:create_techier|update_techier|destroy_techier|read_techier']], function () {
            Route::get('dashboard/teachers','DashboardController@teachers')->name('teachers');
        });

        //LEVEL
        Route::group(['middleware' => ['permission:create_level|update_level|destroy_level|read_level']], function () {
            Route::get('dashboard/levels','DashboardController@levels')->name('levels');
        });
        //TASK
        Route::group(['middleware' => ['permission:create_task|update_task|destroy_task|read_task']], function () {
            Route::get('dashboard/tasks','DashboardController@tasks')->name('tasks');
            Route::get('dashboard/tasks/detail','DashboardController@detailTask')->name('detailtasks');
            Route::get('dashboard/tasks/delivery','DashboardController@deliveryTaskStudent')->name('deliverytasks');
        });
        //FILE
        Route::group(['middleware' => ['permission:create_file|update_file|destroy_file|read_file']], function () {
            Route::get('dashboard/files','DashboardController@files')->name('files');
        });


        //USER
        Route::group(['middleware' => ['permission:create_user|update_user|destroy_user|read_user']], function () {
            Route::get('dashboard/users','DashboardController@users')->name('users');
        });
        //VINCULACION
        Route::group(['middleware' => ['permission:create_vp|update_vp|destroy_vp|read_vp']], function () {
            Route::get('dashboard/practices','DashboardController@practices')->name('practices');
            Route::get('dashboard/cs_activities','DashboardController@cs_activities')->name('cs_activities');
        });
       
        //PROFILE
        Route::get('dashboard/profile','DashboardController@profile')->name('view.profile');

        //EDUCATION
        Route::group(['middleware' => ['permission:create_education|update_education|destroy_education|read_education']], function () {
            Route::get('dashboard/continuing-education','DashboardController@education_create')->name('education.create');
            Route::get('dashboard/continuing-education/list','DashboardController@education_list')->name('education.list');
        });


    });
});

//RUTAS PAR ARCHIVOS DE AREAS
Route::post('files/upload/store','Admin\DashboardController@fileStore')->name('store.filesTask');
Route::post('files/delete','Admin\DashboardController@fileDestroy')->name('destroy.filesTask');
Route::post('files/load','Admin\DashboardController@fileLoad')->name('load.filesTask');

///RUTAS PARA ENTREGA DE TAREAS
Route::post('files/upload/store/student','Admin\FileController@fileStore')->name('store.filesTaskStudent');
Route::post('files/delete/student','Admin\FileController@fileDestroy')->name('destroy.filesTaskStudent');
Route::post('files/load/student','Admin\FileController@fileLoad')->name('load.filesTaskStudent');
Route::get('files/download/{id}','Admin\FileController@downloadFile')->name('download-delivery');
