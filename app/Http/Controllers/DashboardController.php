<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class DashboardController extends Controller
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
        $tasks= Task::orderBy('available','desc')->orderBy('id','desc')->orderBy('complete','desc')->get();
        return view('dashboard')->with('tasks',$tasks);
    }
}
