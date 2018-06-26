@extends('layouts.admin')
@section('header-content')
    <h1>
        Create subscription
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle"></i> Subscription</a></li>
        <li><a href="#">Create subscription</a></li>
    </ol>
@stop
@section('main-content')
    {!! Form::open(['method'=>'POST','action'=>'AdminSubscriptionsController@store']) !!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Subscription',['class'=>'form-control btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.errors')
@stop