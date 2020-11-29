@extends('layouts.app')

@section('content')
 <div class="container"style="margin-top:-23px;">
    <br>   <br>
<div style="padding-left:10%;padding-right:10%">
    <div class="jumbotron " style="  border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;background-color:#D6DBDF;">
        <div id="pro">   
            <div class="row" align="center">
                <h1 style="color:#222222"><strong>{{$product->name}}</strong></h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-sm-6 " align="center">
                    <img style="width:80%;height:400px;" src="/storage/product_images/{{$product->product_image}}">
                </div>
                <div class="col-md-6 col-sm-6" >
                    <h4 ><strong>Available :   {{$product->available}}</strong></h4>
                    <h4><strong>Describtion :</strong></h4>
                    <div class="jumbotron" style="background-color:#222222;border-radius:25px;">
                        <label class="card-text" style="color:white ">{!!$product->describtion!!}</label>
                    </div>
                    <h1 style="color:#CB4335 ;"><strong><label style="text-transform: capitalize;">Rs.&nbsp;</label>{{$product->price}}</strong></h1>
                    <br>

                </div>
            </div>
        </div>
        @if(!Auth::guest())
                <div class="row">
                    <div class="col-md-4 col-xs-4" style="float: left;">
                        <a href="/products" class="btn btn-success btn-lg">Back</a>
                    </div>
                    <div class="col-md-4 col-xs-4" style="float: left;" align="center">
                        <a class="btn btn-default" type="button" onclick="printDiv('pro')" style="width:100;"><span class="fa fa-print"></span>&nbsp;Print</a>
                    </div>
                    <div class="col-md-4 col-xs-4" style="float: right;" align="right">
                        <a href="/products/{{$product->id}}/edit" class="btn btn-primary btn-lg">Edit</a>
                    </div>
                </div>
        @endif
    </div>
    </div>
</div>
@endsection