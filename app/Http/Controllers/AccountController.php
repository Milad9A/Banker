<?php

namespace App\Http\Controllers;

use App\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('account.index', compact('accounts'));
    }

    public function create()
    {
        return view('account.create');
    }

    public function store()
    {
        $account = new Account(request()->validate([
            'user_id' => 'required|unique:accounts',
        ]));
        $account->balance = 0;
        $account->save();
        return redirect(route('account.index'));
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('account.edit', compact('account'));
    }

    public function update($id)
    {
        $account = Account::findOrFail($id);
        $account->update(request()->validate([
            'name' => 'required',
        ]));
        return redirect()->back();
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('account.index')->withStatus(__('Account successfully deleted.'));
    }
}

