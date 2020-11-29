@extends('layouts.app')

@section('content')
 <div class="container"style="margin-top:-23px;">
    <br>    <br>
<div style="padding-left:20%;padding-right:20%">
    <div class="jumbotron" style=" border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;background-color:#D6DBDF;">
    <h1>Edit Product</h1>
    {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name','Product Name')}}
            {{Form::text('name',$product->name,['class' => 'form-control','placeholder'=>'Product Name'])}}
        </div>
         <div class="form-group">
            {{Form::label('describtion','Product Describtion')}} 
            {{Form::textarea('describtion', $product->describtion, ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder'=>'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('price','Price')}}
            {{Form::number('price',$product->prce,['class' => 'form-control','placeholder'=>'Price'])}}
        </div>
        <div class="form-group">
            {{Form::file('product_image')}}
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <a href="/products" class="btn btn-success">Go Back</a>
            </div>
            <div class="col-md6 col-sm-6" align="right">
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Update',['class'=>'btn btn-primary'])}}
            </div>
        </div>
        
    {!! Form::close() !!}
    </div>
</div>
</div>
@endsection