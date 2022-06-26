@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Edit User')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit User</li>
@endsection

@section('content')

<!-- Main content -->
<section class="content  style=" padding:20px"">
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



        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.user.update', $user->id)}}" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">


                    <div class="row">


                        <div class="col-md-9">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">First name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{$user->profile->first_name}}" placeholder="Enter First Name" required>
                                        <span>
                                            <p class="small">{{config('app.url')}}<span id="url">{{$user->profile->slug}}</p>
                                        </span>

                                        <input type="hidden" name="slug" id="slug" value="{{$user->profile->slug}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Last name</label>
                                        <input type="text" name="last_name" id="last_name" value="{{$user->profile->last_name}}" class="form-control" placeholder="Enter First Name">
                                    </div>
                                </div>

                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" autocomplete="off" name="password" class="form-control" placeholder="Keep Password Unchanged">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" id="password_confirmation" autocomplete="off" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Keep Password Unchanged">
                                    </div>
                                </div>



                            </div>




                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter Your Email-Address" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_password">Confirm Email</label>
                                        <input type="email" name="email_confirmation" value="{{$user->email}}" id="email_confirmation" class="form-control" placeholder="Re-Enter Your Email-Address" required>
                                    </div>
                                </div>



                            </div>







                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="0" {{$user->profile->status== 0 ? ' selected' : ''}}>Blocked
                                            </option>
                                            <option value="1" {{$user->profile->status==1 ? ' selected' : ''}}>Active
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">User Role</label>
                                        <select name="role" id="role_id" class="form-control">
                                            <option value="1" {{$user->role_id == 1 ? ' selected' : ''}}>Simple User
                                            </option>
                                            <option value="2" {{$user->role_id== 2 ? ' selected' : ''}}>Admin
                                            </option>
                                            <option value="3" {{$user->role_id== 3 ? ' selected' : ''}}>Super-Admin
                                            </option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="address">Address</label>

                                <textarea name="address" id="address" class="form-control" style="height: 100px">

                                {{$user->profile->address}} </textarea>
                            </div>



                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select name="country" id="country" class="form-control">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="state">State/Province</label>
                                        <select name="state" id="state" class="form-control">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="city">City/District</label>
                                        <select name="city" id="city" class="form-control">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">Phone #</label>
                                        <input type="tel" id="phone" name="phone" value="{{$user->profile->phone}}" class="form-control" required>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">

                        <div class="card card-primary">
                                <div class="card card-header">
                                    <h3 class="card-title">Profile Image</h3>
                                </div>

                                <div class="card-body">



                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" id="inputGroupFile01" name="avatar" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose
                                                file</label>
                                        </div>

                                    </div>
                                    <div class="alert"></div>

                                    <div class="img-thumbnail text-center" id="img_contain">
                                        <img width="200" height="200" id="blah" class="img-thumbnail rounded-circle" src="{{asset($user->profile->avatar)}}" alt="your image" title='' />
                                    </div>




                                </div>
                            </div>
                            <div class="row pt-2 px-2">
<a href="#" class="btn btn-outline-primary btn-block"><i class="far fa-edit"></i> Update User</a>

</div>
                         
                        </div>






                    </div>
                    <!-- /.card-body -->

                 
            </form>
        </div>
        <!-- /.card -->


    </div><!-- /.container-fluid -->
</section>

@endsection

@section('Css')
@endsection


@section('JsScript')
<script src="{{asset('assets/admin_plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script>




    $("#inputGroupFile01").change(function(event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#inputGroupFile01").on('click', function(event) {
        RecurFadeIn();
    });

    const readURL=(input) =>{
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

    const RecurFadeIn=()=> {
        // console.log('ran');
        FadeInAlert("Wait for it...");
    }

    const FadeInAlert=(text)=> {
        $(".alert").show();
        $(".alert").text(text).addClass("loading");

    }

    const slugify=(str)=> {
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

    $('#first_name').on('keyup', function() {
        var url = slugify($(this).val());
        $('#url').html(url);
        $('#slug').val(url);
    })




    $('#last_name').on('keyup', function() {

        var str = $('#first_name').val()
        // re-generate slug  if last name is changed
        var slug = slugify($('#first_name').val() + ' ' + $(this).val());
        // dispay in html



        $('#url').html(slug);
        $('#slug').val(slug);
    });
</script>
@endsection