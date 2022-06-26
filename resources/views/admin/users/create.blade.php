@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Add User')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">users</a></li>
<li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                <h3 class="card-title">Add User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.user.store')}}" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">


                    <div class="row">


                        <div class="col-md-9">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">First name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="Enter First Name" required>
                                        <p class="small">{{config('app.url')}}<span id="url"></span></p>
                                        <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Last name</label>
                                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control" value="" placeholder="Enter First Name">
                                    </div>
                                </div>

                            </div>




                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Your Email-Address" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_password">Confirm Email</label>
                                        <input type="email" id="email" name="email_confirmation" value="{{ old('email_confirmation') }}" id="email_confirmation" class="form-control" placeholder="Re-Enter Your Email-Address" required>
                                    </div>
                                </div>



                            </div>





                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-Enter Password" required>
                                    </div>
                                </div>



                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="0" selected>Blocked</option>
                                            <option value="1">Active</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">User Role</label>
                                        <select name="role" id="role_id" class="form-control">
                                            <option value="1" selected>Simple User</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Super-Admin</option>

                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="address">Address</label>

                                <textarea name="address" id="address" class="form-control" style="height: 100px">

                                {{ old('address') }}
                                </textarea>
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
                                        <input type="phone" id="phone" name="phone" value="{{ old('phone') }}" class="form-control">
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
                                            <input type="file" id="inputGroupFile01" name="avatar" class="form-controll" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose
                                                file</label>

                                        </div>

                                    </div>

                                    <div class="alert"></div>
                                    <div class="img-thumbnail text-center" id="img_contain">
                                        <img width="200" height="200" id="blah" src="{{asset('uploads/users/avatars/default-avatar.png')}}" alt="your image" title='' />
                                    </div>




                                </div>
                            </div>


                        </div>






                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg btn-primary">create User</button>
                    </div>
            </form>
        </div>
        <!-- /.card -->


    </div><!-- /.container-fluid -->
</section>

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

    const readURL=(input)=> {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputGroupFile01").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#blah').attr('src', e.target.result);
                $('#blah').attr('class', 'rounded-circle');

                $('#blah').hide();
                $('#blah').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    }

    const RecurFadeIn=()=> {
        console.log('ran');
        FadeInAlert("Wait for it...");
    }

    const FadeInAlert=(text) =>{
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
// generate slug when first_name input keyup
    $('#first_name').on('keyup', function() {
        var url = slugify($(this).val());
        $('#url').html(url);
        $('#slug').val(url);
    })



/* append slug as last name input is keyup */
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