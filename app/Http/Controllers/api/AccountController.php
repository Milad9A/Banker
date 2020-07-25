<?php

namespace App\Http\Controllers\api;

use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function createAccount()
    {
        Account::create([
            'user_id' => auth()->user()->id,
            'amount' => 0,
        ]);
        return response(['message' => 'The Account has Been created Successfully.']);
    }

}
