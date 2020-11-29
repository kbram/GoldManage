@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6" align="left">
            <h1><strong>Products<strong></h1>
        </div>
        <div class="col-md-6 col-sm-6" align="right">
            <a href="/products/create" class="btn btn-success">Create New</a>
        </div>
    </div>
    <br>
    <?php $pos=0 ?>
    @if(count($products)>=1)
        <div class="row">
            @foreach($products as $product)
                @if($pos%3==0)
                    </div>
                    <br>
                    <div class="row">
                @endif
                    <div class="col-md-4 col-sm-4"  align="center">
                        <div class="card" style="width: 100%;background-color:#D6DBDF;">
                            <img src="/storage/product_images/{{$product->product_image}}" class="card-img-top" style="width: 100%;height:30rem" alt="...">
                            <h3 class="card-title"><strong>{{$product->name}}</strong></h3>
                            <div class="card-body" style="padding:10%;" align="left">
                                <label class="card-text">{!!$product->describtion!!}</label>
                               
                                <h4>Available :{{$product->available}}</h4>
                                <div align="right">
                                <a href="/products/{{$product->id}}"  class="btn btn-primary "><strong>Details</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $pos++ ?>
            @endforeach
        </div>
        <br>
        <div class="row" align="center">
            {{$products->links()}}
        </div>
    @else
        <h1>No Products Found</h1>
    @endif
</div>  
@endsection