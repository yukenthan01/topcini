@extends('back-end.template')
@section('title','Edit User')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        Edit user
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit user</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="card-title">Edit user - {{ $user->name }}</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        {{Form::model($user,['route'=>['user.update',$user],'class'=>'user','method'=>'patch'])}}
                            @include('admin.user.form')
                            <div class="">
                                <a class="btn btn-default" href="{{ route('user.index') }}"> <i class="ion-ios-arrow-thin-left"></i> Back</a>
                                <button class="btn btn-primary">Update</button>
                            </div><!-- form-layout-footer -->
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div> 
@stop

