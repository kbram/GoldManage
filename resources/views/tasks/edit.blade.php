 @extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
<br><br>
<div style="padding-left:20%;padding-right:20%">
    <div class="jumbotron" style="border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;">
        <h1><strong>Edit Tasks</strong></h1>
        <br>
    {!! Form::open(['action' => ['TasksController@update', $task->id], 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('employee_name','Employee Name :')}}
            {{Form::select('employee_name', $employees,null,['class' => 'form-control','selected'=>$task->employee->name])}}
        </div>
        <div class="form-group">
            {{Form::label('product_name','Product Name :')}}
            {{Form::select('product_name',$products,null,['class' => 'form-control','selected'=>$task->product->name])}}
        </div>
         <div class="form-group">
            {{Form::label('quantity','Quantity :')}}
            {{Form::number('quantity',$task->quantity,['class' => 'form-control','placeholder'=>'quantity'])}}
        </div>
        <div class="form-group">
            {{Form::label('gold_weight','Gold Weight')}}
            <div class="row">
                <div class="col-md-11 col-sm-11">
                    {{Form::text('gold_weight',$task->gold_weight,['class' => 'form-control','placeholder'=>'Gold Weight','style'=>'width:100%;'])}}
                </div>
                <div class="col-md-1 col-sm-1">
                    <h4><strong>g</strong></h4>
                </div>  
            </div>
        </div>
        <div class="form-group">
            {{Form::label('received_date','Give Date :')}}
            {{Form::date('received_date', $task->received_date,['class' => 'form-control','placeholder'=>'Gold Weight','style'=>'width:100%;'])}}
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <a href="/tasks/{{$task->id}}" class="btn btn-success">Back</a>
            </div>
            <div class="col-md-6 col-sm-6" align="right">
                {{Form::hidden('_method','PUT')}}
                <div class="text-right">
                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                </div>
            </div>
        </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection