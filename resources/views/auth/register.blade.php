@extends('layouts.User.auth')
@section('title', 'T.J Shoes Collection :: Register ')

@section('content')

<div class="page-content" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/images/hd-08.jpg');
background-size: cover;
background-repeat: no-repeat;
background-position: center center;
">



    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-transparent">
        <div class="container">
            <div class="navbar-wrappr">
                <a class="navbar-brand" href="javascript:;">Login Page</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="material-icons">fingerprint</i>
                           Sign In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link active"><i class="material-icons" aria-hidden="true">person_add</i>
                            Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    
    
    <div class="card card-login">
        <div class="card-header card-header-primary">
            <h5 class="text-center">Register With Social Account</h5>
        </div>
            
        <div class="card-body">
        
                <div class="social-line text-center">
                    <a href="{{route('login')}}/facebook" class="btn-social btn-outline-facebook btn-social-circle waves-effect waves-light m-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{route('login')}}/google" class="btn-social btn-outline-google btn-social-circle waves-effect waves-light m-1"><i
                            class="fab fa-google-plus-g"></i></a>
                    <a href="{{route('login')}}//instagram" class="btn-social btn-outline-instagram waves-effect btn-social-circle waves-light m-1"><i
                            class="fab fa-instagram"></i></a>
                
                
                </div>
                
                <p class="text-muted text-center my-2">Or Be Classical</p>
        
          <form method="POST" action="{{ route('register') }}">
    @csrf
    
    
    <div class="d-flex flex-column-reverse flex-lg-row justify-content-lg-between">
    <div class="inputWithIcon my-2">
    <input type="text" name="first_name" @error('first_name') is-invalid @enderror class="form-control" value="{{ old('first_name') }}" placeholder="{{ __('Enter First name') }}" aria-label="first_name" id="first_name"
                aria-describedby="basic-addon1" autocomplete="on" />
               <i class="material-icons">face</i>
        </div>
<div>
<div class="inputWithIcon my-2">
            <input type="text" name="last_name" @error('last_name') is-invalid @enderror class="form-control" value="{{ old('last_name') }}" placeholder="{{ __('Enter Last name') }}" aria-label="last_name" id="last_name"
                aria-describedby="basic-addon1" autocomplete="on" />
            <i class="material-icons">face</i>
        </div>

</div>
</div>



    
            <div class="inputWithIcon my-2">
            <input type="email" name="email" @error('email') is-invalid @enderror class="form-control" value="{{ old('email') }}" placeholder="{{ __('Enter E-mail Address') }}" aria-label="email" id="email"
                aria-describedby="basic-addon1" autocomplete="on" required />
            <i class="material-icons">email</i>
        </div>
        
        <div class="inputWithIcon inputWithAction my-2">
            <input type="password" name="password" @error('password') is-invalid @enderror class="form-control" value="{{ old('password') }}" placeholder="{{ __('Enter Password') }}" aria-label="Password" id="password"
                aria-describedby="basic-addon1" autocomplete="off" required/>
            <i class="material-icons">fingerprint</i>
            <i class="fa fa-eye-slash action" id="eye"></i>
        </div>
    

        <div class="inputWithIcon my-2">
            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}"
                aria-describedby="basic-addon1" autocomplete="off" required/>
            <i class="material-icons">fingerprint</i>

        </div>


     
    
    
      
        <div class="form-check my-2">
                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                 <label class="form-check-label" for="flexCheckChecked">
                   Remember me 
                 </label>
             </div>
         
         
        
        
        
        
          <div class="form-group my-2">
            <button class="btn btn-block btn-primary" type="submit">Register</button>
          </div> <!-- form-group// -->
        
    
            </form>
        
            <div class="py-1">
                <a href="{{route('login')}}" class="text-dark"> All ready have an ID Login ?</a>
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

/*  hide & fadeIn login card  */ 
$('.card').hide();
$('.card').fadeIn(3000);      
   


const visibilityBtn = document.querySelector("#eye");




visibilityBtn.addEventListener("click", function () {
  currentClass=visibilityBtn.classList.contains('fa-eye');
 
visibilityBtn.classList.toggle('fa-eye');
 visibilityBtn.classList.toggle('fa-eye-slash');
document.getElementById("password").setAttribute("type", currentClass ? "password": "text");
document.getElementById("Cpassword").setAttribute("type", currentClass ? "password": "text");


});





    </script>
    @endsection