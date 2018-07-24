@extends('layouts.admin')
@section('header-content')
    <h1>
        {{$client->name}}
    </h1>
@stop
@section('main-content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time Consume</th>
            </tr>
        </thead>
        <tbody>
            @if($client)
               @foreach($client as $clients)
                   <tr>
                       <td>{{$client->created_at}}</td>
                       <td>Doe</td>
                       <td>john@example.com</td>
                       <td><button class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></button></td>
                   </tr>
               @endforeach
            @endif
        </tbody>
    </table>
@stop