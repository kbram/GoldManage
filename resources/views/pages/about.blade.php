@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br>
    <div class="row" style="padding:1%"> 
        <div class="col-md-6 col-sm-6">
            <a href="/"><img class="logo" style="width:100%;" src="/storage/admin/logo2.png" alt="Construction"></a>
        </div>
        <div class="col-md-6 col-sm-6">
            <a href="/"><img class="logo" style="width:100%;" src="/storage/admin/Banner1.png" alt="Construction"></a>
        </div>
    </div>
    <div class="row" style="padding-right:10%;padding-left:10%">
        <p style="font-size:20px;">
            We are enlarging and improving our website to bring you the same fine quality over the web that you receive in-store! Stop back frequently over the next few weeks to check out what’s new as we wrap up our website facelift and bring you a website experience like no other!
        </p>
    </div>
    
</div>

<div id="go" class="row" style="padding:5%"> 
    
    <h1 align="center">Contact Us</h1>
    <div class="col-md-6 col-sm-6">
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36703.724189465225!2d80.02539845052115!3d9.680538183674742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afe543b00585a09%3A0x23d8090989865331!2sKalviyankadu!5e0!3m2!1sen!2slk!4v1574855030637!5m2!1sen!2slk" width="100%" height="450" frameborder="0" style="border-width: 4px;border-radius:25px;border-style:groove;" allowfullscreen=""></iframe>
    </div>
    <div class="col-md-6 col-sm-6">
        
        {!! Form::open(['action' => 'PostsController@store', 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name','',['class' => 'form-control','placeholder'=>'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('email','email')}}
                {{Form::email('email','',['class' => 'form-control','placeholder'=>'example@gmail.com'])}}
            </div>
            <div class="form-group">
                {{Form::label('body','Mesage')}} 
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder'=>'Message'])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            <div class="text-right">
                {{Form::submit('Send',['class'=>'btn btn-primary'])}}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

