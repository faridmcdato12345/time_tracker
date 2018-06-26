@extends('layouts.admin')
@section('header-content')
    <h1>
        Edit <strong>{{$client->name}}</strong>'s Account
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/client')}}"><i class="fa fa-user-circle"></i> Client</a></li>
        <li><a href="{{url('admin/client/edit')}}">Edit Client</a></li>
    </ol>
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            {!! Form::model($client,['method'=>'PATCH','action'=>['AdminClientsController@update',$client->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('subscription_id','Subscription Type:') !!}
                {!! Form::select('subscription_id',$sub_type ,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Client',['class'=>'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            @include('includes.errors')
        </div>
    </div>

@endsection