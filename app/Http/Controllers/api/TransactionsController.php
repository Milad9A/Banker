<?php

namespace App\Http\Controllers\api;

use App\Account;
use App\Http\Controllers\Controller;
use App\Transaction;

class TransactionsController extends Controller
{
    public function transactions()
    {
        return Transaction::where('user_id', auth()->user()->id)->get();
    }

    public function deposit()
    {
        $attributes = request()->validate([
            'transaction_amount' => 'required|min:0',
            'transaction_type' => 'in:deposit',
            'account_id' => 'required',
        ]);
        Transaction::create([
            'user_id' => auth()->user()->id,
            'account_id' => $attributes['account_id'],
            'transaction_amount' => $attributes['transaction_amount'],
            'transaction_type' => $attributes['transaction_type'],
        ]);

        $account = Account::where([['user_id', auth()->user()->id], ['id', $attributes['account_id']]])->first();

        $account->balance = $account->balance + $attributes['transaction_amount'];

        $account->save();

        return response(['message' => "You're Deposit has been received."]);
    }

    public function withdraw()
    {
        $attributes = request()->validate([
            'transaction_amount' => 'required|min:0',
            'transaction_type' => 'in:withdraw',
            'account_id' => 'required',
        ]);
        Transaction::create([
            'user_id' => auth()->user()->id,
            'account_id' => $attributes['account_id'],
            'transaction_amount' => $attributes['transaction_amount'],
            'transaction_type' => $attributes['transaction_type'],
        ]);

        $account = Account::where([['user_id', auth()->user()->id], ['id', $attributes['account_id']]])->first();

        if ($account->balance - $attributes['transaction_amount'] < 0)
            return response(['message' => 'Sorry, You have Insufficient Funds.']);

        $account->balance = $account->balance - $attributes['transaction_amount'];

        $account->save();

        return response(['message' => "Your withdraw has been received."]);
    }
}
