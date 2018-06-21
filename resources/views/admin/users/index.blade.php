@extends('layouts.admin')
@section('header-content')
    <h1>
        View all users
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle"></i> Users</a></li>
        <li><a href="#">View Users</a></li>
    </ol>
@endsection
@section('main-content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>User Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
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
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>
                        <button class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></button>
                        <button class="btn btn-primary" data-toggle="tooltip" title="Edit User"><i class="fa fa-edit"></i></button>
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