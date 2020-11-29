<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
        }
        .card:hover {
        box-shadow: 0 20px 40px 0 rgba(0,0,0,0.2);
        }
        .cardj{
            box-shadow: 0 20px 40px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .cardj:hover {
        box-shadow: 0 35px 60px 0 rgba(0,0,0,0.2);
        }
        img.blur {
            -webkit-filter: blur(4px);
            filter: blur(4px);
            filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
        }    
        .pagination > .active > a,{
            color:#5DADE2;
        }
    
    </style>

</head>
<body style="background-color:#fff ;">
<div class="container" style="padding-top:3%">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-4" >
            <div class="panel panel-default" style="border-color:#6498BB;border-radius:35px;box-shadow: 0 50px 100px 0 rgba(0,0,0,0.7);">
                <div class="panel-heading text-center" style="border-color:#6498BB;background-color:#6498BB ;border-top-left-radius:25px;border-top-right-radius:25px;padding:5%;"><h1 style="color:#fff;font-size:50px;">Login</h1></div>
                
                <div class="panel-body" style="border-color:#6498BB;padding-top:8%;padding-right:7%;padding-left:7%; background-color:#6498BB;border-bottom-left-radius:25px;border-bottom-right-radius:25px;">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-8 col-md-offset-2" >
                                <strong ><input id="email" type="email" style="border-radius:20px;" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail"  required autofocus></strong>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">                
                            <div class="col-md-8 col-md-offset-2">
                                <input id="password" type="password" style="border-radius:20px;" class="form-control" name="password" required autofocus placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2" align="right">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><strong  style="color:#fff"> Remember Me</strong>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1" align="center">
                                <button type="submit" class="btn btn-primary btn-lg"  style="background-color:#222222;border-radius:25px;width:70%;">
                                    <strong>Login<strong>
                                </button> 
                             </div>
                        </div>
                        <div class="form-group" align="center">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                 Forgot Your Password?
                            </a>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3" align="center">
                                <a href="/"  class="btn btn-danger btn-lg" style="border-radius:25px;width:70%;"><strong>Back<strong></a>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
   
