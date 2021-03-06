<?php

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

Route::get('/',function(){return view('welcome');});
Route::get('/get','getDataController@index');

Route::get('/getProfiles','getProfilesController@index');


Route::get('/admin/admin/students','AdminGetStudentsController@admin');
Route::get('/admin/admin','AdminGetSchoolsController@admin');

Route::get('/admin','AdminController@admin');




Route::resource('login','LoginController');
Route::resource('wishes','WishController');

Route::get('wishes/{id}/{val}/edit','WishController@edit');

Route::get('/editAjax','EditAjaxController@index');


Route::resource('loginSchools','LoginSchoolsController');
Route::resource('schools','SchoolsController');

Route::resource('grades','GradesController');
