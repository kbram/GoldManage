@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br><br>
<div style="padding-left:20%;padding-right:20%">
    <div class="jumbotron" style="border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;" >
    <h1>Edit Employee</h1>
    {!! Form::open(['action' => ['SuppliersController@update', $supplier->id], 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
         <div class="form-group">
            {{Form::label('nic_no','NIC No')}}
            {{Form::text('nic_no',$supplier->nic_no,['class' => 'form-control','placeholder'=>'NIC NO'])}}
        </div>
         <div class="form-group">
            {{Form::label('name','Supplier Name')}}
            {{Form::text('name',$supplier->name,['class' => 'form-control','placeholder'=>'Supplier Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone_no','Phone No')}}
            {{Form::text('phone_no',$supplier->phone_no,['class' => 'form-control','placeholder'=>'Phone No'])}}
        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::email('email',$supplier->email,['class' => 'form-control','placeholder'=>'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('address','Address')}} 
            {{Form::textarea('address',$supplier->address, ['class' => 'form-control','placeholder'=>'Address'])}}
        </div>
        <div class="form-group">
            {{Form::file('profile_image')}}
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <a href="/suppliers" class="btn btn-success">Go Back</a>
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