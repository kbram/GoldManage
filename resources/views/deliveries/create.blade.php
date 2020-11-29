@extends('layouts.app')

@section('content')
<div class="container">
<br>
<div style="padding-left:15%;padding-right:15%">
    <div class="jumbotron" style="border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;">
        <h1><strong>Products Delivery</strong></h1>
        <br>
        {!! Form::open(['action' => ['DeliveriesController@storedel', $id] , 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('supplier_name','Supplier Name :')}}
                {{Form::select('supplier_name',$suppliers,null,['class' => 'form-control','placeholder'=>'Employee Name'])}}
            </div>
            <div>
                <label>Product Name :</label>
                <p> &nbsp &nbsp &nbsp{{$task->product->name}}</p>
            </div>
            <div class="form-group">
                {{Form::label('amount','Amount')}}
                <div class="row">
                    <div class="col-md-11 col-sm-11">
                        {{Form::text('amount','',['class' => 'form-control','placeholder'=>'Amont','style'=>'width:100%;'])}}
                    </div>
                    <div class="col-md-1 col-sm-1">
                        <h4><strong>Rs</strong></h4>
                    </div>  
                </div>
            </div>
            <div class="form-group">
                {{Form::label('count','Count :')}}
                {{Form::number('count','',['class' => 'form-control','placeholder'=>'Count'])}}
            </div>
            <div class="form-group">
                {{Form::label('delivery_date','Give Date :')}}
                {{Form::date('delivery_date', \Carbon\Carbon::now(),['class' => 'form-control','placeholder'=>'delivery_date','style'=>'width:100%;'])}}
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <a href="/dashboard" class="btn btn-success">Back</a>
                </div>
                <div class="col-md-6 col-sm-6" align="right" >
                    <button type="button" class="btn btn-danger" align="right" data-toggle="modal" data-target="#exampleModal">
                        Check Out
                    </button>
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" align="Left" id="exampleModalLabel"><strong>Conformation</strong></h3>
                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" align="Left">
                                    <strong>Do you want to check out ???</strong>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-9 col-sm-9" >
                                        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        {{Form::hidden('_method','PUT')}}
                                        <div class="text-right">
                                            {{Form::submit('Check Out',['class'=>'btn btn-primary'])}}
                                        </div>
                                    </div>
                                </div>          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection