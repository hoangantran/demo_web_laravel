@include('front-end.layouts.header')
<body>
@include('front-end.modules.top-menu')
@include('front-end.modules.slide')
@include('front-end.modules.left-menu')
	@yield('content')
@include('front-end.layouts.footer')
	@yield('script')