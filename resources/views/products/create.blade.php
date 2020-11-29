@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br>
    <br>
<div style="padding-left:10%;padding-right:10%">
    <div class="jumbotron" style="border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;background-color:#D6DBDF;">
    <h1>Create Products</h1>
    {!! Form::open(['action' => 'ProductsController@store', 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name','Product Name')}}
            {{Form::text('name','',['class' => 'form-control','placeholder'=>'Product Name'])}}
        </div>
         <div class="form-group">
            {{Form::label('describtion','Product Describtion')}} 
            {{Form::textarea('describtion', '', ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder'=>'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('price','Price')}}
            {{Form::number('price','',['class' => 'form-control','placeholder'=>'Price'])}}
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
                {{Form::submit('Add',['class'=>'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}
    </div>
</div>
</div>
@endsection