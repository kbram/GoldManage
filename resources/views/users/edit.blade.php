@extends('layouts.app')

@section('content')
<div style="padding-left:20%;padding-right:20%;margin-top:-23px;">
    <br><br>
    <div class="jumbotron" style="border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h1>Edit User</h1>
        </div>
        <div class="col-md6 col-sm-6" align="right">
            <a href="/manage" class="btn btn-primary">Go Back</a>
        </div>
    </div>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',$user->name,['class' => 'form-control','placeholder'=>'Name'])}}
        </div>
         <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::email('email', $user->email, [ 'class' => 'form-control','placeholder'=>'example@gmail.com'])}}
        </div> 
        <div class="form-group">
            {{Form::label('phone_no','Phone_no')}}
            {{Form::text('phone_no',$user->phone_no,['class' => 'form-control','placeholder'=>'Phone No'])}}
        </div>
        <div class="form-group">
            {{Form::file('avatar')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        <div class="text-right">
            {{Form::submit('Update',['class'=>'btn btn-success'])}}
        </div>
        <div class="text-left">
            <a href="/changePassword" class="btn btn-warning">Change Password</a>
        </div>
    {!! Form::close() !!}
</div>
</div>
@endsection