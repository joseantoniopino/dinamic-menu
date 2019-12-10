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

Route::get('/','PublicController@index')->name('public.index');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::post('/admin/update/active', 'AdminController@editActive')->name('admin.update');
