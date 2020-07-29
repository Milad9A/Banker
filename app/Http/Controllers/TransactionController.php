<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use App\User;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        return view('transaction.create');
    }

    public function store()
    {
        if (request()->transaction_type === 'deposit') {
            $attributes = request()->validate([
                'transaction_amount' => 'required|min:0',
                'transaction_type' => 'in:deposit',
                'account_id' => 'required',
                'user_id' => 'required',
            ]);
            $transaction = Transaction::create([
                'user_id' => $attributes['user_id'],
                'account_id' => $attributes['account_id'],
                'transaction_amount' => $attributes['transaction_amount'],
                'transaction_type' => $attributes['transaction_type'],
            ]);

            $transaction->account_id = User::findOrFail($attributes['user_id'])->accounts->pluck('id')->first();
            $transaction->save();

            $account = Account::where([['user_id', $attributes['user_id']], ['id', $attributes['account_id']]])->first();

            $account->balance = $account->balance + $attributes['transaction_amount'];

            $account->save();

        } elseif (request()->transaction_type === 'withdraw') {
            $attributes = request()->validate([
                'transaction_amount' => 'required|min:0',
                'transaction_type' => 'in:withdraw',
                'account_id' => 'required',
                'user_id' => 'required',
            ]);
            $transaction = Transaction::create([
                'user_id' => $attributes['user_id'],
                'account_id' => $attributes['account_id'],
                'transaction_amount' => $attributes['transaction_amount'],
                'transaction_type' => $attributes['transaction_type'],
            ]);

            $transaction->account_id = User::findOrFail($attributes['user_id'])->accounts->pluck('id')->first();
            $transaction->save();

            $account = Account::where([['user_id', $attributes['user_id']], ['id', $attributes['account_id']]])->first();

            $account->balance = $account->balance - $attributes['transaction_amount'];

            $account->save();

        }

        return redirect(route('transaction.index'));

    }

//    public function edit($id)
//    {
//        $account = Account::findOrFail($id);
//        return view('account.edit', compact('account'));
//    }
//
//    public function update($id)
//    {
//        $account = Account::findOrFail($id);
//        $account->update(request()->validate([
//            'name' => 'required',
//        ]));
//        return redirect()->back();
//    }
//
//    public function destroy($id)
//    {
//        $account = Account::findOrFail($id);
//        $account->delete();
//
//        return redirect()->route('account.index')->withStatus(__('Account successfully deleted.'));
//    }
}

