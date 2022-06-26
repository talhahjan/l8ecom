
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- google fonts  -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- bootstrap file 5.0.0 alpha 2 -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" />
  <!-- custom css styling  -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
  <!-- font awesome  -->
  <link rel="stylesheet" href="{{asset('assets/css/fontawsome-all.css.css')}}" />
<!-- OwlCarousel css File -->
<link rel="stylesheet" href="{{asset('assets/css/owlcarousel/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owlcarousel/owl.theme.default.min.css')}}">
 <!-- start rating Css -->
<link rel="stylesheet" href="{{asset('assets/admin_plugins/star-rating/star-rating.css')}}">
<title>Hello, world!</title>
</head>
<body>
<div class="wrapper">
  <!-- header -->
  <header>
    <!-- navbar -->
    <nav class="navbar navbar-expand position-absolut">
      <div class="container">

<i class="fa fa-bars"></i>

        <a class="navbar-brand" href="#"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">

              <a class="nav-link" href="#"><i class="material-icons">
                local_mall
              </i><span class="d-none d-md-inline">My
                  Cart</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link login" href="#"><i class="material-icons" aria-expanded="true">favorite</i>
<span class="d-none d-md-inline">Wish List</span></a>
            </li>
          <li class="nav-item">
            <div class="dropdown">
              <a href="#" class="nav-link mr-10" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="true">
<i class="material-icons" aria-expanded="true">person_outline</i>
<span class="d-none d-md-inline">Hi Guest !</span></a>
              <div class="dropdown-menu slideIn animate user-widget">

                <div class="login">
          
                  <p class="text-muted mx-2 float-center">Welcome To T.J Shoes</p>
          
@guest
<button type="button" class="btn btn-primary btn-sm btn-block my-2">Sign In</button>
              
          
              <p class="text-muted text-center">Use Social Accounts</p>
      
<div class="social-line text-center">
<a href="login/facebook" class="btn-social btn-outline-facebook btn-social-circle waves-effect waves-light m-1">
<i class="fab fa-facebook-f"></i>
</a>
<a href="login/google" class="btn-social btn-outline-google btn-social-circle waves-effect waves-light m-1"><i
  class="fab fa-google-plus-g"></i></a>
<a href="login/instagram" class="btn-social btn-outline-instagram waves-effect btn-social-circle waves-light m-1"><i
  class="fab fa-instagram"></i></a>


</div>

      
              <p class="text-muted my-2 text-left">New customer ?</p>
      
              <button type="button" class="btn btn-primary btn-sm btn-block">Register </button>
      
      

@endguest




@auth

<div class="d-flex my-2">

<div class="avatar">
<img src="{{ @Auth::user()->profile->avatar ? asset(@Auth::user()->profile->avatar) : asset('assets/admin_img/user2-160x160.jpg') }}" alt="profile Pic" class="rounded-circle img-thumbnai" style="height: 50px; width:50x; margin-right: 10px">
</div>

<div class="align-self-center">
<h6>{{@Auth::user()->profile->first_name .' ' .@Auth::user()->profile->last_name}}</h6>
</div>

</div>

<div class="d-flex justify-content-around my-2">
<button type="button" class="btn btn-outline-primary btn-sm">Edit Profile</button>
<button type="button" class="btn btn-outline-primary btn-sm">Sign Out</button>

</div>


@endauth






                </div>
          
                <div class="dropdown-divider"></div>
          
                <a class="dropdown-item mx-auto"  href="#">My Orders</a>
                <a class="dropdown-item mx-auto" href="#">My Wish list</a>
                <a class="dropdown-item mx-auto" href="#">My Favorite Items</a>
              </div>
            </div>
          </li>
          </ul>

        </div>

      </div>
    </nav>
    <br />
    <!-- navbar -->
    <!-- search bar -->
      <!-- search bar -->
      <section class="main-header">
            <div class="search-bar">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" id="categories" type="button" id="dropdownMenuButton"
                      data-toggle="dropdown" aria-expanded="false">
                      All
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="categorList">
                      <li><a class="dropdown-item" href="#">Men</a></li>
                      <li><a class="dropdown-item" href="#">Women</a></li>
                      <li><a class="dropdown-item" href="#">Kids</a></li>
                    </ul>
                  </div>
                </div>
                <input type="text" class="form-control" id="search-query" placeholder="search ..." aria-label="Username"
                  aria-describedby="basic-addon1">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">
                    <i class="material-icons">search</i>
                  </button>
                </div>
              </div>
            </div>
      </section>


    <!-- search bar -->
  </header>



  @yield('content')



  

<!-- footer -->
<footer id="footer" class="bg-primary">
  <div class="container">
      <div class="row">
        <aside class="col-md col-6">
          <h6 class="title">Brands</h6>
          <ul class="list-unstyled">
            <li> <a href="#">Adidas</a></li>
            <li> <a href="#">Puma</a></li>
            <li> <a href="#">Reebok</a></li>
            <li> <a href="#">Nike</a></li>
          </ul>
        </aside>
        <aside class="col-md col-6">
          <h6 class="title">Company</h6>
          <ul class="list-unstyled">
            <li> <a href="#">About us</a></li>
            <li> <a href="#">Career</a></li>
            <li> <a href="#">Find a store</a></li>
            <li> <a href="#">Rules and terms</a></li>
            <li> <a href="#">Sitemap</a></li>
          </ul>
        </aside>
        <aside class="col-md col-6">
          <h6 class="title">Help</h6>
          <ul class="list-unstyled">
            <li> <a href="#">Contact us</a></li>
            <li> <a href="#">Money refund</a></li>
            <li> <a href="#">Order status</a></li>
            <li> <a href="#">Shipping info</a></li>
            <li> <a href="#">Open dispute</a></li>
          </ul>
        </aside>
        <aside class="col-md col-6">
          <h6 class="title">Account</h6>
          <ul class="list-unstyled">
            <li> <a href="#"> User Login </a></li>
            <li> <a href="#"> User register </a></li>
            <li> <a href="#"> Account Setting </a></li>
            <li> <a href="#"> My Orders </a></li>
          </ul>
        </aside>
        <aside class="col-md">
          <h6 class="title">Social</h6>
          <ul class="list-unstyled">
            <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
            <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
            <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
            <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
          </ul>
        </aside>
      </div> <!-- row.// -->
<!-- footer-top.// -->

<div class="footer-bottom row">
     <div class="col-md-12 col-lg-6">
        <p class="policy">Privacy Policy - Terms of Use - User Information Legal Enquiry Guide</p>
     </div>
     <div class="col-md-12 col-lg-6">
              <p class="copyright"> &copy 2019 Company name, All rights reserved </p>

     </div>
</div>
    </div><!-- //container -->
</footer>
<!-- footer -->

</div>
<!-- main panel  -->


 <!-- Option 1: Bootstrap Bundle with Popper.js -->
<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.js')}}" crossorigin="anonymous"></script>
<!-- Jquery js file -->
<script src="{{asset('assets/js/jquery/jquery-3.5.1.min.js')}}"></script>
<!-- jQuery Plugins OwlCarousel  -->
<script src="{{asset('assets/js/jquery/plugins/owl.carousel.js')}}"></script>
<!-- star rating Js File  -->
<script src="{{asset('assets/admin_plugings/star-rating/star-rating.min.js')}}"></script>
<script>
  
  @yield('JSript')

</script>
</body>

</html>


