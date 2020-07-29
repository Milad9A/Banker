<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('account', 'AccountController@index')->name('account.index');
    Route::get('account/create', 'AccountController@create')->name('account.create');
    Route::post('account', 'AccountController@store')->name('account.store');
    Route::get('account/{account}/edit', 'AccountController@edit')->name('account.edit');
    Route::put('account/{account}', 'AccountController@update')->name('account.update');
    Route::delete('account/{account}/destroy', 'AccountController@destroy')->name('account.destroy');

    Route::get('transaction', 'TransactionController@index')->name('transaction.index');
    Route::get('transaction/create', 'TransactionController@create')->name('transaction.create');
    Route::post('transaction', 'TransactionController@store')->name('transaction.store');
    Route::get('transaction/{transaction}/edit', 'TransactionController@edit')->name('transaction.edit');
    Route::put('transaction/{transaction}', 'TransactionController@update')->name('transaction.update');
    Route::delete('transaction/{transaction}/destroy', 'TransactionController@destroy')->name('transaction.destroy');

    Route::get('payment', 'PaymentController@index')->name('payment.index');
});

Route::get('request/{request}/map', 'MapController@map')->name('map');
Route::get('googlemap/direction', 'MapController@direction');
