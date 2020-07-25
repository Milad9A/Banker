<?php

namespace App\Http\Controllers\api;

use App\Account;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function payments()
    {
        return Payment::where('user_id', auth()->user()->id)->get();
    }

    public function makePayment()
    {
        $attributes = request()->validate([
            'payment_amount' => 'required|min:0',
            'account_id' => 'required',
        ]);

        $account = Account::where([['user_id', auth()->user()->id], ['id', $attributes['account_id']]])->first();

        if ($account->balance - $attributes['payment_amount'] < 0)
            return response(['message' => 'Sorry, You have Insufficient Funds.']);

        Payment::create([
            'user_id' => auth()->user()->id,
            'account_id' => $attributes['account_id'],
            'payment_amount' => $attributes['payment_amount'],
        ]);


        $account->balance = $account->balance - $attributes['payment_amount'];

        $account->save();

        return response(['message' => "Your Payment has been received."]);
    }
}
