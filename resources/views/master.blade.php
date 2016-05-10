

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Quickly Blog</title>
	<!-- for-mobile-apps -->
	
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Quickly Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script src="{{ URL::asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<!-- //js -->
	{{-- date picker --}}
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery-ui.min.css')}}">
	<script src="{{ URL::asset('assets/js/jquery-ui.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>

	{{-- tags bootstrap --}}
	<script src="{{ URL::asset('assets/js/bootstrap-tagsinput.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<script src="{{ URL::asset('assets/js/bootstrap-tagsinput-angular.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap-tagsinput.css') }}">

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{ URL::asset('assets/js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/easing.js') }}"></script>
	<script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
	</script>
	<!-- start-smoth-scrolling -->
</head>

<body>
	<!-- banner-body -->
	<div class="banner-body regstr">
		<div class="container">
			<!-- header -->
			<div class="header">
				<div class="header-nav">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/home"><span>Q</span>uickly</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
							{{-- header links --}}
							@yield('header_links')
							@yield('admin_button')

						</ul>
						{{-- log --}}
						@yield('log')
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>

			<!-- search-scripts -->
			<script src="{{ URL::asset('js/classie.js') }}"></script>
			<script src="{{ URL::asset('js/uisearch.js') }}"></script>
			<script>
			new UISearch( document.getElementById( 'sb-search' ) );
			</script>
			<!-- //search-scripts -->
		</div>
		<!-- //header -->

		{{-- add Article button --}}
		@yield('addArticleButton')

		{{-- contents --}}
		@yield('contents')

	</div>
</div>
<!-- footer -->
	{{-- <div class="footer">
		<div class="container">
			<div class="footer-grids">
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> --}}
	<div class="footer-bottom">
		<div class="container">
			<p>© 2016 Quickly. All rights reserved |<a href="https://www.linkedin.com/in/sarahelzeftawy"> Sarah ElZeftawy</a></p>
		</div>
	</div>
	<!-- //footer -->
	<!-- for bootstrap working -->
	<script src="{{ URL::asset('assets/js/bootstrap.js') }}"> </script>
	<!-- //for bootstrap working -->
</body>
</html>