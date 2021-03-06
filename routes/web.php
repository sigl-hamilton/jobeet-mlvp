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
Route::get('/user/notifications/{id}', 'UserController@notifications')->name('user.notifications');
Route::get('/user/index/{id}', 'UserController@index')->name('user.index');
Route::get('/user/list', 'UserController@list')->name('user.list');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('/user/update/{id}', 'UserController@update')->name('user.update');

Route::get('/notification/read/{id}', 'NotificationController@read')->name('notification.read');

Route::get('/job/list', 'JobController@list')->name('job.list');
Route::get('/job/index/{id}', 'JobController@index')->name('job.index');
Route::get('/job/edit/{id}', 'JobController@edit')->name('job.edit');
Route::put('/job/update/{id}', 'JobController@update')->name('job.update');
Route::post('/job/insert/{id}', 'JobController@insert')->name('job.insert');
Route::get('/job/create', 'JobController@create')->name('job.create');
Route::post('/job/delete/{id}', 'JobController@delete')->name('job.delete');
Route::post('/job/apply/{job_id}/user/{user_id}', 'JobController@apply')->name('job.apply');

Route::get('/company/list', 'CompanyController@list')->name('company.list');
Route::get('/company/index/{id}', 'CompanyController@index')->name('company.index');
Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');
Route::put('/company/update/{id}', 'CompanyController@update')->name('company.update');

Route::get('/label/list', 'LabelController@list')->name('label.list');
Route::get('/label/create-form', 'LabelController@showCreateLabelForm')->name('label.create');
Route::post('/label/insert', 'LabelController@insert')->name('label.insert');

Route::get('/chat/index', 'ChatkitController@index');
Route::post('/chat/join', 'ChatkitController@join');
Route::get('/chat/chat', 'ChatkitController@chat')->name('chat');
Route::post('/chat/logout', 'ChatkitController@logout')->name('chat.logout');
