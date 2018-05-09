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

Route::middleware(['auth','web'])
    ->namespace('Backend')
    ->prefix('dashboard')
    ->as('backend.')
    ->group(function() {

    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('press', 'PressController');
    Route::resource('radio', 'RadioController');
    Route::resource('music', 'MusicController');
    Route::resource('show', 'ShowsController');
    Route::resource('text', 'TextsController', ['only' => ['edit', 'index', 'update']]);
});

// Point all non api links to SPA entry point.
Route::view('/{vue?}', 'welcome')->where('vue', '^(?!.*api).*$[\/\w\.-]*');
