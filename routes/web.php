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
Route::group(['middleware'=>['auth']], function () {
    Route::get('/', 'PagesController@home')->name('home');
    Route::get('/admin', 'Admin\PagesController@index')->name('admin.index');
    Route::get('/admin/table', 'Admin\MonitorController@table')->name('table');
    Route::get('/admin/pic', 'Admin\MonitorController@pic')->name('pic');
    Route::post('/admin/odata', 'Admin\MonitorController@odata');
    Route::post('/admin/ldata', 'Admin\MonitorController@ldata');

    // excel export
    Route::get('/monitor/export','Admin\ExcelController@export')->name('monitor.export');
    Route::get('/test', 'PagesController@test')->name('test');
    //Users
    Route::resource('users', 'Admin\UsersController');
    Route::POST('addUser','Admin\UsersController@addUser');
    Route::POST('deleteUser','Admin\UsersController@deleteUser');
    Route::POST('editUser','Admin\UsersController@editUser');
});
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


