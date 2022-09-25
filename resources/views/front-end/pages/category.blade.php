@extends('front-end.template')
@section('content')

@php
    $url = Request::root();
@endphp
<nav aria-label="breadcrumb" class="">
    <div class="container">
       
        <ul class="nav nav-tabs mb-2" role="tablist" >
            <li class="nav-item">
                <a class="nav-link active" id="featured-products-tab" href="#" style="border-color:#ee3d43; color: #ee3d43;">
                    {{ $maincateggory }}
                </a>
            </li>
    
      </ul>
    </div>
</nav>
<div class="row">
    <div class="col-lg-9">
        

        <div class="row">
            @foreach ($categoryes as $category)
                <div class="col-6 col-sm-4">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="{{ route('singleserial',['cat' =>$category->category->parent->slug,'drama' =>$category->category->slug,'postdrama'=>$category->slug]) }}">
                                <img src="/category_image/{{ $category->category->image }}">
                            </a>
                            <div class="label-group">
                               
                            </div>
                            <div class="btn-icon-group">
                            </div>
                           
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="{{ route('singledrama',['cat'=>$category->category->parent->slug,'drama'=>$category->category->slug]) }}" class="product-category">{{ $category->category->name }}</a>
                                </div>
                            </div>
                            <h2 class="product-title">
                                <a href="{{ route('singleserial',['cat' =>$category->category->parent->slug,'drama' =>$category->category->slug,'postdrama'=>$category->slug]) }}" style="white-space: unset;">{{ $category->title }}</a>
                            </h2>
                           
                        </div><!-- End .product-details -->
                    </div>
                </div><!-- End .col-sm-4 -->
            @endforeach
           
            
        </div><!-- End .row -->

        <nav class="toolbox toolbox-pagination">
            <div class="toolbox-item toolbox-show">
                
            </div><!-- End .toolbox-item -->

            {{ $categoryes->links()  }}
           
        </nav>
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
    </div><!-- End .col-lg-9 -->

    <div class="sidebar-overlay"></div>
    <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
    <aside class="sidebar-shop col-lg-3 mobile-sidebar">
        @include('front-end.shared.side-bar')
       
    </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->

		

	
@stop