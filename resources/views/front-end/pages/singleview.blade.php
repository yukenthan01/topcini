
@extends('front-end.template')
@section('meta')
  <meta property="og:title" content="{{ $singleview->title }}" />
  <meta property="og:description" content="{{ $singleview->title }}" />
  <meta property="og:url" content="{{ route('singleserial',['cat' =>$singleview->category->parent->slug,'drama' =>$singleview->category->slug,'postdrama'=>$singleview->slug]) }}" />
  <meta property="og:site_name" content="Topcini" />
  <meta property="og:image" content="{{Request::root()}}/category_image/{{ $singleview->category->image }}" />
  <meta property="og:image:secure_url" content="{{Request::root()}}/category_image/{{ $singleview->category->image }}" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image:alt" content="{{ $singleview->title }}" />
  <meta property="og:type" content="article" />
<meta property="fb:app_id" content="159634261390079" />
  <meta name="twitter:card" content="{{ $singleview->title }}" />
  <meta name="twitter:description" content="{{ $singleview->title }}" />
  <meta name="twitter:title" content="{{ $singleview->title }}"/>
  <meta property="twitter:image" content="{{Request::root()}}/category_image/{{ $singleview->category->image }}" />
  <meta property="twitter:image:alt" content="{{ $singleview->title }}" />
@endsection
@section('content')
@php
  $url = Request::root();
@endphp
<nav aria-label="breadcrumb" class="">
  <div class="container">
     
      <ul class="nav nav-tabs mb-2" role="tablist" >
          <li class="nav-item">
              <a class="nav-link active" id="featured-products-tab" href="{{ route('category',$singleview->category->parent->slug) }}" style="border-color:#ee3d43; color: #ee3d43;">
                {{ $singleview->category->parent->name }}
              </a>
          </li>
  
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-lg-9">
      <article class="post single">
       

        <div class="post-body">
          <div class="post-date">
            <span class="day">{{ date('d', strtotime($singleview->created_at))}}</span>
            <span class="month">{{ date('M', strtotime($singleview->created_at))}}</span>
          </div><!-- End .post-date -->

          <h2 class="post-title">
            {{-- {{ $singleview->title }} --}}
                {{-- {{ $singleview->title_text }} --}}
                @if ($singleview->title_text == "tamil")
                    
                  {{ $singleview->category->tamil }} {{ date('d-M-Y', strtotime($singleview->date)) }}
                @else 
                  {{ $singleview->title }}
                @endif

            {{-- {{ explode(' ',$singleview->title)[1] }} --}}
          </h2>

          <div class="post-meta">
            <span><i class="icon-calendar"></i>{{ date('F d, Y', strtotime($singleview->created_at))}}</span>
            <span><i class="icon-user"></i>By <a href="#">Admin</a></span>
            <span><i class="icon-folder-open"></i>
              <a href="{{ route('category',$singleview->category->parent->slug) }}">{{ $singleview->category->parent->name }}</a>,
              <a href="{{ route('category',$singleview->category->slug) }}">{{ $singleview->category->name }}</a>,
            </span>
          </div><!-- End .post-meta -->

          <div class="post-content">
           <p>
            <iframe src="{{ $singleview->content }}" alt="Video Thumbnail" style="height: 450px; width:100%" allowfullscreen></iframe>
           </p>
            @if (isset($singleview->content2))
              <p><iframe src="{{ $singleview->content2 }}" alt="Video Thumbnail" style="height: 450px; width:100%" allowfullscreen></iframe></p>
            @endif

            @if (isset($singleview->content3))
              <p><iframe src="{{ $singleview->content3 }}" alt="Video Thumbnail" style="height: 450px; width:100%" allowfullscreen></iframe></p>
            @endif

            @if (isset($singleview->content4))
              <p><iframe src="{{ $singleview->content4 }}" alt="Video Thumbnail" style="height: 450px; width:100%" allowfullscreen></iframe></p>
            @endif
          </div><!-- End .post-content -->

          <div class="post-share">
            <h3>
              <i class="icon-forward"></i>
              Share this post
            </h3>

            <div class="social-icons">
              <div class="addthis_inline_share_toolbox"></div>
              
             
            </div><!-- End .social-icons -->
          </div><!-- End .post-share -->

          
          <div class="banners-group">
            <div class="row m-b-3">
              <div class="col-md-12 w-md-44 mb-2">
                @if($url == "https://topcini.com" || $url == "https://topcini.net")
                  {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
                  <!-- palathum horizontal 2020 -->
                  <ins class="adsbygoogle"
                  style="display:block"
                  data-ad-client="ca-pub-9201221090419481"
                  data-ad-slot="3546959238"
                  data-ad-format="auto"
                  data-full-width-responsive="true"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
                @endif
              </div><!-- End .col-md-6 -->
              <div class="col-md-12 w-md-44 mb-2">
                @if($url == "https://topcini.com" || $url == "https://topcini.net")
                  {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
                  <!-- palathum horizontal 2020 -->
                  <ins class="adsbygoogle"
                  style="display:block"
                  data-ad-client="ca-pub-9201221090419481"
                  data-ad-slot="3546959238"
                  data-ad-format="auto"
                  data-full-width-responsive="true"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
                @endif
              </div><!-- End .col-md-6 -->
              
            </div><!-- End .row -->
          </div><!-- End .banners-group -->
         

          <div class="comment-respond">
            <h3>Leave a Reply</h3>
            <p>Your email address will not be published. Required fields are marked *</p>

            <form  method="post" id="comment-form" class="comment-form">
              @csrf
              @method('POST')
              <input class="form-control" id="post_id" name="post_id" type="hidden" value="{{$singleview->id  }}">
              <div class="form-group required-field">
                <label>Comment</label>
                <textarea cols="30" rows="1" class="form-control" required name="comment" id="comment" required></textarea>
              </div><!-- End .form-group -->

              <div class="form-group required-field">
                <label>Name</label>
                <input type="text" class="form-control" id="name" name="name" type="text" required>
              </div><!-- End .form-group -->

              <div class="form-group required-field">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" type="email" required>
              </div><!-- End .form-group -->
              <div class="form-group-custom-control mb-3">
                <div class="custom-control custom-checkbox">
                  <label id="saved" style="color: green;"></label>
                </div><!-- End .custom-checkbox -->
              </div><!-- End .form-group-custom-control -->
              <div class="form-footer">
                <button type="submit" class="btn btn-primary">Post Comment</button>
              </div><!-- End .form-footer -->
            </form>
          </div><!-- End .comment-respond -->
        </div><!-- End .post-body -->
      </article><!-- End .post -->
      <div class="col-12">
        @if($url == "https://topcini.com" || $url == "https://topcini.net")
  
          {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
          <!-- topcini horizontal new topcini -->
          <ins class="adsbygoogle"
              style="display:block"
              data-ad-client="ca-pub-9201221090419481"
              data-ad-slot="2110906838"
              data-ad-format="auto"
              data-full-width-responsive="true"></ins>
          <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        @endif
      </div>
      <div class="related-posts">
        <h4 class="light-title">Related <strong>Posts</strong></h4>

        <div class="owl-carousel owl-theme related-posts-carousel">
          @foreach ($relateds as $key=> $related)
              
            <article class="post">
              <div class="post-media">
                <a href="{{ route('singleserial',['cat' =>$related->category->parent->slug,'drama' =>$related->category->slug,'postdrama'=>$related->slug]) }}">
                  <img src="/category_image/{{ $related->category->image }}" alt="Post">
                </a>
              </div><!-- End .post-media -->

              <div class="post-body">
                <div class="post-date">
                  <span class="day">{{ date('d', strtotime($related->created_at))}}</span>
                  <span class="month">{{ date('M', strtotime($related->created_at))}}</span>
                </div><!-- End .post-date -->

                <h2 class="post-title">
                  <a href="{{ route('singleserial',['cat' =>$related->category->parent->slug,'drama' =>$related->category->slug,'postdrama'=>$related->slug]) }}">{{ $related->title }}</a>
                </h2>

                <div class="post-content">
                  {{-- <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per incep tos himens.</p>

                  <a href="single.html" class="read-more">Read More <i class="icon-angle-double-right"></i></a> --}}
                </div><!-- End .post-content -->
              </div><!-- End .post-body -->
            </article>
            @if($key == 2)
              @php
                  break;
              @endphp
            @endif
            
          @endforeach

          
        </div><!-- End .owl-carousel -->
      </div><!-- End .related-posts -->
      <div class="col-12">
        @if($url == "https://topcini.com" || $url == "https://topcini.net")
  
          {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
          <!-- topcini horizontal new topcini -->
          <ins class="adsbygoogle"
              style="display:block"
              data-ad-client="ca-pub-9201221090419481"
              data-ad-slot="2110906838"
              data-ad-format="auto"
              data-full-width-responsive="true"></ins>
          <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        @endif
      </div>
    </div><!-- End .col-lg-9 -->

    <aside class="sidebar col-lg-3">
      @include('front-end.shared.side-bar')
    </aside><!-- End .col-lg-3 -->
  </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-6"></div><!-- margin -->
@push('script')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5cee4c071f0f4e4b"></script>
  <script>
    
    $('#comment-form').submit(function (e) { 
      e.preventDefault();
      var form = new FormData(this);
      $.ajax({
        url:"{{ route('savecomment') }}",
        type:"POST",
        data: form,
        dataType:"Json",
        cache: false,
        contentType: false,
        processData: false
      })  
      .done(function (res) {
        // console.log(res);
        if(res.success){
          $('#saved').text(res.message);
          $("input").val("");
          $("textarea").val("");
          
        }
        
      })
    });
   
    
  </script>  
@endpush
@stop