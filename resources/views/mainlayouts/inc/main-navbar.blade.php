





<nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
<div class="container">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a href="index-2.html" class="navbar-brand"><img src="{{ asset('assets/img/logo.png') }}" alt="Product Image">
</a>
</div>
<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto w-100 justify-content-center">
<li class="nav-item dropdown active">
<a class="nav-link " href="{{url('main/index')}}">
Home
</a>
<div class="dropdown-menu">
<!-- <a class="dropdown-item" href="index-2.html">Home 1</a> -->
<!-- <a class="dropdown-item active" href="index-3.html">Home 2</a> -->
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="{{url('main/products')}}">
Categories
</a>
</li>
 <li class="nav-item dropdown">
<!-- <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Listings
</a> -->
<div class="dropdown-menu">
<a class="dropdown-item" href="adlistinggrid.html">Ad Grid</a>
<!-- <a class="dropdown-item" href="adlistinglist.html">Ad Listing</a> -->
<!-- <a class="dropdown-item" href="ads-details.html">Listing Detail</a> -->
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Pages
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="{{url('main/about-us')}}">About Us</a>
<a class="dropdown-item" href="{{url('main/services')}}">Services</a>
<!-- <a class="dropdown-item" href="ads-details.html">Ads Details</a> -->
<!-- <a class="dropdown-item" href="post-ads.html">Ads Post</a> -->
<!-- <a class="dropdown-item" href="pricing.html">Packages</a> -->
<!-- <a class="dropdown-item" href="testimonial.html">Testimonial</a> -->
<a class="dropdown-item" href="{{url('main/faq')}}">FAQ</a>
<a class="dropdown-item" href="404.html">404</a>
</div>
</li>
<!-- <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Blog
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a>
<a class="dropdown-item" href="blog-left-sidebar.html">Blog - Left Sidebar</a>
<a class="dropdown-item" href="blog-grid-full-width.html"> Blog full width </a>
<a class="dropdown-item" href="single-post.html">Blog Details</a>
</div>
</li> -->
<li class="nav-item">
<a class="nav-link" href="{{url('main/contactUs')}}">
Contact
</a>
</li>
</ul>
<div class="post-btn">
<a class="btn btn-common" href="{{url('main/dashboard')}}"><i class="lni-pencil-alt"></i> Post Ad </a>
</div>
</div>
</div>

<ul class="mobile-menu">
<li>
<a class="active" href="{{url('main/index')}}">
Home
</a>
<ul class="dropdown">
<li><a href="index-2.html">Home 1</a></li>
<li><a class="active" href="index-3.html">Home 2</a></li>
</ul>
</li>
<li>
<a href="category.html">Categories</a>
</li>
<li>
<a href="#">
Listings
</a>
<ul class="dropdown">
<li><a href="adlistinggrid.html">Ad Grid</a></li>
<li><a href="adlistinglist.html">Ad Listing</a></li>
<li><a href="ads-details.html">Listing Detail</a></li>
</ul>
</li>
<li>
<a href="#">Pages</a>
<ul class="dropdown">
<li><a href="about.html">About Us</a></li>
<li><a href="services.html">Services</a></li>
<li><a href="ads-details.html">Ads Details</a></li>
<li><a href="post-ads.html">Ads Post</a></li>
<li><a href="pricing.html">Packages</a></li>
<li><a href="testimonial.html">Testimonial</a></li>
<li><a href="faq.html">FAQ</a></li>
<li><a href="404.html">404</a></li>
</ul>
</li>
<li>
<a href="#">Blog</a>
<ul class="dropdown">
<li><a href="blog.html">Blog - Right Sidebar</a></li>
<li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
<li><a href="blog-grid-full-width.html"> Blog full width </a></li>
<li><a href="single-post.html">Blog Details</a></li>
</ul>
</li>
<li>
<a href="{{url('main/conatactUs')}}">Contact Us</a>
</li>
</ul>

</nav>

