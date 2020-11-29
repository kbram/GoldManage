@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br><br>
    <div class="row">
        <div class="col-md-6 col-sm-6" align="left">
            <h1><strong>Suppliers<strong></h1>
        </div>
        <div class="col-md-6 col-sm-6" align="right">
            <a href="/suppliers/create" class="btn btn-success">Add Supplier</a>
        </div>
    </div>
    <br>
    <?php $pos=0 ?>
    @if(count($suppliers)>=1)
        <div class="row">
            @foreach($suppliers as $supplier)
                @if($pos%4==0)
                    </div>
                    <br>
                    <div class="row">
                @endif
                    <div class="col-md-3 col-sm-3"  align="center">
                        <div class="card" style="width:20rem;height:100%; background-color:#2C3E50 ;">
                            <img src="/storage/profile_images/Suppliers/{{$supplier->profile_image}}" class="card-img-top" style="width:20rem;height:20rem" alt="...">
                            <br>
                            <br>
                            <h3 class="card-title" style="height:3rem;color:#fff;"><strong>{{$supplier->name}}</strong></h3>
                            <div class="card-body" style="padding:10%;" align="center">
                                <a href="/suppliers/{{$supplier->id}}"  class="btn btn-default"><strong style="font-size: 20px; color:#2C3E50;">Detail</strong></a>
                            </div>
                        </div>
                    </div>
                <?php $pos++ ?>
            @endforeach
        </div>
        <br>
        <div class="row" align="center">
            {{$suppliers->links()}}
        </div>
    @else
        <h1>No Employee Found</h1>
    @endif
</div>  
@endsection