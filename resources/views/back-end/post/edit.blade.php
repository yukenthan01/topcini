@extends('back-end.template')
@section('title','Edit Post')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Edit Post
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Post</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-8">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="card-title">Edit Post - {{ $post->title }} </div>
           
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        {!! Form::model($post,['route' => ['post.update',$post->id], 'method' => 'post','files' => true]) !!}
                            @method('PUT') 
                            @foreach ($errors->all() as $error)
                                <div class="form-group row" style="color: red;font-size: 15px;text-align: center;">    
                                    {{ $error }}
                                </div>
                            @endforeach                          
                             @include('back-end.post.form')
                           
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="card-title">Edit category - {{ $post->title }} </div>
            
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">                     
                            @include('back-end.post.category')
                            <div class="float-right">
                                <div style="margin-bottom: 10%;">
                                        <a class="btn btn-secondary" href="{{ route('post.index') }}"> <i class="ion-ios-arrow-thin-left"></i> Back</a>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div><!-- form-layout-footer -->
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

