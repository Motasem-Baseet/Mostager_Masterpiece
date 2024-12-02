<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/line-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/slicknav.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/color-switcher.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css')}}" rel="stylesheet">
</head>
<body>


<header id="header-wrap">

<div class="top-bar">
@include('mainlayouts.inc.main-topnavbar')
</div>
@include('mainlayouts.inc.main-navbar')

</header>





            @yield('usercontent')


        @include('mainlayouts.inc.main-footer')





<script type="text/javascript" src="{{URL::asset('assets/js/jquery-min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/color-switcher.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/wow.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.slicknav.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/form-validator.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/contact-form-script.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/summernote.js')}}"></script>
<script src="{{URL::asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>

</body>
</body>
</html>
