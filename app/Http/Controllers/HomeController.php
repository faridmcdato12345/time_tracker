<?php

namespace App\Http\Controllers;

use App\Client;
use App\TimeTrack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return redirect('admin/users');
            }
            else{
                $client = Client::all();
                return view('home', compact('client'));
            }
        }
    }
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $input = $request->all();
        $input['user_id']= $user;
        TimeTrack::create($input);
        return redirect('home');
    }
}
