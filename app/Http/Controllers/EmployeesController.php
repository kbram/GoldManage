<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Employee;

class EmployeesController extends Controller
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
        $employees= Employee::orderBy('created_at','desc')->paginate(12);
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'name'=>'required|nullable|unique:employees',
            'email' => 'required|email|max:255|unique:employees',
            'profile_image'=>'image|nullable|max:1999',
            'nic_no'=>'required|nullable|unique:employees',
            'phone_no'=>'required|nullable|unique:employees|min:10|max:10',
            'address'=>'required|nullable',
            
        ]);

        if($request->hasFile('profile_image')){
            $filenameWithExt= $request->file('profile_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('profile_image')->storeAs('public/profile_images/Employees',$fileNameToStore);
        }else{
            $fileNameToStore ='default.jpg';
        }
        $employee = new Employee;
        $employee->name=$request->input('name');
        $employee->email=$request->input('email');
        $employee->phone_no=$request->input('phone_no');
        $employee->address=$request->input('address');
        $employee->profile_image=$fileNameToStore;
        $employee->nic_no=$request->input('nic_no');
        $employee->save();
        return redirect('/employees')->with('success','Employee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee= Employee::find($id);
        return view('employees.show')->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee= Employee::find($id);
        return view('employees.edit')->with('employee',$employee);   
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
            'name'=>['required', 'string', 'nullable',Rule::unique('employees')->ignore($id),],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('employees')->ignore($id),],
            'profile_image'=>'image|nullable|max:1999',
            'nic_no'=>['required', 'string', 'nullable', 'max:255',Rule::unique('employees')->ignore($id),],
            'phone_no'=>['required', 'string', 'nullable', 'min:10','max:10',Rule::unique('employees')->ignore($id),],
            'address'=>'required|nullable',
        ]);

        if($request->hasFile('profile_image')){
            $filenameWithExt= $request->file('profile_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('profile_image')->storeAs('public/profile_images/Employees',$fileNameToStore);
        }
        $employee = Employee::find($id);
        $employee->name=$request->input('name');
        $employee->email=$request->input('email');
        $employee->phone_no=$request->input('phone_no');
        $employee->address=$request->input('address');
        $employee->nic_no=$request->input('nic_no');
        if($request->hasFile('profile_image')){
            $employee->profile_image=$fileNameToStore;
        }
        $employee->save();
        return redirect('/employees')->with('success','Employee Updated');
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
