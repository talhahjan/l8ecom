@extends('layouts.User.app')

@section('title', 'T.J Shoes Collection :: Home Page')

@section('content')


<!-- main content area start -->

<main>
<section id="carousel">
<div class="row carousel-pupular">

<!-- carousel start -->
<div id="carouselExampleIndicators" class="col-lg-8 col-md-12 carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('assets/images/slide1.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('assets/images/slide2.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('assets/images/slide3.jpg')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
<!-- carouse ends  -->

<!-- col popular items starts  -->
<div class="col-lg-4 popular-items d-none d-lg-block">
<div class="card card-primary">
  <div class="card-body">
  <h6 class="card-title">Popular categories</h6>
  
  
  </div>
</div>
</div>
<!-- col popular items ends  -->


</div>
</section>



<!-- 
 -->









<section id="slider-latest">

</section>


<section id="slider-best-seller">
  <i class="material-icons prev-btn" aria-expanded="false">chevron_right</i>
  <i class="material-icons next-btn" aria-expanded="false">chevron_left</i>
  <div class="card">

    <div class="card-body">

      <h5 class="card-title">
        Best Selling Products </h5>
      <!-- Set up your HTML -->
      <div class="owl-carousel  margin-0 padding-0">
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/1.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          

</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/4.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          



</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/2.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/3.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/4.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/5.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title edited
          </div>
                    
<div class="price">
  <span>$ 120</span>
  <span>
  <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
</span>
</div>





</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/6.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          



</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/7.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/8.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>
        <div>


          <div class="card_product">
            <div class="product_img">
              <img src="{{asset('assets/images/9.jpg')}}" alt="product img">
              <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
    
            </div>
            <div class="product_detail">
    
              <div class="title">
                product title
              </div>
                        
              <div class="price">
                <span>$ 120</span>
                <span>
                <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
              </span>
              </div>
                  
    
    
    </div>
          </div>
    </div>
        <div>


          <div class="card_product">
            <div class="product_img">
              <img src="{{asset('assets/images/10.jpg')}}" alt="product img">
              <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
    
            </div>
            <div class="product_detail">
    
              <div class="title">
                product title
              </div>
                        
              <div class="price">
                <span>$ 120</span>
                <span>
                <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
              </span>
              </div>
                  
    
    
    </div>
          </div>
    </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/11.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>

      </div>
    </div>


  </div>
</section>



<section id="slider-trending">
  <div class="card">

    <div class="card-body">
      <i class="material-icons prev-btn" aria-expanded="false">chevron_right</i>
      <i class="material-icons next-btn" aria-expanded="false">chevron_left</i>

      <h5 class="card-title">
        Trending Products</h5>
      <!-- Set up your HTML -->
      <div class="owl-carousel  margin-0 padding-0">
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/1.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
       
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/4.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
        
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          



</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/2.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
                    
          <div class="price">
            <span>$ 120</span>
            <span>
          
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          




</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/3.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
           
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          



</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/4.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
      
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          


</div>
      </div>

        </div>
        <div> 
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/5.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
           
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          



</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/6.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
         
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          



</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/7.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
        
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          

</div>
      </div>

        </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/8.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
           
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          



</div>
      </div>

        </div>
        <div>


          <div class="card_product">
            <div class="product_img">
              <img src="{{asset('assets/images/9.jpg')}}" alt="product img">
              <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
            </div>
            <div class="product_detail">
    
              <div class="title">
                product title
              </div>
              <div class="price">
                <span>$ 120</span>
                <span>
                <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
              </span>
              </div>
              
    
    
    
    </div>
          </div>
    </div>
        <div>


          <div class="card_product">
            <div class="product_img">
              <img src="{{asset('assets/images/10.jpg')}}" alt="product img">
              <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
           
            </div>
            <div class="product_detail">
    
              <div class="title">
                product title
              </div>
              <div class="price">
                <span>$ 120</span>
                <span>
             
                <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
              </span>
              </div>
              
    
    
    </div>
          </div>
    </div>
        <div>
          


      <div class="card_product">
        <div class="product_img">
          <img src="{{asset('assets/images/11.jpg')}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>
        </div>
        <div class="product_detail">

          <div class="title">
            product title
          </div>
          <div class="price">
            <span>$ 120</span>
            <span>
           
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>
          </div>
          

</div>
      </div>

        </div>

      </div>

    </div>


  </div>
</section>


</main>



<!-- main contents area ends  -->

@endsection


@section('JSript')

const initSlider = (selector) => {
      //store section id 
      let Section = $(selector);
      // strore slider class under section ID
      let SliderClass = Section.find('.owl-carousel');
      //store Next Prev button under sectinID=>ClassID
      let PrevBtn = Section.find('.prev-btn');
      let NextBtn = Section.find('.next-btn');

      //initliaze carousel under html section tag Id asign = selector
      SliderClass.owlCarousel({
        navText: [PrevBtn, NextBtn],
        center: true,
        slideTransition: 'linear',
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          768: {
            items: 3,
            nav: true
          },

          992: {
            items: 5,
            nav: true
          },
        }
      });


    }

    //iniliaze latest arrivals product slider 
    initSlider('#slider-latest');


    //iniliaze popular product slider 
    initSlider('#slider-popular');

    //iniliaze Best Selling  product slider 
    initSlider('#slider-best-seller');


    //iniliaze trending product slider 
    initSlider('#slider-trending');

@endsection