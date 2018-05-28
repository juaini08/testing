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

//homepage
Route::get('/home', 'HomeController@index')->name('home');

//user page
Route::resource('users', 'UserController');

//role page
Route::resource('roles', 'RoleController');

//post page
Route::resource('posts', 'PostController');

//permission page
Route::resource('permissions','PermissionController');