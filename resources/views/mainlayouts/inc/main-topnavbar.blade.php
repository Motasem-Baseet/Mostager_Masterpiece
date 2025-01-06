
<div class="container">
<div class="row">
<div class="col-lg-7 col-md-5 col-xs-12">

<ul class="list-inline">
<li><i class="lni-phone"></i> +962 781 747 224</li>
<li><i class="lni-envelope"></i> <a href="http://preview.uideck.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c3f393c3c233e380c2b212d2520622f2321">[email&#160;protected]</a></li>
</ul>

</div>
<div class="col-lg-5 col-md-7 col-xs-12">
<div class="roof-social float-right">
<a class="linkedin" href="https://www.linkedin.com/in/motasem-baseet/"><i style="padding-top:12px;" class="lni-linkedin-fill"></i></a>
</div>
<div  style="padding-top: 10px" class="header-top-right float-right">
    @if(Auth::check()) <!-- Check if the user is logged in -->
    <a href="{{ route('logout') }}" class="header-top-button"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="lni-lock"></i> Log Out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <a href="{{ url('login') }}" class="header-top-button"><i class="lni-lock"></i> Log In</a> |
    <a href="{{ url('register') }}" class="header-top-button"><i class="lni-pencil"></i> Register</a>
@endif
</div>
</div>
</div>
</div>
