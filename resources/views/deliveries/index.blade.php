@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div id="dele">
                    <div class="panel-heading"><h2><strong>Delivery Details For Suppliers</strong></h2></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div> 
                        @endif
                        @if(count($deliveries)>=1)
                        <div class=" table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Delivery No</th>
                                    <th>Supplier Name</th>
                                    <th>Task ID</th>
                                    <th>Product Name</th>
                                    <th>Product Counts</th>
                                    <th>Amount</th>
                                    <th>Dealing For</th>
                                    <th>Delivery Date</th>
                                    <th></th>
                                </tr>      
                                @foreach($deliveries as $delivery)
                                    <tr>
                                        <td>{{$delivery->id}}</td>
                                        <td>{{$delivery->Supplier->name}}</td>
                                        @foreach($tasks as $task)
                                            @if($task->id==$delivery->task_id)
                                                <td>{{$task->id}}</td>
                                                <td>{{$task->product->name}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$delivery->count}}</td>
                                        <td>{{$delivery->amount}}</td>
                                        @foreach($users as $user)
                                            @if($user->id==$delivery->user_id)
                                                <td>{{$user->name}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$delivery->delivery_date}}</td>
                                        <td>
                                        @if(Auth::User()->id==$delivery->user_id)
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Remove
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel"><strong>Administration Confirmation</strong></h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Do you get that Things & Add store ???
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-md-10 col-sm-10" >
                                                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                    {!! Form::open(['action' => ['DeliveriesController@destroy',$delivery->id], 'method'=> 'POST','class'=>'pull-right']) !!}
                                                            {{Form::hidden('_method','DELETE')}}
                                                            {{Form::submit('Change',['class'=>'btn btn-danger'])}}
                                                    {!! Form::close() !!}  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>No users Found</p>
                        @endif
                    </div>
                </div>
                <a class="btn btn-default" type="button" onclick="printDiv('dele')" style="width:100;"><span class="fa fa-print"></span>&nbsp;Print</a>
            </div>
        </div>
    </div>
</div>
@endsection