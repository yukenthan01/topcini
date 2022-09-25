@extends('back-end.template')
@section('title','New Permissions')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        New Permissions
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Permissions</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Permissions</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="card-title">New permissions</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                            {{Form::open(['route'=>['permission.store'],'class'=>'permission'])}}
                            @include('admin.permission.form')
                            <div class="">
                                <a class="btn btn-secondary" href="{{ route('permission.index') }}"> <i class="ion-ios-arrow-thin-left"></i> Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div><!-- form-layout-footer -->
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

