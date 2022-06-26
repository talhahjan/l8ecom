@extends('layouts.User.products')

@section('title', 'T.J Shoes Collection :: Home Page')

@section('content')
<main class="product-listing mt-2">
<div class="container-fluid">


<!-- ============================ ITEM DETAIL ======================== -->
<div class="row">
		<aside class="col-md-6">
<div class="card">
<article class="gallery-wrap"> 
	<div class="img-big-wrap">
	  <div> <a href="#">
    <img src="{{asset($product->thumbnails[0]['path'])}}" height="400" width="400"></a></div>
	</div> <!-- slider-product.// -->
  @if(count($product->thumbnails)>1)
	<div class="thumbs-wrap">
@foreach($product->thumbnails as $thumbnail)
<a href="#" class="item-thumb"> <img src="{{asset($thumbnail->path)}}"></a>
@endforeach

	</div> <!-- slider-nav.// -->

@endif


</article> <!-- gallery-wrap .end// -->
</div> <!-- card.// -->
		</aside>
		<main class="col-md-6">
<article class="product-info-aside">

<h2 class="title mt-3">{{$product->title}} </h2>

<div class="rating-wrap my-3">
	<ul class="rating-stars">
		<li style="width:80%" class="stars-active"> 
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> 
		</li>
		<li>
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> 
		</li>
	</ul>
	<small class="label-rating text-muted">132 reviews</small>
	<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
</div> <!-- rating-wrap.// -->

<div class="mb-3"> 
	<var class="price h4">{{$product->price}}</var> 
	<span class="text-muted">USD 562.65 incl. VAT</span> 
</div> <!-- price-detail-wrap .// -->

<p>{{$product->description}} </p>


<dl class="row">
  <dt class="col-sm-3">Manufacturer</dt>
  <dd class="col-sm-9"><a href="#">Great textile Ltd.</a></dd>

  <dt class="col-sm-3">Article number</dt>
  <dd class="col-sm-9">596 065</dd>

  <dt class="col-sm-3">Guarantee</dt>
  <dd class="col-sm-9">2 year</dd>

  <dt class="col-sm-3">Delivery time</dt>
  <dd class="col-sm-9">3-4 days</dd>

  <dt class="col-sm-3">Availabilty</dt>
  <dd class="col-sm-9">in Stock</dd>
</dl>

	<div class="form-row  mt-4">
		<div class="form-group col-md flex-grow-0">
			<div class="input-group mb-3 input-spinner">
			  <div class="input-group-prepend">
			    <button class="btn btn-light" type="button" id="button-plus"> + </button>
			  </div>
			  <input type="text" class="form-control" value="1">
			  <div class="input-group-append">
			    <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
			  </div>
			</div>
		</div> <!-- col.// -->
		<div class="form-group col-md">
			<a href="#"  class="btn  btn-primary"> 
				<i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
			</a>
			<a href="#" class="btn btn-light">
        <i class="fas fa-envelope"></i> <span class="text">Contact supplier</span> 
			</a>
		</div> <!-- col.// -->
	</div> <!-- row.// -->

</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->

<!-- ================ ITEM DETAIL END .// ================= -->


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