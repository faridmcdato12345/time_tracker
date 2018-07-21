@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['method'=>'POST','action'=>['TimeTrackerController@store']]) !!}
                    <div class="form-group">
                        {!! Form::label('client_id','Client:') !!}
                        @if($client)
                            <select name="client" class="form-control">
                                @foreach($client as $clients)
                                    <option value="{{$clients->id}}">{{$clients->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group">
                                {!! Form::label('name','Name:') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create User',['class'=>'form-control btn btn-primary']) !!}
                            </div>
                        @endif
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
