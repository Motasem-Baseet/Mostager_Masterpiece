@extends('mainlayouts.mainMaster')

<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div style="padding-top:50px;" class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">About Mostager</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{url('main/index')}}">Home /</a></li>
                        <li class="current">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12">
                <div class="about-wrapper">
                    <h2 class="intro-title">Why Mostager Stands Out</h2>
                    <p class="intro-desc">Mostager is more than just an auction platform; it’s a dynamic marketplace where users can engage in both bidding and tendering activities for unique items. Our innovative approach connects buyers and sellers with ease, creating a seamless, user-friendly experience. Whether you're looking to bid on exciting items or submit a tender to find the best offers, Mostager is designed with flexibility and simplicity in mind, helping you get the most out of every transaction.</p>
                    <a href="#" class="btn btn-common btn-lg">Explore Mostager</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12">
                <img style="height:100%;" class="img-fluid" src="{{asset('assets/img/about/about.png')}}" alt="">
            </div>
        </div>
    </div>
</section>




<section class="testimonial section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="testimonials" class="owl-carousel">
                    <div class="item">
                        <div class="img-thumb">
                            <img src="{{asset('assets/img/testimonial/img1.png')}}" alt="">
                        </div>
                        <div class="testimonial-item">
                            <div class="content">
                                <p class="description">Mostager provided a fantastic experience for me as both a bidder and a seller. The platform's intuitive design and great features make it easy to navigate and find what I'm looking for.</p>
                                <div class="info-text">
                                    <h2><a href="#">Josh Rossi</a></h2>
                                    <h4><a href="#">CEO of Fiverr</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="img-thumb">
                            <img src="{{asset('assets/img/testimonial/img2.png')}}" alt="">
                        </div>
                        <div class="testimonial-item">
                            <div class="content">
                                <p class="description">I love the flexibility of Mostager. The ability to either place a bid or submit a tender has made it my go-to platform for auctions and tenders.</p>
                                <div class="info-text">
                                    <h2><a href="#">Priyanka</a></h2>
                                    <h4><a href="#">CEO of Dropbox</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more testimonials as needed -->
                </div>
            </div>
        </div>
    </div>
</section>
