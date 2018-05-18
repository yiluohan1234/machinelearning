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
    Route::get('/profile', 'Admin\PagesController@profile')->name('profile');
    Route::get('/admin', 'Admin\PagesController@index')->name('admin.index');

    Route::get('/admin/table', 'Admin\MonitorController@table')->name('table');
    Route::get('/admin/table/data', 'Admin\MonitorController@tabledata');
    Route::get('/admin/pic', 'Admin\MonitorController@pic')->name('pic');
    Route::post('/admin/odata', 'Admin\MonitorController@odata');
    Route::post('/admin/filesystem', 'Admin\MonitorController@filesystem');

    // Users
    Route::resource('admin/users', 'Admin\UsersController');
    Route::POST('admin/addUser','Admin\UsersController@addUser');
    Route::POST('admin/deleteUser','Admin\UsersController@deleteUser');
    Route::POST('admin/editUser','Admin\UsersController@editUser');
    // roles
    Route::resource('admin/roles', 'Admin\RolesController');
    Route::POST('admin/addRole','Admin\RolesController@addRole');
    Route::POST('admin/deleteRole','Admin\RolesController@deleteRole');
    Route::POST('admin/editRole','Admin\RolesController@editRole');
    // permissions
    Route::resource('admin/permissions', 'Admin\PermissionsController');
    Route::POST('admin/addPermission','Admin\PermissionsController@addPermission');
    Route::POST('admin/deletePermission','Admin\PermissionsController@deletePermission');
    Route::POST('admin/editPermission','Admin\PermissionsController@editPermission');

    //test
    Route::get('/test/icons', 'PagesController@icons')->name('test.icons');
    Route::get('/admin/bootstraptable', 'PagesController@bootstraptable');
    Route::get('/admin/test', 'PagesController@test');

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


