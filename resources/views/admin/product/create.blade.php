@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Add Product')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
            <form action="{{route('admin.product.store')}}" method="post" name="form-example-1" id="form-example-1" enctype="multipart/form-data">
                @csrf
                @METHOD('POST')
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
                    <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                                <p class="small">{{config('app.url')}}products/<span id="url"></span></p>
                                <input type="hidden" name="slug" id="slug">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>

                                <textarea name="description" id="description" class="textarea" placeholder="Describe category" style="width: 100%; height: 300px;overflow-y:scroll; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {{old('description')}}

                                </textarea>
                            </div>

                            <div class="row">

                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                      
<select name="brand_id" id="brand_id" class="form-control select2">
@foreach($brands as $brand)
<option value="{{$brand->id}}">{{$brand->title}}</option>
@endforeach
</select>

                                    </div>
                                </div>
                                <div class="col-md">
                                    <label for="status">Visibility</label>
                                    <select type="text" name="status" class="custom-select" id="status">
                                        <option value="1"{{old('status')==1 ? ' selected': ''}}>Visible</option>
                                        <option value="0"{{old('status')==0 ? ' selected': ''}}>Invisible</option>
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
                                            <input type="number" name="price" value="{{old('price')}}" placeholder="00.00" class="form-control">
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
                                            <input type="number" name="discount_price" value="{{old('discount_price')}}" placeholder="00.00"  class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    

                                        </div>

                                        <div class="form-check my-2">
                 <input class="form-check-input" name="discount" type="checkbox" value="1" id="flexCheckChecked"{{old('discount')==1 ? ' checked': ''}}>
                 <label class="form-check-label" for="flexCheckChecked">
Enable Discount             </label>
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
<option value="{{$child->id}}">{{$section->title." / ".$child->title}}</option>
@endforeach
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
                                <input class="custom-control-input" name="featured" value="1" type="checkbox" id="featured" {{old('featured')==1 ? ' checked': ''}}>
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
    <label for="size_range">Size range</label>
<select name="size_range" id="size_range" class="custom-select">
<option value="0">Select Size Range</option>
@foreach($sizes as $key => $val)
<optgroup label="{{$key}}">
@foreach($val as $key1=> $val1)
<option value="{{$val1}}"{{old('size_range')==$val1 ? ' selected': ''}}>{{$key1}} {{$val1}}</option>
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
    <input type="text" class="form-control" id="stock"  name="stock" value="{{old('stock')}}" placeholder='"1":2, "2":3, "3":5'>
    <small class="form-text text-muted">Please tell us how many pairs of which size you have in this product i.e "1":2, "2":3 means you have 2 pairs of size 1 and 3 pairs of size 2</small>
  </div>
<!-- stock availibilty by size  -->


</div>

<div class="col-md">

<!-- color value  -->

<div class="form-group">
    <label for="product_color">Color of Product</label>
    <select name="product_color" id="product_color" class="custom-select select2">
    <option value="">Select Color</option>
 @foreach($colors as $key2=> $val2)
<option value="{{$key2}}"{{old('product_color')==$key2 ? ' selected': ''}}>{{$key2}}</option>
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
                                <strong> Attributes</strong>
                            </button>

                        </h5>
                    
                    </div>
                    <div id="collapseExtras" class="collapse" aria-labelledby="Extras" data-parent="#accordion">
                        <div class="card-body" id="extras">
                          <div class="m-2 p-2 d-flex">

                          <span class="m-2 text-dark text-bold" >Origin</span>
<input class="form-control" name="origin" value="Pakistan" />

                        </div>



                        <div class="m-2 p-2 d-flex">

<span class="m-2 text-dark text-bold" >Article</span>
<input class="form-control" type="text"  name="article"  />
</div>


<div class="m-2 p-2 d-flex">

<span class="m-2 text-dark text-bold" >Material</span>
<input class="form-control" type="text"  name="materials" data-role="tagsinput" value="pu,leather,fabric" />

</div>


<div class="m-2 p-2 d-flex">

<span class="m-2 text-dark text-bold" >Warranty</span>
<input class="form-control" type="text"  name="warranty" value="No warranty" />
</div>



<div class="m-2 p-2 d-flex">

<span class="m-2 text-dark text-bold" >Features</span>
<input class="form-control" type="text"  name="features" data-role="tagsinput" value="Good Looking,washable,Shock absorbent, Designer,Light Weight, Comfortable" />

</div>


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
<link rel="stylesheet" href="{{asset('assets/admin_plugins/select2/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}" />
<!-- tags Input  -->
<link rel="stylesheet" href="{{asset('assets/admin_plugins/taginput/tagsinput.css')}}" />

<!-- summernote -->
<link rel="stylesheet" href="{{ asset('assets/admin_plugins/summernote/summernote-bs4.css')}}" />

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
<!-- Tags Input  -->
<script src="{{asset('assets/admin_plugins/taginput/tagsinput.js')}}"></script>
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
        // remove accents, swap Ã± for n, etc
        var from = "Ã Ã¡Ã£Ã¤Ã¢Ã¨Ã©Ã«ÃªÃ¬Ã­Ã¯Ã®Ã²Ã³Ã¶Ã´Ã¹ÃºÃ¼Ã»Ã±Ã§Â·/_,:;";
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
        var url =  slugify($(this).val());
        $('#url').html(url);
        $('#slug').val(url);
    });

    $('.textarea').summernote({
        height: 150, //set editable area's height
        codemirror: { // codemirror options
            theme: 'spacelab'
        }
    });

    
  

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#brand_id').select2();
    $('#product_color').select2();
});

const createStock = () => {
let sizeRange=$('#size_range option:selected').val();
let split=sizeRange.split("-");
let text='';

for (i = split[0]; i < parseInt(split[1])+1; i++) {
  text +=`${i}:2`;
  if(i < parseInt(split[1]))
  text+=',';

}
$('#stock').attr("value", text);


}

$('#size_range').on("change",function() {

    createStock();

});



</script>



@endsection