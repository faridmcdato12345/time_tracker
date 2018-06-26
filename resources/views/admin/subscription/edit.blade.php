@extends('layouts.admin')
@section('header-content')
    <h1>
        Edit <strong>{{$subs->name}}</strong>'s Account
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/subscription')}}"><i class="fa fa-user-circle"></i> Subscription</a></li>
        <li><a href="{{url('admin/subscription/edit')}}">Edit Subscription</a></li>
    </ol>
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            {!! Form::model($subs,['method'=>'PATCH','action'=>['AdminSubscriptionsController@update',$subs->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Subscription',['class'=>'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            @include('includes.errors')
        </div>
    </div>

@endsection