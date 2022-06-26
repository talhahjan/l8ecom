@extends('layouts.User.auth')

@section('title', 'T.J Shoes Collection :: Verify Email-address')


@section('content')
<nav class="navbar navbar-expand navbar-transparent navbar-absolute fixed-top text-white">
    <ul class="navbar-nav d-md-flex mr-auto">
    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
    </ul>
    <ul class="navbar-nav">
    <li  class="nav-item active"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
    <li  class="nav-item"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>

  </ul> <!-- list-inline //  -->
</nav>


<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{assets('assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection


