@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br><br>
    <div style="padding-left:5%;padding-right:5%">
        <div class="jumbotron " style=" border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;">
            <div id="profile">   
                <div class="row" align="center">
                    <h2 style="color:#222222"><strong>{{$employee->name}}</strong></h2>
                </div>
                <br>
                <div class="row" >
                    <div class="col-md-4 col-sm-4 " align="center">
                        <img style="border-radius:25px;border-style:groove;border-width:9px;border-color:#85929E ;width:80%;height:100%" src="/storage/profile_images/Employees/{{$employee->profile_image}}">
                    </div>
                    <div class="col-md-0 col-sm-2 " align="center">
                        <br>
                        <br>
                    </div>
                    <div class="col-md-8 col-sm-6" >
                        <div class="row">
                            <div class="col-md-1 col-sm-1" style="float: left;">
                                <i class="fa fa-id-card" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-4 col-sm-5 " style="float: left;">
                                <label ><strong>NIC No  </strong></label>
                            </div>
                            <div class="col-md-7 col-sm-6 " style="float: left;">
                                <label>: {{$employee->nic_no}}<label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 col-sm-1" style="float: left;">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-4 col-sm-5 " style="float: left;">
                                <label ><strong>Phone No </strong></label>
                            </div>
                            <div class="col-md-7 col-sm-6 "style="float: left;">
                               <label>: {{$employee->phone_no}}<label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 col-sm-1" style="float: left;">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-4 col-sm-5 " style="float: left;">
                                <label><strong>Email </strong></label>
                            </div>
                            <div class="col-md-7 col-sm-6 "style="float: left;">
                                <label>: {{$employee->email}}<label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 col-sm-1" style="float: left;">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-4 col-sm-5 " style="float: left;">
                                <label><strong>Address </strong></label>
                            </div>
                            <div class="col-md-7 col-sm-6 " style="float: left;">
                                 <label>: {{$employee->address}}<label>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <br>
            </div>
            @if(!Auth::guest())
                <div class="row">
                    <div class="col-md-4 col-xs-4" style="float: left;">
                        <a href="/employees" class="btn btn-success btn-lg">Back</a>
                    </div>
                    <div class="col-md-4 col-xs-4" style="float: left;" align="center">
                        <a class="btn btn-default" type="button" onclick="printDiv('profile')" style="width:100;"><span class="fa fa-print"></span>&nbsp;Print</a>
                    </div>
                    <div class="col-md-4 col-xs-4" style="float: right;" align="right">
                         
                        <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary btn-lg">Edit</a>
                    </div>
                </div>
            @endif
        </div>
       
    </div>
</div>
@endsection