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
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td><button class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></button></td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
                <td><button class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></button></td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td><button class="btn btn-danger" data-toggle="tooltip" title="Delete User!"><i class="fa fa-times"></i></button></td>
            </tr>
        </tbody>
    </table>
@stop