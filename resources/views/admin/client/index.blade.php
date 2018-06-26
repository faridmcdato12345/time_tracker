@extends('layouts.admin')
@section('header-content')
    <h1>
        Clients List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle"></i> Client</a></li>
        <li><a href="#">View client</a></li>
    </ol>
@stop
@section('main-content')
    @if(Session::has('deleted_client'))
        <p class="bg-danger" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('deleted_client')}}</p>
    @endif
    @if(Session::has('created_client'))
        <p class="bg-success" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('created_client')}}</p>
    @endif
    @if(Session::has('updated_client'))
        <p class="bg-primary" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('updated_client')}}</p>
    @endif
    @if(Session::has('updated_status_user'))
        <p class="bg-primary" style="font-weight: bold;font-size: 16px;padding: 10px 10px;">{{session('updated_status_user')}}</p>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Client Name</th>
                <th>Subscription</th>
                <th>Created At</th>
                <th>Update At</th>
            </tr>
        </thead>
        <tbody>
            @if($clients)
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->subscriptionType->name}}</td>
                        <td>{{$client->created_at->diffForHumans()}}</td>
                        <td>{{$client->updated_at->diffForHumans()}}</td>
                        <td>
                            {{--<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></a>--}}
                            {!! Form::open(['method'=>'DELETE','action'=>['AdminClientsController@destroy', $client->id],'class'=>'deleteButtonUsers']) !!}
                            {{--<div class="form-group">--}}
                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm', 'data-toggle'=>'tooltip', 'title'=>'Delete User'] )  }}
                            {{--</div>--}}
                            {!! Form::close() !!}

                            <a href="{{route('clients.edit',$client->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit User"><i class="fa fa-edit"></i></a>
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
@endsection