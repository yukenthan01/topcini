@php
  $url = Request::root();
@endphp


<div class="header-middle">
  <div class="container">
    <div class="header-left col-lg-2 w-auto pl-0 mr-3">
      <button class="mobile-menu-toggler" type="button">
        <i class="icon-menu"></i>
      </button>
      <a href="{{route('index')}}" class="logo">
        <img src="/front-end/images/logo.png" alt="Topcini Logo">
      </a>
    </div><!-- End .header-left -->
    <div class="header-right w-lg-max header-ads">
      @if($url == "https://topcini.com" || $url == "https://topcini.net")
        {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
        <!-- ephonestopcini -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:628px;height:90px"
            data-ad-client="ca-pub-9201221090419481"
            data-ad-slot="7156184101"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      @endif
    </div><!-- End .header-search -->
    <div class="header-contact d-none d-lg-flex pl-1 mr-xl-5 pr-4">
      <div class="header-icon header-search header-search-inline header-search-category mr-lg-5 pr-lg-4 w-lg-max">
        <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
        <form method="GET" action="{{ url('admin/searchresults') }}" id="searchform">
          <div class="header-search-wrapper">
            <input name="search" type="text" class="form-control search-input" id="searchid" size="20" maxlength="20" placeholder="Search Here ...." required="">
            
            <button class="btn icon-search-3 search-submit"  id="btnsearch" type="submit"></button>
          </div><!-- End .header-search-wrapper -->
        </form>
      </div><!-- End .header-search -->

    
      
    </div>
    
  </div><!-- End .container -->
</div><!-- End .header-middle -->

<div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{
  'move': [
    {
      'item': '.header-search',
      'position': 'end',
      'clone': false
    },
    {
      'item': '.header-icon:not(.header-search)',
      'position': 'end',
      'clone': false
    },
    {
      'item': '.cart-dropdown',
      'position': 'end',
      'clone': false
    }
  ],
  'moveTo': '.container',
  'changes': [
    {
      'item': '.header-search',
      'removeClass': 'header-search-inline w-lg-max mr-lg-5 pr-lg-4',
      'addClass': 'header-search-popup ml-auto'
    },
    {
      'item': '.main-nav',
      'removeClass': 'w-100'
    },
    {
      'item': '.logo',
      'removeClass': 'd-none'
    },
    {
      'item': '.float-right',
      'addClass': 'd-none'
    }
  ]
}">
  <div class="container">
    <a href="{{route('index')}}" class="logo logo-light mr-3 pr-xl-3 d-none">
      <img src="/front-end/images/logo.png" alt="Topcini Logo">
    </a>
    <nav class="main-nav w-100">
      <ul class="menu">
        <li class="{{ (request()->is('/')) ? 'active' : '' }}">
          <a href="{{route('index')}}">Home</a>
        </li>
        @foreach ($categories as $category)
        
              
          <li class="menu-item  {{ (request()->is($category->slug.'*')) ? 'active' : '' }}">

            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
          </li>
        @endforeach
        <li class="">
          <a href="https://cinimovies.com/" target="_blank">Tamil Movies</a>
        </li>
       
      </ul>
      
    </nav>
  </div><!-- End .container -->
  <div id="itemlist">
              
  </div>
</div><!-- End .header-bottom -->

@push('script')
<script type="text/javascript">
  // $('#searchid').keyup(function(){ 
  //   // var category = $('#category').val();
  //   var query = $(this).val();
  //   if(query != '')
  //   {
  //     var _token = $('input[name="_token"]').val();
  //     $.ajax({
  //     url:"{{ route('autocomplete') }}",
  //     method:"POST",
  //     data:{query:query, _token:_token},
  //     success:function(data){
  //       $('#itemlist').fadeIn();  
  //       $('#itemlist').html(data);
  //       console.log(data);
  //     }
  //     });
  //   }
  // });

  // $(document).on('click', '#itemlistout', function(){  
  //   // var dat = $('#item_name').val($(this).text());  
  //   var dat = $('#item_name').attr('data-title');
  //   $('#searchid').val(dat);
  //   $('#itemlist').fadeOut();
  //   // $('#searchform').submit();
  //   $( "#btnsearch" ).trigger( "click" );
    
  // });
  // // $(document).on('mouseleave','#itemlist',function () {
  // //   $('#itemlist').fadeOut();
  // // })
  // $(document).on('click','#itemlist',function () {
  //   $('#itemlist').fadeOut();
  // })
  
</script>

@endpush