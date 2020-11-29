<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SuppliersController extends Controller
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
        $suppliers= Supplier::orderBy('created_at','desc')->paginate(12);
        return view('suppliers.index')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'name'=>'required|nullable||unique:suppliers',
            'email' => 'required|email|max:255|unique:suppliers',
            'profile_image'=>'image|nullable|max:1999',
            'nic_no'=>'required|nullable|unique:suppliers',
            'phone_no'=>'required|nullable|unique:suppliers|min:10|max:10',
            'address'=>'required|nullable' ,
        ]);
        if($request->hasFile('profile_image')){
            $filenameWithExt= $request->file('profile_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('profile_image')->storeAs('public/profile_images/Suppliers',$fileNameToStore);
        }else{
            $fileNameToStore ='default.jpg';
        }
        $supplier = new Supplier;
        $supplier->name=$request->input('name');
        $supplier->email=$request->input('email');
        $supplier->phone_no=$request->input('phone_no');
        $supplier->address=$request->input('address');
        $supplier->profile_image=$fileNameToStore;
        $supplier->nic_no=$request->input('nic_no');
        $supplier->save();
        return redirect('/suppliers')->with('success','Supplier Added');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier= Supplier::find($id);
        return view('suppliers.show')->with('supplier',$supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier= Supplier::find($id);
        return view('suppliers.edit')->with('supplier',$supplier);   
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
            'name'=>['required', 'string', 'nullable',Rule::unique('suppliers')->ignore($id),],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('suppliers')->ignore($id),],
            'profile_image'=>'image|nullable|max:1999',
            'nic_no'=>['required', 'string', 'nullable', 'max:255',Rule::unique('suppliers')->ignore($id),],
            'phone_no'=>['required', 'string', 'nullable', 'min:10','max:10',Rule::unique('suppliers')->ignore($id),],
            'address'=>'required|nullable',
        ]);

        if($request->hasFile('profile_image')){
            $filenameWithExt= $request->file('profile_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('profile_image')->storeAs('public/profile_images/Suppliers',$fileNameToStore);
        }
        $supplier = Supplier::find($id);
        $supplier->name=$request->input('name');
        $supplier->email=$request->input('email');
        $supplier->phone_no=$request->input('phone_no');
        $supplier->address=$request->input('address');
        $supplier->nic_no=$request->input('nic_no');
        if($request->hasFile('profile_image')){
            $supplier->profile_image=$fileNameToStore;
        }
        $supplier->save();
        return redirect('/suppliers')->with('success','Supplier Updated');
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
