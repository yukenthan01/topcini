@php
    $url = Request::root();
@endphp
<div class="widget widget-posts post-date-in-media">
    @if($url == "https://topcini.com" || $url == "https://topcini.net")
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
</div><!-- End .widget -->
<div class="side-menu-wrapper mb-3">
    <h2 class="side-menu-title ls-n-25">Browse Categories</h2>

    <ul class="side-menu pt-2 mb-2 px-3 mx-3">
        
        @foreach ($parent_categories as $categories)
           
            <li>
                <a href="{{ route('singleserial',['cat' =>$categories->slug]) }}"> {{ $categories->name }}</a> 
                <span class="side-menu-toggle"></span>

                <ul>
                    @foreach ($categories->children as $category)
                        @if ($category->status == "active")
                            
                            <li><a href="{{ route('singleserial',['cat' =>$categories->slug,'drama'=>$category->slug]) }}">{{ $category->name }}</a></li>
                        @endif
                    @endforeach
                   
                </ul>
            </li>
        @endforeach
       <li class="">
          <a href="https://cinimovies.com/" target="_blank">Tamil Movies</a>
          <span class="side-menu-toggle"></span>
        </li>
        
    </ul><!-- End .side-menu -->
</div>

<div class="widget widget-posts post-date-in-media">
    @if($url == "https://topcini.com" || $url == "https://topcini.net")
        <!-- topcini.redirect -->
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9201221090419481"
        data-ad-slot="9071827625"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        
    @endif
</div><!-- End .widget -->

<div class="widget widget-posts post-date-in-media">
    @if($url == "https://topcini.com" || $url == "https://topcini.net")
        <!-- topcini.redirect -->
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9201221090419481"
        data-ad-slot="9071827625"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        
    @endif
</div><!-- End .widget -->

<div class="widget widget-posts post-date-in-media">
    @if($url == "https://topcini.com" || $url == "https://topcini.net")
        <!-- Topcini new sidebar -->
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9201221090419481"
        data-ad-slot="2685621900"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    @endif

</div><!-- End .widget -->

<div class="widget widget-posts post-date-in-media">
    @if($url == "https://topcini.com" || $url == "https://topcini.net")
        <!-- Topcini new sidebar -->
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9201221090419481"
        data-ad-slot="2685621900"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    @endif
</div><!-- End .widget -->

@push('script')
  <script>
    // $('#subscribe').submit(function (e) { 
    //   e.preventDefault();
    //   var form = new FormData(this);
    //   $.ajax({
    //     url:"{{ route('subscribe') }}",
    //     type:"POST",
    //     data: form,
    //     dataType:"Json",
    //     cache: false,
    //     contentType: false,
    //     processData: false
    //   })  
    //   .done(function (res) {
    //     console.log(res);
    //     if(res.success){
    //       $('#subres').text(res.message);
    //     }
    //     else{
    //       $('#subres').text(res.message).attr('color','red');
    //     }
        
    //   })
    // });
  </script>
@endpush