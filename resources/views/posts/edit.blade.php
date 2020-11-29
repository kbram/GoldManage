@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br><br>
    <div style="padding-left:20%;padding-right:20%">
        <div class="jumbotron" style=" border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;background-color:#D6DBDF;">
            <h1>Edit Post</h1>
            {!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',$post->title,['class' => 'form-control','placeholder'=>'Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::email('email',$post->email,['class' => 'form-control','placeholder'=>'example@gmail.com'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body','Mesage')}}
                    {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder'=>'Body Text'])}}
                </div>
                <div class="form-group">
                    {{Form::file('cover_image')}}
                </div>
                {{Form::hidden('_method','PUT')}}
                <div class="text-right">
                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                </div>
            {!! Form::close() !!}
        </div>    
    </div>    
</div>    
@endsection