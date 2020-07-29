<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="" class="simple-text logo-normal">
            {{ __('Vasti') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'users-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="https://cdn.onlinewebfonts.com/svg/img_456573.png"></i>
                    <p>{{ __('Banker Stuff') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal">{{ __('My profile') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'users-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <span class="sidebar-mini"> UM </span>
                                <span class="sidebar-normal"> {{ __('User Management') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'account-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('account.index') }}">
                                <span class="sidebar-mini"> AM </span>
                                <span class="sidebar-normal"> {{ __('Account Management') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'transaction-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('transaction.index') }}">
                                <span class="sidebar-mini"> TM </span>
                                <span class="sidebar-normal"> {{ __('Transaction Management') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'payment-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('payment.index') }}">
                                <span class="sidebar-mini"> PM </span>
                                <span class="sidebar-normal"> {{ __('Payment Management') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
