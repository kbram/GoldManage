<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post; 
Use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
        $this->middleware('auth',['except'=>['store']]);
    }
    public function index()
    {
        $posts= Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about');
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
            'name'=>'required|nullable',
            'email'=>'required|email|nullable',
            'body' =>'required|nullable',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get File name with the extension
            $filenameWithExt= $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            //Get just ext
            $extension= $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename."_".time().".".$extension;
            //Upload Image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';
        }
        $post = new Post;
        $post->title=$request->input('name');
        $post->email=$request->input('email');
        $post->body=$request->input('body');
        $post->cover_image=$fileNameToStore;
        $post->save();
        return redirect('/about')->with('success','Your Message is Received');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post= Post::find($id);
       return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        return view('posts.edit')->with('post',$post);     
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
            'name'=>'required|nullable',
            'email'=>'required|email|nullable',
            'body' =>'required|nullable',
            'cover_image'=>'image|nullable|max:1999'
        ]);

         if($request->hasFile('cover_image')){
            $filenameWithExt= $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        $post = Post::find($id);
        $post->title=$request->input('name');
        $post->email=$request->input('email');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image=$fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !==1){
            return redirect('/posts')->with('error','Unauthorized Page');   
        }
        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Removed');
    }
}
