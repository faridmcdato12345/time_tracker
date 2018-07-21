@extends('layouts.admin')
@section('header-content')
    <h1>
        Time Tracker
    </h1>
@stop
@section('main-content')
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
                 {!! Form::label('date-from','From:') !!}
                <div class="input-group date" id="datetimepicker1">
                    {!! Form::date('dateFrom', \Carbon\Carbon::now()->format('D/M/Y'), ['class' => 'form-control', 'required' => true]) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('date-to','To:') !!}
                {!! Form::date('dateTo', \Carbon\Carbon::now()->format('D/M/Y'), ['class' => 'form-control', 'required' => true]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create User',['class'=>'form-control btn btn-primary']) !!}
            </div>
        @endif
    </div>
{!! Form::close() !!}
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
@stop
