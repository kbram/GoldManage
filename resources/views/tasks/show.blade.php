@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
<br><br>
<div style="padding-left:10%;padding-right:10%">
    <div class="jumbotron" style="height:100%;border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;">
        <div class="row" align="center">
            <h1 style="color:#222222"><strong>Task&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;{{$task->id}}</strong></h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-6" align="center">
                <img style="width:100%; " src="/storage/product_images/{{$task->product->product_image}}">
            </div>
            <div class="col-md-6 col-sm-6">
                <h2>{!!$task->product->name!!}</h2>
                <div class="jumbotron" align="center"style="border-style: solid;background-color:#222222;padding:0px;">
                    <h5 style="color:#fff;"><strong>Working on {{$task->quantity}} {{$task->product->name}}  by {{$task->employee->name}}</strong></h5>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6"><h4>Gold_weight</h4></div>
                    <div class="col-md-6 col-sm-6"><h4>:   {{$task->gold_weight}}g</h4></div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6"><h4>Received On</h4></div>
                    <div class="col-md-6 col-sm-6"><h4>:   {{$task->received_date}}</h4></div>
                </div>    
                @if($task->complete==true)
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><h4>Complete On </h4></div>
                        <div class="col-md-6 col-sm-6"><h4>:   {{$task->complete_date}}</h4></div>
                    </div>    
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><h4>Wastage</h4></div>
                        <div class="col-md-6 col-sm-6"><h4>:   {{$task->wastage}}g</h4></div>
                    </div>    
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><h4>Final Weight</h4></div>
                        <div class="col-md-6 col-sm-6"><h4>:   {{$task->final_weight}}g</h4></div>
                    </div>       
                @endif        
            </div>
            <br>
            <div class="row" align="center">
                @if(empty($task->account->paid))
                    <label class="container1" style="font-size: 30px;color:#EC7063">Paid
                        <span class="checkmark"></span>
                        <input type="checkbox" style="width:30px;height:30px; background-color: blue; " disabled>
                    </label>
                @else
                    <label class="container1" style="font-size: 30px;color:#EC7063">Paid :
                        <span class="checkmark" ></span>
                        <input type="checkbox" checked="checked" style="width:30px;height:30px; background-color: blue; " disabled>
                    </label>
                @endif
            </div>
        </div>
       <br>
        @if(!Auth::guest())
            @if(Auth::User()->id==$task->user_id)
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <a href="/dashboard" class="btn btn-success">Back</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a href="/tasks/{{$task->id}}/edit" class="btn btn-warning">Edit</a>
                    </div>
                    <div class="col-md-2 col-sm-2" align="right">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Remove
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel"><strong>Conformation</strong></h3>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Do you want to Remove this task ???</strong>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-10 col-sm-10" >
                            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            {!! Form::open(['action' => ['TasksController@destroy',$task->id], 'method'=> 'POST','class'=>'pull-right']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Remove',['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}  
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                
            @endif
        @endif
    </div>
    </div>
</div>
@endsection