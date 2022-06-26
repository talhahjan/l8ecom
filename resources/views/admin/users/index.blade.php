@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: user')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">users</li>
@endsection

@section('content')

<!-- Main content -->
<section class="content" style="padding:20px">
    <div class="container-fluid">





        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><strong>Users</strong></h3>
                <a href="{{route('admin.user.create')}}"><button class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle"></i> Add
                        User</button></a>
            </div><!-- card header -->

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($users->count() > 0)
                        @foreach($users as $user)

                        <tr id="{{$user->id}}">
                            <td>{{$user->id}}</td>

                            <td> <span class="user-profile">
                                    <img src="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('uploads/users/avatars/default-avatar.png') }}" class="img-circle elevation-2" style="height: 30px; width:30px; margin-right: 10px" alt="User Image">
                                </span> {{$user->profile->first_name .' '.$user->profile->last_name}}
                            </td>
                            <td> {{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>
                                <div class="btn-group btn-group-sm" style="max-height: 30px" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-default btn-sm" title="Click To Edit">
                                        <i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-default btn-sm" title="Click Enable/Disable Status">
                                        <i class="fa {{$user->profile->status==1 ? 'fa-eye' : 'fa-eye-slash'}}" onclick="changeStatus(this);" aria-hidden="true" id="status_{{$user->id}}"></i> </a>
                                    <a href=" #" onclick="confirmDelete(this)" class="btn btn-default btn-sm" title="Click to delete this record">
                                        <i class="fa fa-trash" style="display:inline"></i>
                                    </a>
                                </div>
                            </td>


                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">
                                <p class="text-center">No records in database</p>
                            </td>
                        </tr>
                        @endif

                    </tbody>


                </table>
                <div class="card-footer float-right">
                    {{$users->Links()}}
                </div>

            </div>


        </div>


    </div>
</section>

@endsection






























@section('Css')
@endsection


@section('JsScript')
<script src="{{asset('assets/admin_plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script>
    const notify = (type, msg, title = 'Alert !') => {
        $.notify({
            title: `<strong>${title}</strong>`,
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

    const deleteUser = (selector) => {

        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const row = $(selector).parent().parent().parent();
        const id = $(row).attr('id');

        $.ajax({
            url: "{{route('admin.user.destroy',1)}}",
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


    const confirmDelete = (id) => {
        let choice = confirm("Are You sure, You want to Delete this record ? All its Sub-categories will also be deleted ");
        if (choice) {
            deleteUser(id);
        }
    }









    const changeStatus = (selector) => {

        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const currentStatus = $(selector).hasClass('fa-eye-slash') ? 0 : 1;
        const id = $(selector).parent().parent().parent().parent().attr('id');
        $.ajax({
            url: "{{route('admin.user.changestatus')}}",
            type: "POST",
            data: {
                'record_id': id,
                '_token': CSRF_TOKEN,
                'currentstatus': currentStatus,
            },

            success: function(response) {
                // console.log(response);
                notify(response.type, response.msg);
                $(selector).toggleClass('fa-eye fa-eye-slash');
            },
        });


    }
</script>
@endsection