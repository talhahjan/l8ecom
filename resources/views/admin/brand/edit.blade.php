@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Edit Brand')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.brand.index')}}">Brand</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
@endsection

@section('content')
<!-- Main content -->
<brand class="content  style=" padding:20px"">
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
      <form action="{{route('admin.brand.update', $brand->id)}}" method="post" name="form-example-1" id="form-example-1" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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

                <input type="text" id="title" name="title" class="form-control" value="{{$brand->title}}" placeholder="brand Title">

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



              @isset($brand->logo)

              <div class="text-center" id="thumbnail">
                <img id="blah" class="img-thumbnail" src="{{asset($brand->logo)}}" alt="your image">
                <a href="#" id="btn-del" class="btn btn-danger btn-sm" onclick="confirmDelete({{$brand->id}})"><i class="fa fa-trash"></i></a>
              </div>

              @endisset

              @empty($brand->logo)
              <div id="thumbnail">
                <img id="blah" class="img-thumbnail" src="{{asset('assets/img/No_image_available.png')}}" alt="your image">
              </div>
              @endempty


            </div>
          </div>
        </div>
        <!-- Logo card ends -->



        <div>
          <button type="submit" type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-plus-circle"></i> Edit Brand</button>
        </div>
      </form>

    </div>
    <!-- accordion end  -->

    <div>
      <section>

        @endsection

        @section('Css')
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/admin_plugins/summernote/summernote-bs4.css')}}">

        <style>
          .hidden {
            display: none;
          }

          #thumbnail {
            position: relative;
            width: 100%;
            max-width: 320px;

          }

          #thumbnail img {
            width: 100%;
            height: auto;
          }

          #thumbnail .btn {
            position: absolute;
            top: 20%;
            left: 90%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
          }
        </style>
        @endsection



        @section('JsScript')
        <script src="{{asset('assets/admin_plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
        <script>
          const notify = (type, msg, title = 'Alert !') => {
            $.notify({
              title: `<strong>${title}.</strong>`,
              icon: type == 'success' ? 'fa fa-check' : 'fa fa-ban',
              message: msg
            }, {
              type: type,
              animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutRight'
              },
              placement: {
                from: "bottom",
                align: "right"
              },
              offset: 20,
              spacing: 10,
              z_index: 1031,
            });
          }

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
            console.log('ran');
            FadeInAlert("Wait for it...");
          }

          const FadeInAlert = (text) => {
            $(".alert").show();
            $(".alert").text(text).addClass("loading");

          }
          const deleteImage = (id) => {
            $(document).ready(function() {
              const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

              const record_id = id;
              const _token = $('meta[name="csrf-token"]').attr('content');
              const table = 'brands';
              $.ajax({
                url: "{{route('admin.delete.image')}}",
                type: "GET",
                data: {
                  record_id: id,
                  _token: _token,
                  'table': table,
                },
                dataType: 'json',
                success: function(response) {
                  console.log();
                  if (response) {
                    notify(response.type, response.msg);
                    $('#blah').fadeOut(500);
                    $('#blah').hide()
                    $('#btn-del').hide();
                  }
                },
              });
            });

          }
          const confirmDelete = (id) => {
            let choice = confirm("Are You sure, You want to Delete this record ? All its Sub-categories will also be deleted ");
            if (choice) {
              deleteImage(id);
            }
          }
        </script>
        @endsection