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

Route::group(['middleware' => 'auth'], function () {
    Route::view('/home', 'home');

    Route::group(['middleware' => 'role:admin|super_admin'], function () {
        Route::resource('users', 'UsersController');
        Route::post('make-admin/{id}', 'UsersController@makeAdmin')->name('make-admin');
        Route::post('remove-Admin/{id}', 'UsersController@removeAdmin')->name('remove-admin');
    });

    Route::resource('messages', 'MessagesController');

    Route::resource('recipients', 'RecipientsController');
    Route::post('recipients/import', 'RecipientsController@import')->name('recipients.import');

    Route::get('settings/edit', 'SettingsController@edit')->name('settings.edit');
    Route::post('settings/update', 'SettingsController@update')->name('settings.update');

    Route::resource('sent', 'SentController');
});
