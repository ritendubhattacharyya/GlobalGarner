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

// Route::group(['middleware' => 'admin.check'], function() {
//     Route::get('/home', 'ProductController@index')->name('home')->middleware('auth', 'admin.check');
// });
Route::get('/user', 'UserController@index')->name('user');
Route::get('/make-admin/{id}', 'UserController@makeAdmin')->name('makeAdmin');
Route::get('/remove-admin/{id}', 'UserController@removeAdmin')->name('removeAdmin');
Route::get('/home', 'ProductController@index')->name('home')->middleware('auth', 'acl:Admin');

Route::get('/product/create', 'ProductController@create')->name('create')->middleware('auth');
Route::post('/product/create', 'ProductController@store')->name('post-create')->middleware('auth');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('edit')->middleware('auth');
Route::put('/product/update/{id}', 'ProductController@update')->name('update')->middleware('auth');
Route::get('/product/delete/{id}', 'ProductController@delete')->name('update')->middleware('auth');
