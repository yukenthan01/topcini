@extends('back-end.template')
@section('title','Change Password')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        Password
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.index') }}">User</a></li>
        <li class="breadcrumb-item active">
            <strong>Create</strong>
        </li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="card-title">Change Password</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        <div class="ibox-content">
                                {{Form::model($user,['route'=>'password.update'])}}
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Old Password</label>
                                                <input id="name" type="password" class="form-control" name="old_password" required autofocus>
        
                                                @if ($errors->has('old_password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('old_password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name" class="control-label">New Password</label>
                                                <input id="name" type="password" class="form-control" name="password" required autofocus>
        
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Confirm Password</label>
                                                <input id="name" type="password" class="form-control" name="password_confirmation" required autofocus>
        
                                                @if ($errors->has('password_con
                                                firmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
        
                                    </div>
        
                                <div class="">
                                    <a class="btn btn-default" href="{{ url('/') }}"> <i class="ion-ios-arrow-thin-left"></i> Back</a>
                                    <button class="btn btn-primary">Reset</button>
                                </div><!-- form-layout-footer -->
                            {{Form::close()}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>























   
@stop
