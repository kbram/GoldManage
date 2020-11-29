<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
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
        $products= Product::orderBy('created_at','desc')->paginate(6);
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'product_image'=>'image|nullable|max:1999',
            'describtion'=>'required|nullable',
            'price'=>'required|nullable|numeric'
        ]);

        if($request->hasFile('product_image')){
            $filenameWithExt= $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
        }else{
            $fileNameToStore ='defaut.png';
        }
        $product = new Product;
        $product->name=$request->input('name');
        $product->describtion=$request->input('describtion');
        $product->price=$request->input('price');
        $product->product_image=$fileNameToStore;
        $product->available=0;
        $product->save();
        return redirect('/products')->with('success','Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        return view('products.edit')->with('product',$product);   
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
            'product_image'=>'image|nullable|max:1999',
            'describtion'=>'required|nullable',
            'price'=>'required|nullable|numeric'
        ]);

        if($request->hasFile('product_image')){
            $filenameWithExt= $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension= $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore=$filename."_".time().".".$extension;
            $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
        }
        $product = Product::find($id);
        $product->name=$request->input('name');
        $product->describtion=$request->input('describtion');
        $product->price=$request->input('price');
        if($request->hasFile('product_image')){
            $product->product_image=$fileNameToStore;
        }
        $product->save();
        return redirect('/products')->with('success','Product Updated');
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
