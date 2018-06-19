@extends('layouts.admin')
@section('header-content')
    <h1>
        Pace page
        <small>Loading example</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle"></i> Client</a></li>
        <li><a href="#">Create client</a></li>
    </ol>
    @stop
@section('main-content')
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store']) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
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
@stop
