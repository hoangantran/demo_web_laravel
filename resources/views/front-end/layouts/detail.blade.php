@include('front-end.layouts.header')
<body>
@include('front-end.modules.top-menu')
    @yield('content')
@include('front-end.layouts.footer')