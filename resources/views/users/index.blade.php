@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Manage</strong></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 col-sm-6" align="left">
                            <h2>Users</h2>
                        </div>
                        <div class="col-md-6 col-sm-6" align="right">
                            @if(Auth::User()->id==1)
                                <a href="/register" class="btn btn-success">Create User</a>
                            @endif
                        </div>
                    </div>


                    @if(count($users)>=1)
                        <table class="table table-striped">
                            <tr>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th></th>
                                 @if(Auth::User()->id==1)
                                    <th></th>
                                @endif
                            </tr>      
                            @foreach($users as $user)
                                <tr>
                                    <td><img src="storage/profile_images/{{$user->avatar}}" style="width:100px; height:100px;float:left;boarder-radius:50%;"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_no}}</td>
                                    <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    @if(Auth::User()->id==1 && $user->id!==1)
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Remove
                                            </button>
                                        </td>
                                        
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
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
                                        Do you Want to Remove this user ???
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-10 col-sm-10" >
                                            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                                {!! Form::open(['action' => ['UsersController@destroy',$user->id], 'method'=> 'POST','class'=>'pull-right']) !!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
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
        </div>
    </div>
</div>
@endsection