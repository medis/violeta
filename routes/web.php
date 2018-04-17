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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');

// Point all non api links to SPA entry point.
Route::view('/{vue?}', 'welcome')->where('vue', '^(?!.*api).*$[\/\w\.-]*');
