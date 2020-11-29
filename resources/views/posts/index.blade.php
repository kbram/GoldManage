@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br><br>
    <h1 align="center">Contact Info</h1><br>
    @if(count($posts)>=1)
        @foreach($posts as $post)
            <div class="card" style="width:100%;background-color:#D6DBDF;border-radius:25px;">
                <div class="row">
                    <div class="col-md-3 col-sm-3" style="padding-left:4%;padding-top:2%;padding-bottom:2%;">
                        <img  style="width:100%;height:100%;border-radius:25px;" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-9 col-sm-9" style="padding-right:5%;padding-bottom:2%;">
                        <br>
                        <h3>By :&nbsp; &nbsp; &nbsp;{{$post->title}}</h3>
                        <p>Written on {{$post->created_at}} From {{$post->email}}</p>
                        <div class="jumbotron" style="padding-top:2%;padding-bottom:0%;background-color:#222222;border-radius:25px;">
                            <label class="card-text" style="color:white ">{!!$post->body!!}</lable>
                        </div>
                        @if(!Auth::guest())
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
                            {!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method'=> 'POST','class'=>'pull-right']) !!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}  
                        @endif
                    </div>
                </div>  
            </div>
            <br>
            <br>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts Found</p>
    @endif
</div>
@endsection