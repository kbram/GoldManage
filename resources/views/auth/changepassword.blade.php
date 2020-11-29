@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-12" align="center">
                <div class=" jumbotron" style="width:80%;border-width: 9px;border-radius:25px;border-style:groove;border-color:#5D6D7E;">
                    <div class="card-header"><H1 align="left"><strong>Change password</strong></H1><br></div>

                    <div class="card-body" >
                       
                        <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">Current Password</label>

                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">New Password</label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                <div class="col-md-6">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="new-b" class="col-md-4 control-label"></label>

                                <div class="col-md-3" align="left">
                                    <a href="/manage"  class="btn btn-success">Go Back</a>
                                </div>
                                <div class="col-md-3" align="right">
                                    <button type="submit" class="btn btn-primary" >
                                        Change Password
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection