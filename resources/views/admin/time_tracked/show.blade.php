@extends('layouts.admin')
@section('header-content')
    <h1>CLIENT: <span style="text-transform: uppercase;font-weight: bold;font-size: 26px;">{{$theClient->name}}</span></h1>
@stop
@section('main-content')
    <table class="table table-striped">
        <h4>Time Record</h4>
        <thead>
            <tr>
                <th>Worker</th>
                <th>Date</th>
                <th>Time Spent</th>
            </tr>
        </thead>
        <tbody>
            @if($client)
               @foreach($client as $clients)
                   <tr>
                       <td>{{$clients->user->name}}</td>
                       <td>{{$clients->created_at->toFormattedDateString()}}</td>
                       <td class="clientSpent">{{$clients->time_consume}}</td>
                   </tr>
               @endforeach
                    <tr style="font-weight: bold;font-size: 20px;">
                        <td>TOTAL:</td>
                        <td></td>
                        <td class="totalSum"></td>
                    </tr>
            @endif
        </tbody>
    </table>
    <script type="text/javascript">
        $(document).ready(function(){
            var totalHour = 0;
            var totalMin = 0;
            var totalSec = 0;
            $('.clientSpent').each(function(){
                var timeVal = $(this).html();
                var timeArr = timeVal.split(':');
                totalSec += parseInt(timeArr[2]);
                totalMin += parseInt(timeArr[1]);
                totalHour += parseInt(timeArr[0]);
                if(totalSec >= 60){
                    totalMin += 1;
                    var initSec = totalSec - 60;
                    totalSec = initSec;
                }
                if(totalMin >= 60){
                    totalHour += 1;
                    var initMin = totalMin - 60;
                    totalMin = initMin;
                }
            });
            var stringHour = totalHour.toString().length < 2 ? '0'+totalHour.toString() : totalHour.toString();
            var stringMin = totalMin.toString().length < 2 ? '0'+totalMin.toString() : totalMin.toString();
            var stringSec = totalSec.toString().length < 2 ? '0'+totalSec.toString() : totalSec.toString();
            $('.totalSum').html(stringHour+":"+stringMin+":"+stringSec);
        });
    </script>
@stop
