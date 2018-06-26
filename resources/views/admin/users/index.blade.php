@extends('layouts.admin')
@section('header-content')
    <h1>
        User List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle"></i> Users</a></li>
        <li><a href="#">View Users</a></li>
    </ol>
@endsection
@section('main-content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('deleted_user')}}</p>
    @endif
    @if(Session::has('created_user'))
        <p class="bg-success" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('created_user')}}</p>
    @endif
    @if(Session::has('updated_user'))
        <p class="bg-primary" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('updated_user')}}</p>
    @endif
    @if(Session::has('updated_status_user'))
        <p class="bg-primary" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('updated_status_user')}}</p>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>User Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->path : 'http://via.placeholder.com/50x50'}}" alt=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'Roles are not created yet.Please create roles.'}}</td>
                    <td>
                        @if($user->status == '1')
                            {!! Form::open(['method'=>'PATCH','action'=>['AdminUsersController@is_Active',$user->id],'files'=>true]) !!}
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm disabled">Active</button>
                                    {{ Form::hidden('status', '0') }}
                                    {{ Form::submit('Inactive',['class'=>'btn btn-danger btn-sm'])  }}
                                </div>
                            {!! Form::close() !!}
                        @endif
                        @if($user->status != '1')
                            {!! Form::open(['method'=>'PATCH','action'=>['AdminUsersController@is_Active',$user->id],'files'=>true]) !!}
                                <div class="form-group">
                                    {{ Form::hidden('status', '1') }}
                                    {{ Form::submit('Active',['class'=>'btn btn-primary btn-sm'])  }}
                                    <button class="btn btn-danger btn-sm disabled">In Active</button>
                                </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>
                        {{--<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></a>--}}
                       {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id],'class'=>'deleteButtonUsers']) !!}
                           {{--<div class="form-group">--}}
                               {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm', 'data-toggle'=>'tooltip', 'title'=>'Delete User'] )  }}
                           {{--</div>--}}
                       {!! Form::close() !!}

                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit User"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection