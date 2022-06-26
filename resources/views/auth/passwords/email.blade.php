@extends('layouts.User.auth')


@section('title', 'T.J Shoes Collection :: Forgort Password ')


@section('content')
<nav class="navbar navbar-expand navbar-transparent navbar-absolute fixed-top text-white">
<<<<<<< HEAD
    <ul class="navbar-nav d-md-flex mr-auto">
    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
    </ul>
    <ul class="navbar-nav">
    <li  class="nav-item active"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
    <li  class="nav-item"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>
=======
  <ul class="navbar-nav d-md-flex mr-auto">
    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
  </ul>
  <ul class="navbar-nav">
    <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>
>>>>>>> 3b677d2... admin panel 90% ready add create manage user

  </ul> <!-- list-inline //  -->
</nav>


<div class="wrapper wrapper-full-page">
<<<<<<< HEAD
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('/laravel/assets/img/login.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
<div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="card card-profile text-center card-hidden">
              <div class="card-header ">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="/laravel/assets/img/passwd-reset-1.png">
                  </a>
                </div>
              </div>
=======
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('/laravel/assets/img/login.jpg'); background-size: cover; background-position: top center;">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card card-profile text-center card-hidden">
            <div class="card-header ">
              <div class="card-avatar">
                <a href="#pablo">
                  <img class="img" src="/laravel/assets/img/passwd-reset-1.png">
                </a>
              </div>
            </div>
>>>>>>> 3b677d2... admin panel 90% ready add create manage user




<<<<<<< HEAD
              <div class="card-body ">
              <h3>{{ __('Forgot Password ?') }}</h3>

                <p>
Enter your email adress,you will receive an email with a link to reset your password

                </p>
                <form method="POST" action="{{ route('password.email') }}">
                        @csrf


                    <div class="form-set">
<div class="form-input inputWithIcon">
 <input id="email" name="email" type="email" placeholder="{{ __('E-Mail Address') }}"  @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
 <i class="material-icons" aria-hidden="true">lock</i>
</div>
</div>
=======
            <div class="card-body ">
              <h3>{{ __('Forgot Password ?') }}</h3>

              <p>
                Enter your email adress,you will receive an email with a link to reset your password

              </p>
              <form method="POST" action="{{ route('password.email') }}">
                @csrf


                <div class="form-set">
                  <div class="form-input inputWithIcon">
                    <input id="email" name="email" type="email" placeholder="{{ __('E-Mail Address') }}" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <i class="material-icons" aria-hidden="true">lock</i>
                  </div>
                </div>
>>>>>>> 3b677d2... admin panel 90% ready add create manage user






                <div class="form-group">
<<<<<<< HEAD
                                <button type="submit" class="btn btn-dark btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        </div>
</form>

                        </div>
          </div>
        </div>
      </div>
</div>

@endsection


=======
                  <button type="submit" class="btn btn-dark btn-primary">
                    {{ __('Send Password Reset Link') }}
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection

    @section('jScript')


<script>
    @if(session('status'))
    $.notify({
    icon: "add_alert",
    title: "Notification",
    animate: {
    enter: "animated fadeInDown",
    exit: "animated fadeOutUp",
    },
    message: "{{ session('status') }}"
    }, {
    type: 'success',
    timer: 4000,
    placement: {
    from: 'top',
    align: 'center'
    }
    });
    @endif


    @if ($errors->any())
    $.notify({
    icon: "error",
    title: "<strong>An Error Occured</strong>",
    animate: {
    enter: "animated fadeInDown",
    exit: "animated fadeOutUp",
    },
    message: "<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>"
    }, {
    type: 'danger',
    timer: 4000,
    placement: {
    from: 'top',
    align: 'center'
    }
    });

    @endif


    $(document).ready(function() {
    md.checkFullPageBackgroundImage();
    setTimeout(function() {
    // after 1000 ms we add the class animated to the login/register card
    $('.card').removeClass('card-hidden');
    }, 700);
    });
  </script>
    @endsection
>>>>>>> 3b677d2... admin panel 90% ready add create manage user
