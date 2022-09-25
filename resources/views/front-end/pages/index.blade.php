@extends('front-end.template')
@section('content')

<div class="row">
  <div class="col-lg-9">
    <div class="home-product-tabs">
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="featured-products-tab" data-toggle="tab" href="#" role="tab" aria-controls="featured-products" aria-selected="true">Recent Posts</a>
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
          <div class="row">
            @foreach ($topvideos as $topvideo)
              <div class="col-6 col-sm-4">
                <div class="product-default inner-quickview inner-icon">
                  <figure>
                    <a href="{{ route('singleserial',['cat' =>$topvideo->category->parent->slug,'drama'=>$topvideo->category->slug,'postdrama' =>$topvideo->slug]) }}">
                      <img src="/category_image/{{ $topvideo->category->image }}" height="280" width="280">
                    </a>
                    <div class="label-group">
                    </div>
                    <div class="btn-icon-group">
                    </div>
                  </figure>
                  <div class="product-details">
                    <div class="category-wrap">
                      <div class="category-list">
                        <a href="{{ route('singledrama',['cat'=>$topvideo->category->parent->slug,'drama'=>$topvideo->category->slug]) }}" class="product-category">{{ $topvideo->category->name }}</a>
                      </div>
                    </div>
                    <h3 class="product-title">
                      <a href="{{ route('singleserial',['cat' =>$topvideo->category->parent->slug,'drama'=>$topvideo->category->slug,'postdrama' =>$topvideo->slug]) }}" style="white-space: unset;">{{ $topvideo->title }}</a>
                    </h3>
                    
                  </div><!-- End .product-details -->
                </div>
              </div>
            @endforeach
          
           
          </div>
        </div><!-- End .tab-pane -->
        
      </div><!-- End .tab-content -->
    </div><!-- End .home-product-tabs -->
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
    <div class="home-product-tabs">
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="featured-products-tab" href="{{  route('category',$categories[0]->slug)  }}" >Vijay Tv</a>
        </li>
    
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="featured-products" role="tabpanel"
          aria-labelledby="featured-products-tab">
          <div class="row">
            @foreach ($vijays as $vijay)

              <div class="col-6 col-sm-4">
                <div class="product-default inner-quickview inner-icon">
                  <figure>
                    <a href="{{ route('singleserial',['cat' =>$vijay->category->parent->slug,'drama' =>$vijay->category->slug,'postdrama'=>$vijay->slug]) }}">
                      <img src="/category_image/{{ $vijay->category->image }}">
                    </a>
                    <div class="label-group">
                    </div>
                    <div class="btn-icon-group">
                    
                    </div>
                    
                  </figure>
                  <div class="product-details">
                    <div class="category-wrap">
                      <div class="category-list">
                        <a href="{{ route('singledrama',['cat'=>$vijay->category->parent->slug,'drama'=>$vijay->category->slug]) }}" class="product-category">{{ $vijay->category->name }}</a>
                      </div>
                    </div>
                    <h3 class="product-title" >
                      <a style="white-space: unset;" href="{{ route('singleserial',['cat' =>$vijay->category->parent->slug,'drama' =>$vijay->category->slug,'postdrama'=>$vijay->slug]) }}" >{{ $vijay->title }}</a>
                    </h3>
                  
                  </div><!-- End .product-details -->
                </div>
              </div>
            @endforeach

            
          </div>
        </div><!-- End .tab-pane -->
    
      </div><!-- End .tab-content -->
    </div><!-- End .home-product-tabs -->
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
    <div class="home-product-tabs">
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="featured-products-tab" href="{{  route('category',$categories[2]->slug)  }}" >Zee Tamil</a>
        </li>
    
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="featured-products" role="tabpanel"
          aria-labelledby="featured-products-tab">
          <div class="row">
            @foreach ($zees as $zee)

              <div class="col-6 col-sm-4">
                <div class="product-default inner-quickview inner-icon">
                  <figure>
                    <a href="{{ route('singleserial',['cat' =>$zee->category->parent->slug,'drama' =>$zee->category->slug,'postdrama'=>$zee->slug]) }}">
                      <img src="/category_image/{{ $zee->category->image }}">
                    </a>
                    <div class="label-group">
                    </div>
                    <div class="btn-icon-group">
                    
                    </div>
                    
                  </figure>
                  <div class="product-details">
                    <div class="category-wrap">
                      <div class="category-list">
                        <a href="{{ route('singledrama',['cat'=>$zee->category->parent->slug,'drama'=>$zee->category->slug]) }}" class="product-category">{{ $zee->category->name }}</a>
                      </div>
                    </div>
                    <h3 class="product-title" >
                      <a style="white-space: unset;" href="{{ route('singleserial',['cat' =>$zee->category->parent->slug,'drama' =>$zee->category->slug,'postdrama'=>$zee->slug]) }}" >{{ $zee->title }}</a>
                    </h3>
                  
                  </div><!-- End .product-details -->
                </div>
              </div>
            @endforeach

            
          </div>
        </div><!-- End .tab-pane -->
    
      </div><!-- End .tab-content -->
    </div><!-- End .home-product-tabs -->

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
  <aside class="sidebar-home col-lg-3 mobile-sidebar">
    @include('front-end.shared.side-bar')
  </aside>
</div><!-- End .row -->


  @push('script')
      <script>
      function  link (iframe) {
        var rid = iframe.attr('src');
        alert(rid)

        }
      </script>
  @endpush
@stop
