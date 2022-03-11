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

Route::resource('students', 'StudentController');

Route::get('mail','StudentController@mail');
Route::post('send-mail','StudentController@sendMail');
//
//Route::post('student-search','StudentController@search');

Route::get('export', 'StudentController@export');
Route::get('importFile', 'StudentController@importFile');
Route::post('import', 'StudentController@import');

//spa
Route::get("spa/students", function(){
    return view("spa.students.index");
});

//API
Route::apiResource('api/ajax-students', 'WebApi\StudentApiController');
Route::apiResource('api/majors', 'WebApi\MajorApiController');



