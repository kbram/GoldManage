@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:-23px;">
    <br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <h1 class="display-3">Dashboard</h1>
                <br>
                <p class="lead">This is your personal site </p>
                <hr class="my-4">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong>You are Already logged in!</strong>
                <p class="lead" align="right">
                    <a class="btn btn-primary btn-lg" href="/" role="button">OK</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
