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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'roles','roles' => ['super_admin']],function(){
    Route::get('super_admin','Controller@super_admin');
    Route::resource('registrations','RegistrationController');
    Route::get('/getusers','RegistrationController@getUsers');
});
