@extends('layouts.admin')
@section('header-content')
    <h1>
        Types of subscription
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle"></i> Subscription</a></li>
        <li><a href="#">View Subscription</a></li>
    </ol>
@stop
@section('main-content')
    @if(Session::has('updated_subscription'))
        <p class="bg-success" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('updated_subscription')}}</p>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Subscription Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>

            @if($subs)
                @foreach($subs as $sub)
                    <tr>
                        <td>{{$sub->id}}</td>
                        <td>{{$sub->name}}</td>
                        <td>{{$sub->created_at->diffForHumans()}}</td>
                        <td>{{$sub->updated_at->diffForHumans()}}</td>
                        <td>
                            {{--<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></a>--}}
                            {!! Form::open(['method'=>'DELETE','action'=>['AdminSubscriptionsController@destroy', $sub->id],'class'=>'deleteButtonUsers']) !!}
                            {{--<div class="form-group">--}}
                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm', 'data-toggle'=>'tooltip', 'title'=>'Delete User'] )  }}
                            {{--</div>--}}
                            {!! Form::close() !!}

                            <a href="{{route('subscriptions.edit',$sub->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit User"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop