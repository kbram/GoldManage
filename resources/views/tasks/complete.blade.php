 @extends('layouts.app')

@section('content')
 <div class="container"style="margin-top:-23px;">
    <br><br>
<div style="padding-left:20%;padding-right:20%">
    <div class="jumbotron" style="border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;">
        <div class="row">
           <h1 align="center"><strong>Complete Task</strong></h1>
        </div>
        <br>
    {!! Form::open(['action' => ['TasksController@updateComplete', $task->id], 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('wastage','Wastage')}}
            <div class="row">
                <div class="col-md-11 col-sm-11">
                    {{Form::text('wastage',$task->wastage,['class' => 'form-control','placeholder'=>'Wastage','style'=>'width:100%;'])}}
                </div>
                <div class="col-md-1 col-sm-1">
                    <h4><strong>g</strong></h4>
                </div>  
            </div>
        </div>
        <div class="form-group">
            {{Form::label('complete_date','Completed Date :')}}
            {{Form::date('complete_date', \Carbon\Carbon::now(),['class' => 'form-control','placeholder'=>'Complete date','style'=>'width:100%;'])}}
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-6">
               <a href="/dashboard" class="btn btn-info">Back</a>
            </div>
            <div class="col-md-6 col-sm-6" align="right">
                {{Form::hidden('_method','PUT')}}
                <div class="text-right">
                    {{Form::submit('Complete',['class'=>'btn btn-primary'])}}
                </div>
                
            </div>
        </div>
        
    </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection