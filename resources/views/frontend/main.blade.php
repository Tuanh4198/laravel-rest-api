<!DOCTYPE html>
<html>
	<head>
		@yield('title')
		<!-- title -->
		<meta charset="utf-8">
		<meta content="ie=edge" http-equiv="x-ua-compatible">
		<meta content="template language" name="keywords">
		<meta content="Tamerlan Soziev" name="author">
		<meta content="Admin dashboard html template" name="description">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		@include('frontend.layout.css')
	</head>
	<body class="menu-position-side menu-side-left full-screen with-content-panel">
		<div class="loading-mask" data-role="loader" style="display: none;">
			<div class="loader">
				<img alt="Loading..." src="{{asset('public/dist/bower_components/slick-carousel/slick/ajax-loader.gif')}}">
			</div>
		</div>
		<div class="all-wrapper solid-bg-all">
			@yield('modal')
			@include('frontend.layout.search')
			<div class="layout-w">
				@include('frontend.layout.sidebar_left')
				<div class="content-w">
					@include('frontend.layout.topbar')
					@yield('content') 
				</div>
			</div>
			<div class="display-type"></div>
		</div>
    
		@include('frontend.layout.js')
		@yield('script')
	</body>
</html>
