@extends('layouts.User.auth')

@section('content')
<nav class="navbar navbar-expand navbar-transparent navbar-absolute fixed-top text-white">
    <ul class="navbar-nav d-md-flex mr-auto">
<<<<<<< HEAD
    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
    </ul>
    <ul class="navbar-nav">
    <li  class="nav-item active"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
    <li  class="nav-item"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>
   
  </ul> <!-- list-inline //  -->
=======
        <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>

    </ul> <!-- list-inline //  -->
>>>>>>> 3b677d2... admin panel 90% ready add create manage user
</nav>


<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/img/login.jpg'); background-size: cover; background-position: top center;">
<<<<<<< HEAD
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
=======
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
>>>>>>> 3b677d2... admin panel 90% ready add create manage user
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
</div>
</div>

@endsection
=======

@endsection
@section('Css')

@endsection


@section('jScript')
<script>
    $("#inputGroupFile01").change(function(event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#inputGroupFile01").on('click', function(event) {
        RecurFadeIn();
    });

    function readURL(input) {
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

    function RecurFadeIn() {
        console.log('ran');
        FadeInAlert("Wait for it...");
    }

    function FadeInAlert(text) {
        $(".alert").show();
        $(".alert").text(text).addClass("loading");

    }

    function slugify(str) {
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



    @if(session('status'))
    $.notify({
        icon: "add_alert",
        title: "Notification",
        animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp",
        },
        message: "{{ session('status') }}"
    }, {
        type: 'success',
        timer: 4000,
        placement: {
            from: 'top',
            align: 'center'
        }
    });
    @endif


    @if($errors - > any())
    $.notify({
        icon: "error",
        title: "<strong>An Error Occured</strong>",
        animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp",
        },
        message: "<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>"
    }, {
        type: 'danger',
        timer: 4000,
        placement: {
            from: 'top',
            align: 'center'
        }
    });

    @endif


    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
@endsection
>>>>>>> 3b677d2... admin panel 90% ready add create manage user
