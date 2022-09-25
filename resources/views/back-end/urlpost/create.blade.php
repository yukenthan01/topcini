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
    <form action="{{ route('getcurlpost') }}" method="POST">
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
                         {!!Form::text('getposturl','true',['class' =>'form-control','hidden'=>true])!!}
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
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    // $(document).on('click', '#btn_save', function(e) {
    $(document).ready(function () {
        // e.preventDefault();
        $('#tamildhool_code link').each(function(i)
        {
            $(this).attr('href',''); // This is your rel value

        });
        $('#tamildhool_code > script').each(function(i)
        {
            $(this).attr('script','');
            $(this).remove();
            

        });
        // console.log($('#tamildhool_code').html());
        // var url = $('iframe').attr('data-lazy-src');
        var url = $('.entry-content > div:eq(1)').find('iframe').attr('src');
        var title = $('.entry-title').text();
        var remove_title = title.replace(' Serial','');
        $('#title').val(remove_title);
        $('#content').val(url);
        
        var new_url = $('.entry-content').find('iframe').attr('src');
        $('#content').val(new_url);
        
        // console.log($('#tamildhool_code').find('script').html());
        
        if(url == null){
            // var youtubeurl = $('.rll-youtube-player').attr('data-src');
            
            // alert();
            // $('#content').val(youtubeurl);
        }
        // if(url == null){
        // if(typeof(url)  === "undefined"){
        //     var tamildoll_url = $('.thecontent').find('iframe').attr('data-src');

        //     // 
        //     // if (tamildoll_url.contains('https:')) {
        //     if (tamildoll_url.indexOf('https:') >= 0) {
        //       //true statement, do whatever
        //     //   alert('sdsd');
        //       $('#content').val(tamildoll_url);
        //     } else {
        //       //false statement..do whatever
        //       $('#content').val('https:'+tamildoll_url);
        //     //   alert('eses');
        //     }

        // }
        
        // var new1 = $('.entry-content > div:eq(1)').find('iframe').attr('src');
        // $('.mgbox').remove();
        setTimeout(
          function() 
          {
            $('#rc2css').attr('href','');
            $('#rc2js').attr('src','');
            $('[referrerpolicy]').attr('src','');
            $('[referrerpolicy]').attr('src','');
            $('#rc2js_beacon_adscore').attr('src','');
            
            $('.mgbox').empty();
            $('.DhjyE').empty();
            
          }, 5000);
        
    });
</script>
@endpush
@stop

