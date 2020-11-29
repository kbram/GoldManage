<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Hash;
use App\User;
Use DB;

class UsersController extends Controller
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
        $users= User::all();
        return view('users.index')->with('users',$users);
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
        $user= User::find($id);
        if(auth()->user()->id !==$user->id && auth()->user()->id !==1){
            return redirect('/users')->with('error','Unauthorized Page');   
        }
        return view('users.edit')->with('user',$user);     
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
            'name'=>'required',
            'email' =>'required',
            'phone_no' =>'required',
        ]);

        if($request->hasFile('avatar')){
            $filenameWithExt= $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('avatar')->storeAs('public/profile_images',$fileNameToStore);
        }

        $user = User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->phone_no=$request->input('phone_no');
        if($request->hasFile('avatar')){
            $user->avatar=$fileNameToStore;
        }
        $user->save();
        return redirect('/users')->with('success','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(auth()->user()->id !==1){
            return redirect('/manage')->with('error','Unauthorized Page');   
        }
        /*if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }*/
        $user->delete();
        return redirect('/manage')->with('success','User Removed');
    }
    
}
