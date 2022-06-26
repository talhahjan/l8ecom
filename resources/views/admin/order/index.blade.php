@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard ')


@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Order</li>
@endsection


@section('content')
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">


    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form">
        <div class="card-body">




          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>

            <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>


          <div class="form-group">
            <label>Select category</label>
            <label>Multiple</label>
            <select class="select2" multiple="multiple" autocomplete="off" data-placeholder="Select a State" style="width: 100%;">
              <option>Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select> </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->


  </div><!-- /.container-fluid -->
</section>

@endsection


@section('Css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

@endsection


@section('JsScript')
<!-- Select2 -->
<script src="{{ asset('assets/admin_plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/admin_plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function() {
    // Summernote
    $('.textarea').summernote()
  })

  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
@endsection