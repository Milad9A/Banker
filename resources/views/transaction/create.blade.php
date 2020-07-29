@extends('layouts.app', ['activePage' => 'transaction-management', 'titlePage' => __('Transaction Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('transaction.store') }}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add Transaction') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('transaction.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="user_id">{{ __('Account Owner') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">

                                            <div class="col-md-10">
                                                <div class="select control">
                                                    <select name="user_id" class="browser-default custom-select">
                                                        <option selected>Select Owner</option>
                                                        @foreach(App\User::all() as $user)
                                                            <option
                                                                value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('user_id'))
                                                        <span id="name-error"
                                                              class="error text-danger"
                                                              for="user_id">{{ $errors->first('user_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="account_id">{{ __('Account Id') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">

                                            <div class="col-md-10">
                                                <div class="select control">
                                                    <select name="account_id" class="browser-default custom-select">
                                                        <option selected>Select Account</option>
                                                        @foreach(App\Account::all() as $account)
                                                            <option
                                                                value="{{$account->id}}">{{$account->id}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('account_id'))
                                                        <span id="name-error"
                                                              class="error text-danger"
                                                              for="account_id">{{ $errors->first('account_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="transaction_type">{{ __('Transaction Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">

                                            <div class="col-md-10">
                                                <div class="select control">
                                                    <select name="transaction_type" class="browser-default custom-select">
                                                        <option selected>Select Type</option>
                                                            <option value="deposit">Deposit</option>
                                                            <option value="withdraw">Withdraw</option>
                                                    </select>
                                                    @if ($errors->has('transaction_type'))
                                                        <span id="name-error"
                                                              class="error text-danger"
                                                              for="transaction_type">{{ $errors->first('transaction_type') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Transaction Amount') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('transaction_amount') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('transaction_amount') ? ' is-invalid' : '' }}"
                                                   name="transaction_amount" id="input-name" type="text"
                                                   placeholder="{{ __('Transaction Amount') }}" value="{{ old('transaction_amount') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('transaction_amount'))
                                                <span id="name-error" class="error text-danger"
                                                      for="transaction_amount">{{ $errors->first('transaction_amount') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Add Transaction') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
