@extends('layouts.Admin.auth')

@section('title', 'Admin Login ')

@section('content')
<nav class="navbar navbar-expand navbar-transparent navbar-absolute fixed-top text-white">
  <ul class="navbar-nav d-md-flex mr-auto">
    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
  </ul>
  <ul class="navbar-nav">
    <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>

  </ul> <!-- list-inline //  -->
</nav>


<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{asset('assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-8 ml-auto mr-auto" style="max-width: 500px;">

          <div class="card card-login card-hidden">
            <div class="card-header-rose text-center">
              <h5><strong>Login with you social profile</strong></h5>


            </div>

            <div class="card-body">




              <div class="social-line text-center">
                <a href="login/facebook" class="btn-social btn-outline-facebook btn-social-circle waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                <a href="login/twitter" class="btn-social btn-outline-twitter btn-social-circle waves-effect waves-light m-1"><i class="fa fa-twitter"></i></a>
                <a href="login/google" class="btn-social btn-outline-google-plus btn-social-circle waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                <a href="login/instagram" class="btn-social btn-outline-instagram waves-effect btn-social-circle waves-light m-1"><i class="fa fa-instagram"></i></a>


              </div>

              <br />

              <p class="card-description text-center">or be classical</p>

              <form method="POST" action="{{ route('login') }}">
                @csrf




                <div class="form-set">
                  <div class="form-input inputWithIcon">
                    <input id="email" type="email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                    <i class="material-icons" aria-hidden="true">email</i>
                  </div>
                </div>



                <div class="form-set">
                  <div class="form-input inputWithIcon">
                    <input id="password" type="password" @error('password') is-invalid @enderror name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                    <i class="material-icons" aria-hidden="true">lock</i>
                  </div>
                </div>



                <div class="form-group">
                  <a href="{{ route('password.request') }}" class="float-right text-form"> {{ __('Forgot Your Password?') }}</a>
                  <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="">
                    <div class="custom-control-label"> Remember </div>
                  </label>
                </div> <!-- form-group form-check .// -->



                <div class="form-group">
                  <button class="btn btn-info btn-block btn-dark" type="submit">{{ __('Login') }}</button>
                </div> <!-- form-group// -->


                <div style="padding:5px">
                  <a href="{{ route('register') }}" class="float-left"> {{ __('I don\'t have an account ? Create one') }}</a>
                </div>
                <br />



            </div>


          </div>




          </form>

        </div>


        <div>

        </div>



      </div>
    </div>

    @endsection