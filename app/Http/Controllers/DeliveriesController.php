<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Task;
use App\Delivery;
use App\Product;
use App\User;
Use DB;

class DeliveriesController extends Controller
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
        $deliveries= Delivery::orderBy('created_at','desc')->paginate(10);
        return view('deliveries.index')->with('deliveries', $deliveries)->with('tasks',$tasks)->with('users',$users);
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
    public function createdel($id)
    {
        $suppliers = Supplier::all()->pluck('name');
        $task = Task::find($id);
        return view('deliveries.create')->with('id',$id)->with('suppliers',$suppliers)->with('task',$task);
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
    public function storedel(Request $request,$id)
    {
        $this->validate($request,[
            'amount' =>'required|nullable|integer',
            'supplier_name'=>'required|nullable|integer',
            'delivery_date'=>'required|date|nullable',
            'count'=>'required|nullable|integer'
        ]);

        $task = Task::find($id);
        $delivery = new Delivery;
        $delivery->task_id=$id;
        $delivery->user_id=auth()->user()->id;
        $selectionOptions1=Supplier::all()->pluck('name');
        $delivery->supplier_id=DB::table('suppliers')->where('name', '=',$selectionOptions1[$request->input('supplier_name')])->value('id');
        $delivery->amount=$request->input('amount')*$request->input('count');
        $delivery->delivery_date=$request->input('delivery_date');
        $delivery->count=$request->input('count');
        $delivery->save();
        
        $product = Product::find($task->product->id);
        $product->available=$product->available-$delivery->count;
        $product->save();

        $task->available=$task->available-$delivery->count;
        $task->save();
        return redirect('/dashboard')->with('success','Product Delivered & Payment Settled');
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
        $delivery = Delivery::find($id);
        
        $task = Task::find($delivery->task_id);
        $product = Product::find($task->product->id);
        $product->available=$product->available-$delivery->count;
        $product->save();

        $task->available=$task->available-$delivery->count;
        $task->save();

        $delivery->delete();
        return redirect('/deliveries')->with('success','Delivery No '.$id.' Removed & Add that in store count');
    }
}
