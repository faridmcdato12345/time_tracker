@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li style="list-style-type: none;"><i class="fa fa-close" style="font-size:24px;color:red"></i>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif