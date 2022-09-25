@extends('back-end.template')
@section('title','New Post')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        New Post
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Post</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Post</li>
        </ol>
    </nav>
    </div>
    <form action="{{ route('postyoutube') }}" method="POST">
    @csrf
    <div class="form-group">
        {!!Form::label('url', 'URL')!!}
        {!!Form::text('url',null,['class' =>'form-control'])!!}
        
        <button class="btn btn-primary">Get</button>
    </div>
     </form>
    {{Form::open(['route'=>['post.store'],'class'=>'post','files' => true])}}
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default card-demo" >
                <div class="card-header">
                    <div class="card-title">New Post</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">

                        @if (count($errors) > 0)

                            @foreach ($errors->all() as $error)
                                <div class="form-group row" style="color: red;font-size: 15px;text-align: center;">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                         {!!Form::text('getyoutube','true',['class' =>'form-control','hidden'=>true])!!}
                        @include('back-end.post.form')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-default card-demo" >
                <div class="card-header">
                    <div class="card-title">Category </div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">

                        @include('back-end.post.category')

                        <div class="float-right">
                            <div style="margin-bottom: 10%;">
                                <a class="btn btn-secondary" href="{{ route('post.index') }}"> <i class="ion-ios-arrow-thin-left"></i> Back</a>
                                <button class="btn btn-primary">Publish</button>
                            </div>
                        </div><!-- form-layout-footer -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{ Form::close() }}
    <div id="tamildhool_code" hidden>
        @php
            if (isset($response)) {
                
                echo html_entity_decode($response);
            }
        @endphp
    </div>

@push('script')

@endpush
@stop

