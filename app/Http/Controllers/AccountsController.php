<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Task;
use App\User;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tasks=Task::all();
        $users=User::all();
        $accounts= Account::orderBy('created_at','desc')->paginate(10);
        return view('accounts.index')->with('accounts', $accounts)->with('tasks',$tasks)->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function createacc($id)
    {
        return view('accounts.create')->with('id',$id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function storeacc(Request $request,$id)
    {
        $this->validate($request,[
            'salary' =>'required|nullable|integer',
            'paid_date'=>'required|date|nullable'
        ]);
        
        $account = new Account;
        $account->task_id=$id;
        $account->user_id=auth()->user()->id;
        $account->salary=$request->input('salary');
        $account->paid_date=$request->input('paid_date');
        $account->paid=true;
        $account->save();
        return redirect('/dashboard')->with('success','Salary Paid');
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
        $account = Account::find($id);
        $account->delete();
        return redirect('/accounts')->with('success','Account No '.$id.' Removed');
    }
}
