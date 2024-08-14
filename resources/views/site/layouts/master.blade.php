<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
	<head>
		@include('site.layouts.head')
	</head>
	<body>
		@include('site.layouts.main-header')
		
		@yield('content')
		
		@include('site.layouts.footer')
		@include('site.layouts.footer-scripts')
  </body>
</html>