@extends('layouts.admin')
@section('header-content')
    <h1>
        Create User
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/users')}}"><i class="fa fa-user-circle"></i> Users</a></li>
        <li><a href="{{url('admin/users/create')}}">Create User</a></li>
    </ol>
@endsection
@section('main-content')
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
            {{--{{ Form::hidden('type_id', '2') }}--}}
        </div>
        <div class="form-group">
            {!! Form::label('role_id','Role:') !!}
            {!! Form::select('user_type',[''=>'Choose option'] + $roles ,null,['class'=>'form-control']) !!}
        </div>
         <div class="form-group">
             {!! Form::label('file','File image:') !!}
             {!! Form::file('file',['class'=>'form-control']) !!}
         </div>
        <div class="form-group">
            {!! Form::label('Password','Password:') !!}
            <div class="row">
                <div class="col-md-10">
                    {!!  Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                    <button class="btn-success btn form-control">Generate Password</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Create User',['class'=>'form-control btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    @include('includes.errors')
@endsection