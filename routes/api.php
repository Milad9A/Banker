<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function (){
    Route::get('transactions', 'api\TransactionsController@transactions');
    Route::post('transactions/deposit', 'api\TransactionsController@deposit');
    Route::post('transactions/withdraw', 'api\TransactionsController@withdraw');

    Route::post('account/create', 'api\AccountController@createAccount');

    Route::get('payments', 'api\PaymentsController@payments');
    Route::post('payments/make', 'api\PaymentsController@makePayment');
});

Route::post('/login', 'api\Auth\LoginController@login');
Route::post('/register', 'api\Auth\RegisterController@register');
