@extends('layouts.admin')
@section('header-content')
    <h1>
        Edit <strong>{{$user->name}}</strong>'s Account
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/users')}}"><i class="fa fa-user-circle"></i> Users</a></li>
        <li><a href="{{url('admin/users/edit')}}">Edit User</a></li>
    </ol>
@endsection
@section('main-content')
    <div class="col-sm-3 text-center">
        <img height="300" class="img-circle img-responsive" src="{{$user->photo ? $user->photo->path : 'http://via.placeholder.com/50x50'}}" alt="{{$user->photo ? $user->photo->path : $user->photo}}">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id','Role:') !!}
            {!! Form::select('user_type',$role ,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file','Upload image:') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Password','Password:') !!}
            <div class="row">
                <div class="col-md-10">
                    {!!  Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                    <button class="btn-success btn form-control"><span class="small">Generate Password</span></button>
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Update User',['class'=>'form-control btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @include('includes.errors')
@endsection