<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Top Cini</title>

  	<meta name="google-site-verification" content="L5voCotjzukAZtZ4jREuLsWUDf2rWvdKsJe6PXfDRvo" />

	@yield('meta')

	<meta name="keywords" content="Topcini, Entertainment, Dramas, Tamil Serials, Vijay TV, Zee Tamil, Colors Tamil, Sun Tv" />
	<meta name="description" content="TopCini - Entertaining one core people">
	<meta name="author" content="Team Topcini">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="/back-end/images/favicon.png">
	@laravelPWA

	<script type="text/javascript">
		// WebFontConfig = {
		// 	google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700' ] }
		// };
		// (function(d) {
		// 	var wf = d.createElement('script'), s = d.scripts[0];
		// 	wf.src = '/front-end/assets/js/webfont.js';
		// 	wf.async = true;
		// 	s.parentNode.insertBefore(wf, s);
		// })(document);
	</script>

	<!-- Plugins CSS File -->
	<link rel="stylesheet" href="/front-end/assets/css/bootstrap.min.css">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="/front-end/assets/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="/front-end/assets/vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/front-end/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
	<!-- ========= Google Adsense ========= -->
	{{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}


   	<!-- ========= Google Analytics ========= -->
 
	<!-- Global site tag (gtag.js) - Google Analytics -->
	{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120256710-2"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-120256710-2');
	</script> --}}
 
 
   <!-- ========= Google Analytics ========= -->
    @if($url == "https://topcini.com" || $url == "https://topcini.net")
        
        <script data-ad-client="ca-pub-9201221090419481" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	@endif
	<style>
		
		@media only screen and (max-width: 768px) {
			.header-ads{
				display: none;
			}
		}
	</style>
</head>
<body>
	 @php
		$url = Request::root();
	@endphp
	<div class="page-wrapper">
		

		<header class="header">
			@include('front-end.shared.header')
		</header><!-- End .header -->

		<main class="main">
			<div class="home-top-container mt-lg-2">
				
			</div><!-- End .home-top-container -->

			

			<div class="container">
				@yield('content')
			</div><!-- End .container -->
		</main><!-- End .main -->

		<footer class="footer">
			@include('front-end.shared.footer')
		</footer>
	</div><!-- End .page-wrapper -->

	<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

	<div class="mobile-menu-container">
		<div class="mobile-menu-wrapper">
			<span class="mobile-menu-close"><i class="icon-cancel"></i></span>
			
			@include('front-end.shared.mobile-menu')


			<div class="social-icons">
				
				<a href="https://www.facebook.com/topcini/" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
				<a href="https://twitter.com/topcini2019" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
				<a href="https://www.instagram.com/topcini2018/" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
			</div><!-- End .social-icons -->
		</div><!-- End .mobile-menu-wrapper -->
	</div><!-- End .mobile-menu-container -->


	
	<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

	<!-- Plugins JS File -->
	<script src="/front-end/assets/js/jquery.min.js"></script>
	<script src="/front-end/assets/js/bootstrap.bundle.min.js"></script>
	<script src="/front-end/assets/js/plugins.min.js"></script>

	<!-- Main JS File -->
	<script src="/front-end/assets/js/main.min.js"></script>
	<script src="{{ asset('front-end/assets/counts.js') }}"></script>
	
	<!-- Go to www.addthis.com/dashboard to customize your tools --> 
	{{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5cee4c071f0f4e4b"></script> --}}
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="t45vMmPe"></script>
	<script src="{{ asset('js/share.js') }}"></script>
	@stack('script')
</body>

</html>