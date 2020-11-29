@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br>
    <br>
    <div class="row" >
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default" >
                <div id="acc">
                    <div class="panel-heading"><h2><strong>Accounts For Employees</strong></h2></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($accounts)>=1)
                        <div class=" table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Account No</th>
                                    <th>Task ID</th>
                                    <th>Employee Name</th>
                                    <th>Product Name</th>
                                    <th>Product Counts</th>
                                    <th>Salary</th>
                                    <th>Paid For</th>
                                    <th>Paid Date</th>
                                    <th></th>
                                </tr>      
                                @foreach($accounts as $account)
                                    <tr>
                                        <td>{{$account->id}}</td>
                                        @foreach($tasks as $task)
                                            @if($task->id==$account->task_id)
                                                <td>{{$task->id}}</td>
                                                <td>{{$task->employee->name}}</td>
                                                <td>{{$task->product->name}}</td>
                                                <td>{{$task->quantity}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$account->salary}}</td>
                                        @foreach($users as $user)
                                            @if($user->id==$account->user_id)
                                                <td>{{$user->name}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$account->paid_date}}</td>
                                        <td>
                                        @if(Auth::User()->id==$account->user_id)
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
                                            Do you Want to Remove and Change Un Paid ???
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-md-10 col-sm-10" >
                                                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                    {!! Form::open(['action' => ['AccountsController@destroy',$account->id], 'method'=> 'POST','class'=>'pull-right']) !!}
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
                <a class="btn btn-default" type="button" onclick="printDiv('acc')" style="width:100;"><span class="fa fa-print"></span>&nbsp;Print</a>
            </div>  
        </div>
    </div>
</div>
@endsection