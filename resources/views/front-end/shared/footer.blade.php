@php
    $url = Request::root();
@endphp
<div class="footer-middle">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
        <div class="widget">
          <h4 class="widget-title">About Us</h4>
          <img src="/front-end/images/logo.png" alt="Logo" class="m-b-3">
          <p class="m-b-4">Top Cini is a website which will give the Tamil serials to you. We didn’t climb any copyrights for the videos we publish here most of the clips are get from other different sources. we grant the copyrights to DMCA.

            If you have any issue with this site please contact us through the mail “topcini.com@gmail.com”.</p>

            <p>Come and enjoy!!! All are just for fun…………</p>
        </div><!-- End .widget -->
      </div><!-- End .col-lg-3 -->

      

      <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
        <div class="widget">
          <h4 class="widget-title">Facebook Feed</h4>

          <ul class="links">
            <li><div class="fb-page" data-href="https://www.facebook.com/topcini/" data-tabs="timeline" data-width="380" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/topcini/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/topcini/">Top Cini</a></blockquote></div></li>
            
          </ul>
        </div><!-- End .widget -->
      </div><!-- End .col-lg-3 -->

      <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
        <div class="widget">
          <h4 class="widget-title">Popular Tags</h4>

          <div class="tagcloud">
            @foreach ($categories as $category)
              <a href="{{ route('category',$category->slug) }}" class="tag-link">{{ $category->name }}</a>
            @endforeach
           
          </div>
          <div class="social-icons">
            <a href="https://www.facebook.com/topcini/" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
            <a href="https://twitter.com/topcini2019" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
            <a href="https://www.instagram.com/topcini2018/" class="social-icon social-instagram fab fa-instagram" target="_blank" title="Instagram"></a>
          </div><!-- End .social-icons -->
        </div><!-- End .widget -->
      </div><!-- End .col-lg-3 -->
      <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
        <div class="widget mb-2">
          <h4 class="widget-title mb-1 pb-1">Twitter Feed</h4>
         
          
        </div><!-- End .widget -->
        <ul class="contact-info m-b-4">
          <li>
            <a class="twitter-timeline" data-width="380" data-height="300" data-theme="light" href="https://twitter.com/topcini2019?ref_src=twsrc%5Etfw">Tweets by topcini2019</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </li>
          
        </ul>
        
      </div><!-- End .col-lg-3 -->
    </div><!-- End .row -->
  </div><!-- End .container -->
</div><!-- End .footer-middle -->

<div class="footer-bottom">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">
    <p class="footer-copyright py-3 pr-4 mb-0">© Topcini. {{date('Y')}}. All Rights Reserved | Designed and Developed by <a href="https://nefttech.com/" target="_blank">NeftTech</a></p>

  </div>
</div><!-- End .container -->
