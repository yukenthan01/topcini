@extends('back-end.template')
@section('title','Edit Category')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Edit category
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit category</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="card-title">Edit category - {{ $category->name }} </div>
            
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        {!! Form::model($category,['route' => ['category.update',$category->id], 'method' => 'post','files' => true]) !!}
                            @method('PUT') 
                            @foreach ($errors->all() as $error)
                                <div class="form-group row" style="color: red;font-size: 15px;text-align: center;">    
                                    {{ $error }}
                                </div>
                            @endforeach                          
                             @include('back-end.category.form')
                            <div class="">
                                <a class="btn btn-secondary" href="{{ route('category.index') }}"> <i class="ion-ios-arrow-thin-left"></i> Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div><!-- form-layout-footer -->
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@stop

