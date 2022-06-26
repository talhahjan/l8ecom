@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Product')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Product</li>
@endsection

@section('content')
<section class="content" style="padding:20px">
    <div class="container-fluid">

        @if (session()->has('message'))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{session('message')}}
            </div>

        </div>
        @endif

        @if (session()->has('error'))
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{session('error')}}
            </div>

        </div>
        @endif


        <div class="col-md-12">
            <div class="alert" id="alert">
            </div>

        </div>



        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><strong>Product</strong></h3>
                <a href="{{route('admin.product.create')}}"><button class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle"></i> Add
                        Product</button></a>
            </div><!-- card header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Thumbnails</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($products->count() > 0)
                        @foreach($products as $product) <tr id="{{$product->id}}">
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}} </td>
                            <td>
                                @if($product->categories()->count() > 0)
                                @foreach($product->categories as $category)
                                {{$category->section->title. '/' .$category->title}},
                                @endforeach
                                @else
                                <strong>No thumbnail</strong>
                                @endif</td>
                            </td>
                            <td>
                                @if($product->thumbnails()->count() > 0)
                                @foreach($product->thumbnails as $thumbnail)
                                {{$thumbnail->id}},
                                @endforeach
                                @else
                                <strong>No thumbnail</strong>
                                @endif</td>
                            <td>
                                <div class="btn-group btn-group-sm" style="max-height: 30px" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.product.edit',$product->slug)}}" class="btn btn-default btn-sm" title="Click To Edit">
                                        <i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-default btn-sm" title="Click Enable/Disable Status">
                                        <i class="fa {{$product->status==1 ? 'fa-eye' : 'fa-eye-slash'}}" onclick="changeStatus(this)" aria-hidden="true" id="status_{{$product->id}}"></i> </a>
                                    <a href=" #" onclick="confirmDelete(this)" class="btn btn-default btn-sm" title="Click to delete this record">
                                        <i class="fa fa-trash" style="display:inline"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">
                                <p class="text-center">No records in database</p>
                            </td>
                        </tr>
                        @endif


                </table>
                <div class="card-footer float-right">
                    {{$products->Links()}}
                </div>

            </div>


        </div>


    </div>
</section>
@endsection

@section('Css')

@endsection


@section('JsScript')
<script>
const notify = (type, msg) => {
    switch (type) {
        case 'success':
            toastr.success(msg);
            break;
        case 'danger':
            toastr.error(msg);
            break;
        case 'warning':
            toastr.warning(msg);
            break;
        case 'alert':
            toastr.alert(msg);
            break;
        case 'info':
            toastr.info(msg);
            break;

    }


}


    const deleteProduct = (selector) => {

        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const row = $(selector).parent().parent().parent();
        const id = $(row).attr('id');

        $.ajax({
            url: "{{route('admin.product.destroy',1)}}",
            type: "POST",
            data: {
                'record_id': id,
                '_token': CSRF_TOKEN,
                '_method': 'DELETE',
            },
            dataType: 'json',
            success: function(response) {
                console.log();
                if (response) {
                    notify(response.type, response.msg);
                    $(row).fadeOut(500);
                }
            },
        });
    }

    const confirmDelete = (selector) => {
        let choice = confirm("Are You sure, You want to Delete this record ? All its Sub-categories will also be deleted ");
        if (choice) {
            deleteProduct(selector);
        }
    }
    function changeStatus(selector) {

        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const _token = $('meta[name="csrf-token"]').attr('content');
        let currentStatus = $(selector).hasClass('fa-eye-slash') ? 0 : 1;
        let id = $(selector).parent().parent().parent().parent().attr('id');
        console.log(id)
        $.ajax({
            url: "{{route('admin.product.changestatus')}}",
            type: "POST",
            data: {
                record_id: id,
                _token: _token,
                'currentstatus': currentStatus,
            },

            success: function(response) {
                console.log(response);
                notify(response.type, response.msg);
                $(selector).toggleClass('fa-eye fa-eye-slash');
            },
        });


    }
</script>
@endsection