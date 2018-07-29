<?php

namespace App\Http\Controllers;

use App\Client;
use App\TimeTrack;
use Carbon\Carbon;
use function compact;
use function explode;
use function gettype;
use Illuminate\Http\Request;
use function redirect;

class TimeTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_name = Client::pluck('name','id')->all();
        $client = Client::all();
        return view('admin.time_tracked.index', compact('client','client_name'));
//        return $client->name;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->show($request->client,$request->dateFrom,$request->dateTo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$dateFrom,$dateTo)
    {
        $fromDate = Carbon::parse($dateFrom);
        $toDate = Carbon::parse($dateTo);
        $client = TimeTrack::where('client_id','=',$id)->whereBetween('created_at',[$fromDate,$toDate])->get();
        $theClient = Client::findOrFail($id);
        return view('admin.time_tracked.show',compact('client','theClient'));
//        return $client."sum: ".$carbonTime;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
