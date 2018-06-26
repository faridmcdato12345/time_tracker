@extends('layouts.admin')
@section('header-content')
    <h1>
        Create Client
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle"></i> Client</a></li>
        <li><a href="#">Create client</a></li>
    </ol>
    @stop
@section('main-content')
    {!! Form::open(['method'=>'POST','action'=>'AdminClientsController@store']) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subscription_id','Subscription type:') !!}
            {!! Form::select('subscription_id',[''=>'Choose option'] + $sub_type,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Client',['class'=>'form-control btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop
