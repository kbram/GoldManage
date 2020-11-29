@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:-23px;">
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Dashboard</strong></div>
                <div class="panel-body ">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="onpro">   
                        <div class="row">
                            <div class="col-md-6 col-sm-6" align="left">
                                <h3><strong>On Processing Tasks</strong></h3>
                            </div>
                            <div class="col-md-6 col-sm-6" align="right">
                                <a href="/tasks/create" class="btn btn-warning">Create Task</a>
                            </div>
                        </div>
                        <br>
                        <div class=" table-responsive">
                        @if(count($tasks)>0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Task Id</th>
                                    <th>Employee Name</th>
                                    <th>Product Name</th>
                                    <th>Weight</th>
                                    <th>Received Date</th>
                                    <th>Quantity</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($tasks as $task)
                                    @if($task->complete==false)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td>{{$task->employee->name}}</td>
                                        <td>{{$task->product->name}}</td>
                                        <td>{{$task->gold_weight}}g</td>
                                        <td>{{$task->received_date}}</td>
                                        <td>{{$task->quantity}}</td>
                                        <td><a href="/complete/{{$task->id}}" class="btn btn-success btn-sm">Complete</a></td>
                                        <td><a href="/tasks/{{$task->id}}" class="btn btn-primary btn-sm">Details</a></td>
                                    
                                    </tr>
                                    @endif
                                @endforeach
                            </table>
                        @else
                            <p>You have No tasks</p>
                        @endif
                        </div>
                    </div>
                    <div class="" align="center">
                        <a class="btn btn-default" type="button" onclick="printDiv('onpro')" style="width:100;"><span class="fa fa-print"></span>&nbsp;Print</a>
                    </div>
                </div>
                <div class="panel-heading"></div>
                <div class="panel-body ">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="compro">   
                        <h3><strong>Completed Tasks</strong></h3>
                        <div class=" table-responsive">
                        @if(count($tasks)>0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Task Id</th>
                                    <th>Employee Name</th>
                                    <th>Product Name</th>
                                    <th>Final Weight</th>
                                    <th>Received Date</th>
                                    <th>Quantity</th>
                                    <th>Available</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>
                                @foreach($tasks as $task)
                                    @if($task->complete==true)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td>{{$task->employee->name}}</td>
                                        <td>{{$task->product->name}}</td>
                                        <td>{{$task->final_weight}}g</td>
                                        <td>{{$task->received_date}}</td>
                                        <td>{{$task->quantity}}</td>
                                        <td>{{$task->available}}</td>
                                        @if(empty($task->account->paid))
                                            <td><a href="/account/{{$task->id}}" class="btn btn-success btn-sm">UnPaid</a></td>
                                        @else
                                            <td align="center"><p>Paid</p></td>
                                        @endif
                                        @if($task->available>0)
                                            <td><a href="/delivery/{{$task->id}}" class="btn btn-danger btn-sm">sell</a></td>
                                        @else
                                            <td align="center"><p>Sold out</p></td>
                                        @endif
                                        <td><a href="/tasks/{{$task->id}}" class="btn btn-primary btn-sm">Details</a></td>
                                    </tr>
                                    @endif
                                @endforeach
                            </table>
                        @else
                            <p>You have No tasks</p>
                        @endif
                        </div>
                        <div class="" align="center">
                            <a class="btn btn-default" type="button" onclick="printDiv('compro')" style="width:100;"><span class="fa fa-print"></span>&nbsp;Print</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
