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

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/profile', 'UserController@profile')->name('user.profile');
Route::get('/user/list', 'UserController@list')->name('user.list');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('/user/update/{id}', 'UserController@update')->name('user.update');

Route::get('/job/list', 'JobController@list')->name('job.list');
Route::get('/job/index/{id}', 'JobController@index')->name('job.index');
Route::get('/job/edit/{id}', 'JobController@edit')->name('job.edit');
Route::put('/job/update/{id}', 'JobController@update')->name('job.update');
Route::post('/job/insert/{id}', 'JobController@insert')->name('job.insert');
Route::get('/job/create', 'JobController@create')->name('job.create');

Route::get('/company/list', 'CompanyController@list')->name('company.list');
Route::get('/company/index/{id}', 'CompanyController@index')->name('company.index');
Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');
Route::put('/company/update/{id}', 'CompanyController@update')->name('company.update');

Route::get('/label/list', 'LabelController@list')->name('label.list');
Route::get('/label/create-form', 'LabelController@showCreateLabelForm')->name('label.create');
Route::post('/label/insert', 'LabelController@insert')->name('label.insert');

