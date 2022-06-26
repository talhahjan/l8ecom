@extends('layouts.User.products')

@section('title', 'T.J Shoes Collection :: Home Page')

@section('content')
<main class="product-listing">
<div class="container-fluid">

<div class="row">

<div class="d-flex justify-content-between my-2">

<div class="filter-btn">
  <button class="btn btn-outline-primary btn-sm " id="filter"> 
  <i class="material-icons">tune</i><span>Filter</span>
</button>
<div class="d-inline-block ml-2 result-detail">Showing 1-16 of 26 results</div>

</div>

<div class="sort">




<div class="d-none d-lg-flex align-items-center">
<span class="text-primary mr-2" style="font-weight: 700;">Sort By : </span>
  <div class="btn-group" role="group" aria-label="Basic example">
    <button class="btn btn-outline-primary btn-sm">Trending</button>
    <button class="btn btn-outline-primary btn-sm">Latest</button>
    <button class="btn btn-outline-primary btn-sm">Popular</button>
    <button class="btn btn-outline-primary btn-sm">featured</button>
   </div>



</div>





  <div class="dropdown d-flex d-lg-none">
      <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="SortMenuButton"
        data-toggle="dropdown" aria-expanded="false">
Sort       </button>
      <ul class="dropdown-menu" aria-labelledby="SortMenuButton" id="categorList">
        <li><a class="dropdown-item sorting" href="#">Trending</a></li>
        <li><a class="dropdown-item sorting" href="#">Latest</a></li>
        <li><a class="dropdown-item sorting" href="#">Popular</a></li>
        <li><a class="dropdown-item sorting" href="#">Featured</a></li>
      </ul>
    </div>
  
  
  </div>
  
</div>
  </div>


<div class="row">
  <div class="col-lg-auto col-md-12">
    <div class="filter">


                  <div class="expandableCollapsibleDiv card">
                    <div class="card-header d-flex justify-content-between">
                      <h6 class="title">Color</h5>
                      <i class="material-icons">keyboard_arrow_up</i>
                    
                    </div>
                    <div class="filter-content colors">
                      <ul class="list-style-none">
                      @foreach($colors as $color => $val)
<li> <a href="">{{$color}}</a></li>

@endforeach

                    </ul>
                    </div>
                        </div>



                        <div class="expandableCollapsibleDiv card">
                          <div class="card-header d-flex justify-content-between">
                            <h6 class="title">Size</h5>
                            <i class="material-icons">keyboard_arrow_up</i>
                          </div>
                          <div class="filter-content sizes">
                            
                          @foreach($sizes as $age => $val)
                          <span>{{$val['eu']}}</span>
                        @endforeach


                                </div>
                              </div>



                              <div class="expandableCollapsibleDiv card">
                                <div class="card-header d-flex justify-content-between">
                                  <h6 class="title">Brand</h5>
                                  <i class="material-icons">keyboard_arrow_up</i>
                                
                                </div>
                                <div class="filter-content">

                                <ul class="list-group">

                               @foreach($brands as $brand) 
                               <li class="list-group-item">
                                    <input class="form-check-input mr-1" type="checkbox" value="" aria-label="...">
                                    {{$brand->title}}
                                  </li>
                                @endforeach

                                </ul>
                                </div>
                                    </div>


                                    <div class="expandableCollapsibleDiv card">
                                      <div class="card-header d-flex justify-content-between">
                                        <h6 class="title">Material</h5>
                                        <i class="material-icons">keyboard_arrow_up</i>
                                      
                                      </div>
                                      <div class="filter-content">

                                      <ul class="list-group">
                                      <li class="list-group-item">
                                        <input class="form-check-input mr-1" type="checkbox" value="" aria-label="...">
                                        Pu
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input mr-1" type="checkbox" value="" aria-label="...">
                                        Leather
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input mr-1" type="checkbox" value="" aria-label="...">
                                        Rexine
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input mr-1" type="checkbox" value="" aria-label="...">
                                        Fabrics
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input mr-1" type="checkbox" value="" aria-label="...">
                                        TPR
                                      </li>
                                    </ul>
                                     </div>


                                          </div>
    


</div>
  </div>
  <div class="col-lg col-md-12">
    

    <div class="products my-2">
     

@foreach($collection->products as $product)

      <!-- single product  -->
      <div class="card-product">
        <div class="product-img">
          <img src="{{asset($product->thumbnails[0]['path'])}}" alt="product img">
          <a href="#"><i class="material-icons  btn-fav">favorite</i></a>

        </div>
        <div class="product-detail">

          <div class="title">
          <a href="{{route('user.single', $product->slug)}}" alt="">
           {{$product->title}}
           </a>
          </div>
                    
          <div class="price">
          @if($product->discount)
<div> <span style="text-decoration: line-through;" class="text-warning">$ {{$product->price}}</span> $ {{$product->price - $product->discount_price}}</div>
@else
<span>{{$product->price}}</span>
          @endif


            <span>
            <a href="#"> <i class="material-icons btn-add-2-cart">shopping_cart</i></a>
          </span>


          </div>
          
<div class="rating">
star Rating goes here
</div>


</div>
      </div>                
      <!-- single product -->

@endforeach
  </div>

</div>




</div>

</main>

@endsection


@section('JSript')

<script>
  
  

    const  btnFilter =document.getElementById('filter');

    const container=document.querySelector('.filter');

    $(document).ready(function () {


    $(".expandableCollapsibleDiv").find('i').click(function (e) {
      var showElementDescription = 
        $(this).parents(".expandableCollapsibleDiv").find(".filter-content");
  
      if ($(showElementDescription).is(":visible")) {
        showElementDescription.hide(500, "swing");
        $(this).html('keyboard_arrow_down');
      } else {
        showElementDescription.show(500, "swing");
        $(this).html('keyboard_arrow_up');
      }
    });
  });


btnFilter.addEventListener("click", function(){

let currentIcon=btnFilter.firstElementChild.innerHTML;

if(currentIcon=='close'){
  btnFilter.firstElementChild.innerText='tune';
  container.style.display='none';
  }

  else{
    btnFilter.firstElementChild.innerText='close';
    container.style.display='block';

  }


  });



const sorting = document.querySelectorAll(".sorting");
const sortSelect = document.querySelector("#SortMenuButton");
for (let i = 0; i < sorting.length; i++) {
  sorting[i].addEventListener("click", function (event) {
document.querySelector('#SortMenuButton').innerHTML=this.innerText;
  });
}


for (let i = 0; i < sortSelect.length; i++) {
  sortSelect[i].addEventListener("click", function (event) {
    document.querySelector('#SortMenuButton').innerHTML=this.innerText;
   
  });
}



</script>
@endsection