@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Add Brand')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.brand.index')}}">Brand</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Brand</li>
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
      <form action="{{route('admin.brand.store')}}" method="post" name="form-example-1" id="form-example-1" enctype="multipart/form-data">
        @csrf
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

                <input type="text" id="title" name="title" class="form-control" placeholder="brand Title">

              </div>


            </div>
          </div>
        </div>
        <!-- common card ends  -->

        <!-- card Logo starts -->
        <div class="card">
          <div class="card-header" id="Logo">
            <h5 class="mb-0">
              <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseLogo" aria-expanded="false" aria-controls="collapseLogo">
                <strong> Logo</strong>
              </button>
            </h5>
          </div>
          <div id="collapseLogo" class="collapse" aria-labelledby="Logo" data-parent="#accordion">
            <div class="card-body">

              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" id="inputGroupFile01" name="logo" class="form-controll" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose
                    file</label>

                </div>

              </div>

              <div class="alert"></div>



              <div id="thumbnail">
                <img id="blah" class="img-thumbnail" src="{{asset('assets/img/No_image_available.png')}}" alt="your image">
              </div>


            </div>
          </div>
        </div>
        <!-- Logo card ends -->

      

        <div>
          <button type="submit" type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-plus-circle"></i> Add Brand</button>
        </div>
      </form>

    </div>
    <!-- accordion end  -->

    <section>
  </div>

  @endsection
  @section('Css')
  @endsection


  @section('JsScript')
  <script>
    $("#inputGroupFile01").change(function(event) {
      RecurFadeIn();
      readURL(this);
    });
    $("#inputGroupFile01").on('click', function(event) {
      RecurFadeIn();
    });

    const readURL = (input) => {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#inputGroupFile01").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function(e) {
          debugger;
          $('#blah').attr('src', e.target.result);

          $('#blah').hide();
          $('#blah').fadeIn(500);
          $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
      }
      $(".alert").removeClass("loading").hide();
    }

    const RecurFadeIn = () => {
      // console.log('ran');
      FadeInAlert("Wait for it...");
    }

    const FadeInAlert = (text) => {
      $(".alert").show();
      $(".alert").text(text).addClass("loading");

    }
  </script>
  @endsection