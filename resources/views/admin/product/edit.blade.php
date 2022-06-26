@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Edit Product')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
@endsection

@section('content')
<!-- Main content -->
<section class="content" style="padding:20px">
    <div class="container-fluid">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif

        <!-- accordian star  -->
        <div id="accordion">
            <!-- form start -->
            <form action="{{route('admin.product.update', $product->slug)}}" method="post" name="form-example-1" id="form-example-1" enctype="multipart/form-data">
                @csrf
                @METHOD('PUT')
                <!-- card common start -->
                <div class="card">
                    <div class="card-header" id="common">
                        <h5 class="mb-0">
                            <button type="button" type="button" class="btn btn-outline" data-toggle="collapse" data-target="#collapseCommon" aria-expanded="true" aria-controls="collapseCommon">
                                <strong> Common</strong>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseCommon" class="collapse show" aria-labelledby="common" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{$product->title}}">
                                <p class="small">{{config('app.url')}}<span id="url">{{$product->slug}}</span></p>
                                <input type="hidden" name="slug" id="slug" value="{{$product->slug}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>

                                <textarea name="description" id="description" class="textarea" placeholder="Describe category" style="width: 100%; height: 300px;overflow-y:scroll; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {!!$product->description!!}

                                </textarea>
                            </div>

                            <div class="row">

                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                      
<select name="brand_id" id="brand_id" class="form-control select2">
@foreach($brands as $brand)
<option value="{{$brand->id}}"{{$product->brand_id==$brand->id ? ' selected': ''}}>{{$brand->title}}</option>
@endforeach
</select>

                                    </div>
                                </div>
                                <div class="col-md">
                                    <label for="status">Visibility</label>
                                    <select type="text" name="status" class="custom-select" id="status">
                                        <option value="1"{{$product->status==1 ? ' selected': ''}}>Visible</option>
                                        <option value="0"{{$product->status==0 ? ' selected': ''}}>Invisible</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- common card ends  -->

                <!-- card thumbnails starts -->
                <div class="card">
                    <div class="card-header" id="Thumbnails">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseThumbnails" aria-expanded="false" aria-controls="collapseThumbnails">
                                <strong> Thumbnails</strong>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThumbnails" class="collapse" aria-labelledby="Thumbnails" data-parent="#accordion">
                        <div class="card-body">
                            <div class="upload__box">
                                <div class="upload__img-wrap"></div>
                                <div class="upload__btn-box">
                                    <label class="upload__btn btn btn-outline-primary btn-block btn-sm"><i class="fas fa-upload"></i> Upload Multiple Images
                                        <input type="file" multiple="" data-max_length="20" name="thumbnails[]" class="upload__inputfile">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thumbnails card ends -->

                <!-- card Pricing  starts -->
                <div class="card">
                    <div class="card-header" id="Pricing">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapsePricing" aria-expanded="false" aria-controls="collapsePricing">
                                <strong> Pricing </strong>
                            </button>

                        </h5>
                    </div>
                    <div id="collapsePricing" class="collapse" aria-labelledby="Pricing" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md">
                                    <div class="form-input">
                                        <label for="Price">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" name="price" placeholder="00.00" class="form-control" value="{{$product->price}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-input">
                                        <label for="Price">Discount</label>
                                        <div class="input-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" name="discount_price" placeholder="00.00" value="{{$product->discount_price}}" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    

                                        </div>

                                        <div class="form-check my-2">
                 <input class="form-check-input" name="discount" type="checkbox" value="1" id="flexCheckChecked" {{$product->discount==1 ? ' checked': ''}}>
                 <label class="form-check-label" for="flexCheckChecked">
Enable Discount                 </label>
             </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pricing  card ends -->


                <!-- card Categorization starts -->
                <div class="card">
                    <div class="card-header" id="Categorization">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseCategorization" aria-expanded="false" aria-controls="collapseCategorization">
                                <strong> Categorization</strong>
                            </button>

                        </h5>
                    </div>
                    <div id="collapseCategorization" class="collapse" aria-labelledby="Categorization" data-parent="#accordion">
                        <div class="card-body">
                          
<select  id="categories" data-placeholder="Select a categories single or multiple" class="select2 form-control" name="categories[]" multiple="multiple" style="width: 100%;">
@foreach($sections as $section)
<optgroup label="{{$section->title}}">
@foreach($section->categories as $child)
<option value="{{$child->id}}"{{!is_null($ids) &&  in_array($child->id, $ids) ? ' selected': ''}}>
{{$section->title .' / ' . $child->title}}
</option>
@endforeach
</optgroup>
@endforeach
</select>
                        </div>
                    </div>
                </div>
                <!-- Categorization card ends -->

                <!-- card Featured  starts -->
                <div class="card">
                    <div class="card-header" id="Featured">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseFeatured" aria-expanded="false" aria-controls="collapseFeatured">
                                <strong> Featured</strong>
                            </button>

                        </h5>
                    </div>
                    <div id="collapseFeatured" class="collapse" aria-labelledby="Featured" data-parent="#accordion">
                        <div class="card-body">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="featured" value="1" id="featured"{{$product->featured ? ' checked': ''}}>
                                <label for="featured" class="custom-control-label">make this Product featured Product</label>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- featured  card ends -->




                <!-- card stock info starts -->
                <div class="card">
                    <div class="card-header" id="Stock">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseStock" aria-expanded="false" aria-controls="collapseStock">
                                <strong> Stock By sizes</strong>
                            </button>

                        </h5>
                    </div>
                    <div id="collapseStock" class="collapse" aria-labelledby="Stock" data-parent="#accordion">
                        <div class="card-body">


<div class="row">
<div class="col-md">


<!-- size range   -->
<div class="form-group">
    <label for="product_color">Size range</label>
<select name="size_range" id="size_range" class="custom-select">
<option value="0">Select Size Range</option>
@foreach($sizes as $key => $val)
<optgroup label="{{$key}}">
@foreach($val as $key1=> $val1)
<option value="{{$val1}}"{{$product->size_range==$val1 ? 'selected': ''}}>{{$key1}} {{$val1}}</option>
@endforeach
</optgroup>
@endforeach

</select>

  </div>

<!-- size range   -->




</div>

<div class="col-md">
<!-- stock availibilty by size  -->
<div class="form-group">
    <label for="stock">Stock Availibility By Size</label>
    <input type="text" class="form-control" id="stock" value="{{$stock}}" name="stock" placeholder="1-2, 2-3" >
    <small class="form-text text-muted">Please tell us how many pairs of which size you have in this product i.e {1-2, 2-3} means you have 2 pairs of size 1 and 3 pairs of size 2</small>
  </div>
<!-- stock availibilty by size  -->
</div>

<div class="col-md">

<!-- color value  -->

<div class="form-group">
    <label for="product_color">Color of Product</label>
<select name="product_color" id="product_color" data-placeholder="Select a color of product" class="select2 form-control" style="width: 100%;">
    <option value="">Select Color</option>
 @foreach($colors as $key2=> $val2)
<option value="{{$key2}}"{{$product->color==$key2 ? ' selected': ''}}>{{$key2}}</option>
@endforeach

    </select>

  </div>


<!-- color value  -->
</div>

</div>






                        </div>
                    </div>
                </div>
                <!-- stock info  card ends -->




                <!-- card Extras starts -->
                <div class="card">
                    <div class="card-header d-flex" id="Extras">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseExtras" aria-expanded="false" aria-controls="collapseExtras">
                                <strong> Extras</strong>
                            </button>

                        </h5>
                        <span class="ml-auto" id="collapseExtras">
                            <button type="button" id="btn-add" class="btn  btn-outline-primary btn-sm" style="display:inline">+</button>
                            <button type="button" id="btn-remove" class="btn btn-outline-danger btn-sm" style="display:inline">-</button>
                        </span>
                    </div>
                    <div id="collapseExtras" class="collapse" aria-labelledby="Extras" data-parent="#accordion">
                        
                    
                    <div class="card-body" id="extras">
@foreach($options as $key =>$val)
<div class="m-2 p-2 d-flex">
<span class="m-2 text-dark text-bold" >{{$key}}</span>
<input class="form-control" value="{{$val}}"  name="extras[{{$key}}]" />
<button class="btn btn-sm btn-danger pull-right" onClick="return removeThis(this)">  <i class="fa fa-trash"></i></button>
</div>

@endforeach
                        </div>
                    </div>
                </div>
                <!-- Extras card ends -->




                <div>
                    <button type="submit" type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-plus-circle"></i> Add Product</button>
                </div>
            </form>

        </div>
        <!-- accordion end  -->

    </div>
    <!-- /.card -->
</section>

@endsection

@section('Css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/admin_plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('assets/admin_plugins/summernote/summernote-bs4.css')}}">
<style>
    .upload__box {
        padding: 5px;
    }

    .upload__inputfile {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn-box {
        margin-bottom: 10px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }

    .hidden {
        display: none;
    }
</style>
@endsection



@section('JsScript')
<!-- Select2 -->
<script src="{{asset('assets/admin_plugins/select2/js/select2.full.min.js')}}"></script>
<!-- summernote bs4 -->
<script src="{{asset('assets/admin_plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('#categories').select2()
        theme: 'bootstrap4'
    });
    jQuery(document).ready(function() {
        ImgUpload();
    });

    const ImgUpload = () => {
        var imgWrap = "";
        var imgArray = [];
        $('.upload__inputfile').each(function() {
            $(this).on('change', function(e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');
                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function(f, index) {
                    if (!f.type.match('image.*')) {
                        return;
                    }
                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });
        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }

    const slugify = (str) => {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
        // remove accents, swap ñ for n, etc
        var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to = "aaaaaeeeeiiiioooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes
        return str;
    }
    $('#title').on('keyup', function() {
        var url = slugify($(this).val());
        $('#url').html(url);
        $('#slug').val(url);
    });

    $('.textarea').summernote({
        height: 150, //set editable area's height
        codemirror: { // codemirror options
            theme: 'spacelab'
        }
    });
    $('#btn-add').on('click', function(e) {
      makeOption();
    })
    $('#btn-remove').on('click', function(e) {
        var extras = document.getElementById('extras');
        extras.removeChild(extras.lastChild);

    });

    const makeOption = () => {
            let choice = prompt('Please Entile Extra Option');
            if (choice) {
          
  // Create a div
  var div = document.createElement("div");
  div.className="m-2 p-2 d-flex"
  div.innerHTML += `
 
 <span class="m-2 text-dark text-bold" >${choice}</span>
 `;         // Create a text node


// Create a text input
var text = document.createElement("input");
text.className="form-control";
text.setAttribute("type", "text");
text.setAttribute("name", extras[choice]); // you may want to change this

// add the file and text to the div
div.appendChild(text);


div.innerHTML+=` <button class="btn btn-sm btn-danger pull-right" onClick="return removeThis(this)">  <i class="fa fa-trash"></i></button>`;


//Append the div to the container div
document.getElementById("extras").appendChild(div);

            }


    }

function removeThis(e){
    e.parentNode.remove();
}



const createStock = () => {
let sizeRange=$('#size_range option:selected').val();
let split=sizeRange.split("-");
let text='{';

for (i = split[0]; i < parseInt(split[1])+1; i++) {
  text +=`"${i}":2`;
  if(i < parseInt(split[1]))
  text+=',';

}
text+='}';
$('#stock').attr("value", text);


}


$('#size_range').on("change",function() {
    createStock();
});
   
$('#stock').on("focus", function(){
    if($('#size_range').val()==0)
    alert('Please select Size Range First, so that we could make it easy to add sizes according stock')
});



const reconstructStock = () =>{
    let stock=$('#stock').val();
    let res = stock.replace(/"/g, '').replace('[','').replace(']','');
    $('#stock').val(res);
}

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#brand_id').select2();
    $('#product_color').select2();
    createStock();

});



</script>




@endsection