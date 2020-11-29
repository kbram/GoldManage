@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
<br>
<br>
<div style="padding-left:20%;padding-right:20%">
    <div class="jumbotron" style="border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;" >
        <h1 align="center"><strong>Paid Salary</strong></h1>
        <br>
        {!! Form::open(['action' => ['AccountsController@storeacc', $id] , 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('salary','Salary')}}
                <div class="row">
                    <div class="col-md-11 col-sm-11">
                        {{Form::text('salary','',['class' => 'form-control','placeholder'=>'Salary','style'=>'width:100%;'])}}
                    </div>
                    <div class="col-md-1 col-sm-1">
                        <h4><strong>Rs</strong></h4>
                    </div>  
                </div>
            </div>
            <div class="form-group">
                {{Form::label('paid_date','Give Date :')}}
                {{Form::date('paid_date', \Carbon\Carbon::now(),['class' => 'form-control','placeholder'=>'paid_date','style'=>'width:100%;'])}}
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <a href="/dashboard" class="btn btn-success">Back</a>
                </div>
                <div class="col-md-6 col-sm-6" align="right">
                    {{Form::hidden('_method','PUT')}}
                    <div class="text-right">
                        {{Form::submit('Paid',['class'=>'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection