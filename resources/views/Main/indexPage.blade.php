@extends('mainlayouts.mainMaster')


{{-- @if(Auth::check())
    <p>Logged-in User ID: {{ Auth::id() }}</p>
@else
    <p>No user is currently logged in.</p>
@endif --}}
<div style="" id="main-slide" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active">
<img style="max-height:570px" class="d-block w-100" src="{{ asset('assets/img/slider/background2.jpg')}}" alt="First slide">
<div class="carousel-caption d-md-block">
<h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s">Welcome to The Largest Marketplace</h1>
<p class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s">Rent and hire everything, or search for property and more</p>
</div>
</div>
<div class="carousel-item">
<img style="max-height:570px" class="d-block w-100" src="{{asset('assets/img/slider/background2.jpg')}}" alt="Second slide">
<div class="carousel-caption d-md-block">
<h1 class="animated wow fadeInLeft hero-heading" data-wow-delay=".7s">Post Free</h1>
<!-- <p class="animated wow fadeInRight hero-sub-heading" data-wow-delay=".9s">Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more</p> -->
</div>
</div>
<div class="carousel-item">
<img style="max-height:570px" class="d-block w-100" src="{{ asset('assets/img/slider/background2.jpg')}}" alt="Third slide">
<div class="carousel-caption d-md-block">
<h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".6s">Get More Rewards and More Exposure</h1>
<p class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".8s">Rent and hire everything, or search for property and more</p>
</div>
</div>
</div>
<a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left" data-ripple-color="#F0F0F0"></i></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right" data-ripple-color="#F0F0F0"></i></span>
<span class="sr-only">Next</span>
</a>
</div>


<div class="search-button">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="search-bar">
                    <div class="search-inner">
                        <form class="search-form" action="{{ route('products.search') }}" method="GET">
                            <!-- Search by Name -->
                            <div class="form-group inputwithicon">
                                <i class="lni-tag"></i>
                                <input type="text" name="customword" class="form-control" placeholder="What are you looking for?">
                            </div>


                            <!-- Category Dropdown -->
                            <div class="form-group inputwithicon">
                                <i class="lni-menu"></i>
                                <div class="select">
                                    <select name="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-common" type="submit">
                                <i class="lni-search"></i> Search Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="categories-icon bg-light section-padding">
    <div class="container">
        <h1 class="section-title">Search By Category</h1>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <a  href="{{ route('products.index', ['category' => 'Hand-Tools']) }}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <h4>Equipment</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <a href="{{ route('products.index', ['category' => 'Electrical']) }}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fa-solid fa-plug"></i>
                        </div>
                        <h4>Electronics</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <a href="{{route('products.index', ['category' =>'General Safety'])}}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fa-solid fa-fire-extinguisher"></i>
                        </div>
                        <h4>General Safety</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <a href="{{route('products.index', ['category' =>'Gardening'])}}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fa-solid fa-tree-city"></i>
                            </div>
                        <h4>Garedning</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <a href="{{route('products.index', ['category' =>'Ladders'])}}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fa-solid fa-water-ladder"></i>
                        </div>
                        <h4>Ladders</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="featured section-padding">
<div class="container">
<h1 class="section-title">What people search</h1>
<div class="row">
    @foreach ($products as $product)

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">

<div class="featured-box">
<figure>

<a href="{{route('singleProduct.index', ['id'=>$product->id])}}"><img style="width: 250px; max-height:200px" class="img-fluid" src="{{ asset($product->product_image) }}" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">{{ $product->category->name }} </a>
<a href="#">> {{ $product->name }}</a>
</div>
<h4><a href="{{route('singleProduct.index', ['id'=>$product->id])}}">{{$product->name}}</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i>{{ $product->user->name ?? 'Owner' }}</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> {{ $product->user->address ?? 'Owner' }}</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i>{{ $product->category->name ?? 'Category' }} </a>
</span>
</div>
<p class="dsc">{{$product->description}}</p>
<div class="listing-bottom">
<h3 class="price float-left">{{$product->price_per_day}} </h3>
<a href="{{route('singleProduct.index', ['id'=>$product->id])}}" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>

</div>
@endforeach
{{-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="featured-box">
<figure>
<span class="price-save">
25% Save
</span>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="{{asset('assets/img/featured/drill2.webp')}}" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Electronic > </a>
<a href="#">Computers</a>
</div>
<h4><a href="ads-details.html">Apple Macbook Pro ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> Sara Doe</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> California, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Phones</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$289.00</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="featured-box">
<figure>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="{{asset('assets/img/featured/drill3.webp')}}" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Vehicle > </a>
<a href="#">Cars</a>
 </div>
<h4><a href="ads-details.html">Mercedes Benz E200 ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> Rossi Josh</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> Washington, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Others</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$199.80</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="featured-box">
<figure>
<span class="price-save">
10% Save
</span>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="{{asset('assets/img/featured/hummer1.avif')}}" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Others > </a>
<a href="#">Bags</a>
</div>
<h4><a href="ads-details.html">Brown Leather Bag ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> Maria Barlow</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> Chicago, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Gucci</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$206.90</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="featured-box">
<figure>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="{{asset('assets/img/featured/hummer2.webp')}}" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Electronic > </a>
<a href="#">Apple</a>
</div>
<h4><a href="ads-details.html">Iphonex 6 Plus Factor ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> David Givens</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> New York, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Apple</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$106.70</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="featured-box">
<figure>
<span class="price-save">
35% Save
</span>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="#"><img class="img-fluid" src="{{ asset('assets/img/featured/hummer3.webp')}}" alt=""></a>
</figure>
<div class="feature-content">
<div class="product">
<a href="#">Furniture > </a>
<a href="#">Home</a>
</div>
<h4><a href="ads-details.html">Wooden Dining Tabl ...</a></h4>
<div class="meta-tag">
<span>
<a href="#"><i class="lni-user"></i> John Smith</a>
</span>
<span>
<a href="#"><i class="lni-map-marker"></i> New York, US</a>
</span>
<span>
<a href="#"><i class="lni-tag"></i> Apple</a>
</span>
</div>
<p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
<div class="listing-bottom">
<h3 class="price float-left">$120.00</h3>
<a href="ads-details.html" class="btn btn-common float-right">View Details</a>
</div>
</div>
</div>
</div>
</div>
</div> --}}
</section>


<!-- <section class="cities bg-light section-padding">
<div class="container">
<h1 class="section-title">Browse By Cities</h1>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<a href="category.html" class="img-box">
<div class="img-box-content">
<h4>New York <span>(2116 Ads)</span></h4>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/cities/img1.jpg" alt="">
</div>
</a>
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<a href="category.html" class="img-box">
<div class="img-box-content">
<h4>California <span>(1073 Ads)</span></h4>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/cities/img2.jpg" alt="">
</div>
</a>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<a href="category.html" class="img-box">
<div class="img-box-content">
<h4>Washington <span>(1813 Ads)</span></h4>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/cities/img3.jpg" alt="">
</div>
</a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<a href="category.html" class="img-box">
<div class="img-box-content">
<h4>Chicago <span>(1603 Ads)</span></h4>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/cities/img4.jpg" alt="">
</div>
</a>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<a href="category.html" class="img-box">
<div class="img-box-content">
<h4>Boston <span>(1298 Ads)</span></h4>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/cities/img5.jpg" alt="">
</div>
</a>
</div>
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<a href="category.html" class="img-box">
<div class="img-box-content">
<h4>Phoenix <span>(103 Ads)</span></h4>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/cities/img6.jpg" alt="">
</div>
</a>
</div>
</div>
</div>
</section> -->


<section class="works section-padding">
<div class="container">
<div class="row">
<div class="col-12">
<h3 class="section-title">How It Works?</h3>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="works-item">
<div class="icon-box">
<i class="lni-users"></i>
</div>
<p>Create an Account</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="works-item">
<div class="icon-box">
<i class="lni-bookmark-alt"></i>
</div>
<p>Post Free Ad</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="works-item">
<div class="icon-box">
<i class="lni-thumbs-up"></i>
</div>
<p>Deal Done</p>
</div>
</div>
<hr class="works-line">
</div>
</div>
</section>




<!-- <section class="services section-padding">
<div class="container">
<div class="row">
<div class="col-12">
<h3 class="section-title">Key Features</h3>
</div>

<div class="col-md-6 col-lg-4 col-xs-12">
<div class="services-item wow fadeInRight" data-wow-delay="0.2s">
<div class="icon">
<i class="lni-leaf"></i>
</div>
<div class="services-content">
<h3><a href="#">Elegant Design</a></h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 col-xs-12">
<div class="services-item wow fadeInRight" data-wow-delay="0.4s">
<div class="icon">
<i class="lni-display"></i>
</div>
<div class="services-content">
<h3><a href="#">Responsive Design</a></h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 col-xs-12">
<div class="services-item wow fadeInRight" data-wow-delay="0.6s">
<div class="icon">
<i class="lni-color-pallet"></i>
</div>
<div class="services-content">
<h3><a href="#">Clean UI</a></h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 col-xs-12">
<div class="services-item wow fadeInRight" data-wow-delay="0.8s">
<div class="icon">
<i class="lni-emoji-smile"></i>
</div>
<div class="services-content">
<h3><a href="#">UX Friendly</a></h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 col-xs-12">
<div class="services-item wow fadeInRight" data-wow-delay="1s">
<div class="icon">
<i class="lni-pencil-alt"></i>
</div>
<div class="services-content">
<h3><a href="#">Easily Customizable</a></h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 col-xs-12">
<div class="services-item wow fadeInRight" data-wow-delay="1.2s">
<div class="icon">
<i class="lni-headphone-alt"></i>
</div>
<div class="services-content">
<h3><a href="#">Security Support</a></h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
</div>
</div>
</div>
</div>
</div>
</section> -->


<!-- <section id="pricing-table" class="section-padding">
<div class="container">
<div class="row">
<div class="col-12">
<h2 class="section-title">Pricing Plan</h2>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="table">
<div class="icon">
<i class="lni-gift"></i>
</div>
<div class="pricing-header">
<p class="price-value">$29</p>
 </div>
<div class="title">
<h3>Basic</h3>
</div>
<ul class="description">
<li>Free ad posting</li>
<li>No Featured ads availability</li>
<li>Access to limited features</li>
<li>For 30 days</li>
<li>100% Secure!</li>
</ul>
<button class="btn btn-common">Purchase</button>
</div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="table" id="active-tb">
<div class="icon">
<i class="lni-leaf"></i>
</div>
<div class="pricing-header">
<p class="price-value">$49</p>
</div>
<div class="title">
<h3>Standard</h3>
</div>
<ul class="description">
<li>Free ad posting</li>
<li>10 Featured ads availability</li>
<li>Access to unlimited features</li>
<li>For 30 days</li>
<li>100% Secure!</li>
</ul>
<button class="btn btn-common">Purchase</button>
</div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="table">
<div class="icon">
<i class="lni-layers"></i>
</div>
<div class="pricing-header">
<p class="price-value">$69</p>
</div>
<div class="title">
<h3>Premium</h3>
</div>
<ul class="description">
<li>Free ad posting</li>
<li>100 Featured ads availability</li>
<li>Access to unlimited features</li>
<li>For 30 days</li>
<li>100% Secure!</li>
</ul>
<button class="btn btn-common">Purchase</button>
</div>
</div>
</div>
</div>
</section> -->


{{-- <section class="counter-section section-padding">
<div class="container">
<div class="row">

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="lni-layers"></i></div>
<h2 class="counterUp">8325</h2>
<p>Ad Posted</p>
</div>
</div>

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="lni-users"></i></div>
<h2 class="counterUp">5487</h2>
<p>Members</p>
</div>
</div>

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="lni-briefcase"></i></div>
<h2 class="counterUp">2012</h2>
<p>Premium Ads</p>
</div>
</div>

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="lni-map"></i></div>
<h2 class="counterUp">200</h2>
<p>Locations</p>
</div>
</div>
</div>
</div>
</section> --}}


<section class="testimonial section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div id="testimonials" class="owl-carousel">
<div class="item">
<div class="img-thumb">
<img src="{{ asset('assets/img/testimonial/img1.png')}}" alt="">
</div>
<div class="testimonial-item">
<div class="content">
<p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor incidiunt labore velit dolore magna.</p>
<div class="info-text">
<h2><a href="#">Josh Rossi</a></h2>
<h4><a href="#">CEO of Fiverr</a></h4>
</div>
</div>
</div>
</div>
<div class="item">
<div class="item">
<div class="img-thumb">
<img src="{{ asset('assets/img/testimonial/img2.png')}}" alt="">
</div>
<div class="testimonial-item">
<div class="content">
<p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor incidiunt labore velit dolore magna.</p>
<div class="info-text">
<h2><a href="#">Jessica</a></h2>
<h4><a href="#">CEO of Dropbox</a></h4>
</div>
</div>
</div>
</div>
</div>
<div class="item">
<div class="item">
<div class="img-thumb">
<img src="{{ asset('assets/img/testimonial/img3.png')}}" alt="">
</div>
<div class="testimonial-item">
<div class="content">
<p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor incidiunt labore velit dolore magna.</p>
<div class="info-text">
<h2><a href="#">Johnny Zeigler</a></h2>
<h4><a href="#">CEO of Fiverr</a></h4>
</div>
</div>
</div>
</div>
</div>
<div class="item">
<div class="item">
<div class="img-thumb">
<img src="{{ asset('assets/img/testimonial/img4.png')}}" alt="">
</div>
<div class="testimonial-item">
<div class="content">
<p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor incidiunt labore velit dolore magna.</p>
<div class="info-text">
<h2><a href="#">Josh Rossi</a></h2>
<h4><a href="#">CEO of Fiverr</a></h4>
</div>
</div>
</div>
</div>
</div>
<div class="item">
<div class="item">
<div class="img-thumb">
<img src="{{ asset('assets/img/testimonial/img5.png')}}" alt="">
</div>
<div class="testimonial-item">
<div class="content">
<p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor incidiunt labore velit dolore magna.</p>
<div class="info-text">
<h2><a href="#">Priyanka</a></h2>
<h4><a href="#">CEO of Dropbox</a></h4>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<!-- <section id="blog" class="section-padding">

<div class="container">
<h2 class="section-title">
Blog Post
</h2>
<div class="row">
<div class="col-lg-4 col-md-6 col-xs-12 blog-item">

<div class="blog-item-wrapper">
<div class="blog-item-img">
<a href="single-post.html">
<img src="assets/img/blog/img-1.jpg" alt="">
</a>
</div>
<div class="blog-item-text">
<div class="meta-tags">
<span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By Admin</a></span>
<span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
</div>
<h3>
<a href="single-post.html">Recently Launching Our Iphone X</a>
</h3>
<p>
Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt reiciendis, molestias omnis soluta.
</p>
<a href="single-post.html" class="btn btn-common">Read More</a>
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-xs-12 blog-item">

<div class="blog-item-wrapper">
<div class="blog-item-img">
<a href="single-post.html">
<img src="assets/img/blog/img-2.jpg" alt="">
</a>
</div>
<div class="blog-item-text">
<div class="meta-tags">
<span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By Admin</a></span>
<span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
</div>
<h3>
<a href="single-post.html">How to get more ad views</a>
</h3>
<p>
Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt reiciendis, molestias omnis soluta.
</p>
<a href="single-post.html" class="btn btn-common">Read More</a>
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-xs-12 blog-item">

<div class="blog-item-wrapper">
<div class="blog-item-img">
<a href="single-post.html">
<img src="assets/img/blog/img-3.jpg" alt="">
</a>
</div>
<div class="blog-item-text">
<div class="meta-tags">
<span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By Admin</a></span>
<span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
</div>
<h3>
<a href="single-post.html">Writing a better product description</a>
</h3>
<p>
Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt reiciendis, molestias omnis soluta.
</p>
<a href="single-post.html" class="btn btn-common">Read More</a>
</div>
</div>

</div>
</div>
</div>
</section> -->


 <!-- <section class="subscribes section-padding"> -->
