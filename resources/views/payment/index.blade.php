@extends('layouts.app', ['activePage' => 'payment-management', 'titlePage' => __('Payment Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Payments') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage payments') }}</p>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Id') }}
                                    </th>
                                    <th>
                                        {{ __('User Id') }}
                                    </th>
                                    <th>
                                        {{ __('Account Id') }}
                                    </th>
                                    <th>
                                        {{ __('Payment Amount') }}
                                    </th>
                                    <th>
                                        {{ __('Creation date') }}
                                    </th>
                                    {{--                                    <th class="text-right">--}}
                                    {{--                                        {{ __('Actions') }}--}}
                                    {{--                                    </th>--}}
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>
                                                {{ $payment->id }}
                                            </td>
                                            <td>
                                                {{ $payment->user_id }}
                                            </td>
                                            <td>
                                                {{ $payment->account_id }}
                                            </td>
                                            <td>
                                                {{ $payment->payment_amount }}
                                            </td>
                                            <td>
                                                {{ $payment->created_at->format('Y-m-d') }}
                                            </td>
                                            {{--                                            <td class="td-actions text-right">--}}
                                            {{--                                                <form action="{{ route('transaction.destroy', $transaction) }}"--}}
                                            {{--                                                      method="post">--}}
                                            {{--                                                    @csrf--}}
                                            {{--                                                    @method('delete')--}}

                                            {{--                                                    <a rel="tooltip" class="btn btn-success btn-link"--}}
                                            {{--                                                       href="{{ route('account.edit', $account) }}"--}}
                                            {{--                                                       data-original-title=""--}}
                                            {{--                                                       title="">--}}
                                            {{--                                                        <i class="material-icons">edit</i>--}}
                                            {{--                                                        <div class="ripple-container"></div>--}}
                                            {{--                                                    </a>--}}
                                            {{--                                                    <button type="button" class="btn btn-danger btn-link"--}}
                                            {{--                                                            data-original-title="" title=""--}}
                                            {{--                                                            onclick="confirm('{{ __("Are you sure you want to delete this transaction?") }}') ? this.parentElement.submit() : ''">--}}
                                            {{--                                                        <i class="material-icons">close</i>--}}
                                            {{--                                                        <div class="ripple-container"></div>--}}
                                            {{--                                                    </button>--}}
                                            {{--                                                </form>--}}
                                            {{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
