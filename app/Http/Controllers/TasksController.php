<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;
use App\Product;
use App\Employee;
Use DB;

class TasksController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all()->pluck('name');
        $products = Product::all()->pluck('name');
        return view('tasks.create')->with('employees',$employees)->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'employee_name'=>'required|nullable',
            'product_name' =>'required|nullable',
            'quantity' =>'required|nullable|integer',
            'gold_weight' =>'required|nullable|numeric',
            'received_date'=>'required|date|nullable'
        ]);
        
        $task = new Task;
        $selectionOptions1  = Employee::all()->pluck('name');
        $task->employee_id=DB::table('employees')->where('name', '=',$selectionOptions1[$request->input('employee_name')])->value('id');
        $selectionOptions2  = Product::all()->pluck('name');
        $task->product_id=DB::table('products')->where('name', '=', $selectionOptions2[$request->input('product_name')])->value('id');
        $task->user_id=auth()->user()->id;
        $task->quantity=$request->input('quantity');
        $task->available=0;
        $task->gold_weight=$request->input('gold_weight');
        $task->received_date=$request->input('received_date');
        $task->complete=false;
        $task->save();
        return redirect('/dashboard')->with('success','Task Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task= Task::find($id);
        return view('tasks.show')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task= Task::find($id);
        $employees = Employee::all()->pluck('name');
        $products = Product::all()->pluck('name');
        if(auth()->user()->id !==$task->user_id){
            return redirect('/dashboard')->with('error','Unauthorized Page');   
        }
        return view('tasks.edit')->with('task',$task)->with('employees',$employees)->with('products',$products);
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
        $this->validate($request,[
            'employee_name'=>'required|nullable',
            'product_name' =>'required|nullable',
            'quantity' =>'required|nullable|integer',
            'gold_weight' =>'required|numeric|nullable',
            'received_date'=>'required|nullable'
        ]);
        $task = Task::find($id);
        $selectionOptions1  = Employee::all()->pluck('name');
        $task->employee_id=DB::table('employees')->where('name', '=',$selectionOptions1[$request->input('employee_name')])->value('id');
        $selectionOptions2  = Product::all()->pluck('name');
        $task->product_id=DB::table('products')->where('name', '=', $selectionOptions2[$request->input('product_name')])->value('id');
        $task->user_id=auth()->user()->id;
        $task->quantity=$request->input('quantity');
        $task->available=0;
        $task->gold_weight=$request->input('gold_weight');
        $task->received_date=$request->input('received_date');
        $task->complete=false;
        $task->save();
        return redirect('/dashboard')->with('success','User Updated');
    }
    public function complete(Request $request)
    {
        $id=$request->id;
        $task= Task::find($id);
        if(auth()->user()->id !=$task->user_id){
            return redirect('/dashboard')->with('error','Unauthorized Page');   
        }
        return view('tasks.complete')->with('task',$task);
    }
    public function updateComplete(Request $request, $id)
    {
        $this->validate($request,[
            'wastage'=>'required|nullable|numeric',
            'complete_date'=>'required|nullable',
        ]);
        $task = Task::find($id);
        $task->wastage=$request->input('wastage');
        $x=$task->gold_weight;
        $y=$request->input('wastage');
        $z=$x-$y;
        $task->final_weight=$z;
        echo "<script type='text/javascript'>alert('$request->input('gold_weight')');</script>";
        $task->complete_date=$request->input('complete_date');
        $task->complete=true;
        $task->available=$task->quantity;
        $task->save();

        $product = Product::find($task->product->id);
        $product->available=$task->quantity;
        $product->save();
        return redirect('/dashboard')->with('success','Complete Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if(auth()->user()->id !==$task->user_id){
            return redirect('/dashboard')->with('error','Unauthorized Page');   
        }
        $task->delete();
        return redirect('/dashboard')->with('success','Task Removed');
    }
}
