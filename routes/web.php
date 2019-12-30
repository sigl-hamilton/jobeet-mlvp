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
Route::get('/user/profile', 'UserController@profile')->name('user-profile');
Route::get('/user/list', 'UserController@list')->name('user-list');

Route::get('/label/list', 'LabelController@list')->name('label-list');
Route::get('/label/create-form', 'LabelController@showCreateLabelForm')->name('label-create-form');
Route::post('/label/insert', 'LabelController@insert')->name('label-insert');

