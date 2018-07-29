@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {!! Form::open(['method'=>'POST','action'=>['HomeController@store']]) !!}
                            <div class="form-group">
                                {!! Form::label('client_id','Client:') !!}
                                @if($client)
                                    <select name="client" class="form-control" >
                                        <option value="" selected="selected">Choose a client here...</option>
                                        @foreach($client as $clients)
                                            <option value="{{$clients->id}}">{{$clients->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create User',['class'=>'form-control btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('count_timer')
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>--}}
    {{--<script>--}}
    {{--$(document).ready(function(){--}}
    {{--$('#start, #pause, #stop, #resume,#start1').click(function(){--}}
    {{--if(this.id == 'start'){--}}
    {{--$('.timer').countimer();--}}
    {{--$('#start, #stop').toggle();--}}
    {{--}--}}
    {{--if(this.id == 'pause'){--}}
    {{--$('.timer').countimer('stop');--}}
    {{--$('#resume, #pause').toggle();--}}
    {{--}--}}
    {{--if(this.id == 'resume'){--}}
    {{--$('.timer').countimer('resume');--}}
    {{--$('#resume, #pause').toggle();--}}
    {{--}--}}
    {{--if(this.id == 'stop'){--}}
    {{--$('.timer').countimer('stop');--}}
    {{--$('#start1, #stop').toggle();--}}
    {{--}--}}
    {{--if(this.id == 'start1'){--}}
    {{--$('.timer').countimer('resume');--}}
    {{--$('#start1, #stop').toggle();--}}
    {{--}--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endsection

