@extends('layouts.app', ['activePage' => 'account-management', 'titlePage' => __('Account Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('account.store') }}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add Account') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('account.index') }}"
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
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Add Account') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
