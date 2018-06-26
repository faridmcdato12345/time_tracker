<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Subscription;
use function compact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = Subscription::all();
        return view('admin.subscription.index', compact('subs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionRequest $request)
    {
        $input = $request->all();
        Subscription::create($input);
        Session::flash('created_subscription',$input['name'].' has been created');
        return redirect('admin/subscriptions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subs = Subscription::findOrFail($id);
        $sub = Subscription::pluck('name','id')->all();
//        $role = UserType::pluck('name','id')->all();
        return view('admin.subscription.edit',compact('subs','sub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionRequest $request, $id)
    {
        $subs = Subscription::findOrFail($id);
        $input = $request->all();
//        return $input;
        Session::flash('updated_subscription',$subs->name.' has been updated to ' .$request->name);
        $subs->update($input);
        return redirect('admin/subscriptions');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subs = Subscription::findOrFail($id);
        $subs->delete();
        Session::flash('deleted_user',$subs->name.' has been deleted');
        return redirect('admin/subscriptions');
    }
}
