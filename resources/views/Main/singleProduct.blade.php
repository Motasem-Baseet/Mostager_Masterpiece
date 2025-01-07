@extends('mainlayouts.mainMaster')

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
    <div class="row">
    <div style="padding-top:50px;" class="col-md-12">
    <div class="breadcrumb-wrapper">
    <h2 class="product-title">Details</h2>
    <ol class="breadcrumb">
    <li><a href="#">Home /</a></li>
    <li class="current">Details</li>
    </ol>
    </div>
    </div>
    </div>
    </div>
    </div>


    <div class="section-padding">
    <div class="container">

    <div class="product-info row">
    <div class="col-lg-8 col-md-12 col-xs-12">
    <div class="ads-details-wrapper">
    <div id="owl-demo" class="owl-carousel owl-theme">
    <div class="item">
    <div class="product-img">
    <img class="img-fluid" src="{{asset($product->product_image)}}" alt="">
    </div>
    <span class="price" >{{$product->price_per_day}}</span>
    </div>
    {{-- <div class="item">
    <div class="product-img">
    <img class="img-fluid" src="assets/img/productinfo/img3.jpg" alt="">
    </div>
    <span class="price">$1,550</span>
    </div>
    <div class="item">
    <div class="product-img">
    <img class="img-fluid" src="assets/img/productinfo/img2.jpg" alt="">
    </div>
    <span class="price">$1,550</span>
    </div> --}}
    </div>
    </div>
    <div class="details-box">
    <div class="ads-details-info">
    <h2>{{$product->name}}</h2>
    <div class="details-meta">
    <span><a href="#"><i class="lni-alarm-clock"></i> {{$product->created_at}}</a></span>
    <span><a href="#"><i class="lni-map-marker"></i> {{$product->user->address}}</a></span>
    <span><a href="#"><i class="fa-solid fa-phone"></i> {{$product->user->phone}}</a></span>
    </div>
    <p class="mb-4">{{$product->description}}</p>

    </ul>
    <p class="mb-4">
    Up for sale we have a vintage Raleigh Sport Men’s Bicycle. This bike does have some general wear and surface corrosion on some of the parts but is overall in good shape. It has been checked out and does work. Brakes and gears work. Seat is fully intact. Frame and fenders are in nice shape with minimal wear. A few minor dents in the fenders but most of the paint is intact.
    </p>
    </div>
    <div class="tag-bottom">
    <div class="float-left">
    <ul class="advertisement">
    <li>
    </li>
    <li>
    </li>
    <li>
    </li>
    </ul>
    </div>
    <div class="float-right">
    <div class="share">
    <div class="social-link">

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12">

    <aside class="details-sidebar">
    <div class="widget">
    <h4 class="widget-title">Get your needs</h4>
    <div class="form-basin">
        <form action="{{ route('cart.add')}}" method="POST">
            @csrf

            <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="product_name" value="{{ $product->name }}">
            <input type="hidden" name="product_price" value="{{ $product->price_per_day }}">
            <input type="hidden" name="product_image" value="{{ $product->product_image }}">
            <input type="hidden" name="rental_start_date" value="{{ $product->rental_start_date }}">
            <input type="hidden" name="rental_end_date" value="{{ $product->rental_end_date }}">
            <input type="hidden" name="quantity" value="{{$product->quantity}}">
            @error('product_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('product_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('product_price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('product_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="appointmentDate">Start Rent Date:</label>
            <input type="datetime-local" id="rental_start_date" name="rental_start_date">
            @error('startDate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="appointmentDate">End Rent Date:</label>
            <input type="datetime-local" id="rental_end_date" name="rental_end_date">
            @error('endDate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="quantity">Quantity: </label>
            <input type="number" id="quantity" name="quantity">

            <label for="notes">Additional Notes:</label>
            <textarea id="notes" name="notes" placeholder="Any special instructions or requests"></textarea>

            <button type="submit">Rent Now</button>
        </form>

      </div>
    </div>

   
    </div>
    </aside>

    </div>
    </div>

    </div>
    </div>


    <section class="subscribes section-padding">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="subscribes-inner">
    <div class="icon">
    <i class="lni-pointer"></i>
    </div>
    <div class="sub-text">
    <h3>Subscribe to Newsletter</h3>
    <p>and receive new ads in inbox</p>
    </div>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <form>
    <div class="subscribe">
    <input class="form-control" name="EMAIL" placeholder="Enter your Email" required="" type="email">
    <button class="btn btn-common" type="submit">Subscribe</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>

    <!-- Rental Alert Modal -->
<div  id="rentalModal" class="modal">
    <div style="background-color: :brown" class="modal-content">
        <span class="close">&times;</span>
        <p style="color: red">This date is already rented.</p>
    </div>
</div>


<script>
    // Disable past dates for both start and end date inputs
    let currentDate = new Date().toISOString().slice(0, 16);
    document.querySelector("#rental_start_date").setAttribute("min", currentDate);
    document.querySelector("#rental_end_date").setAttribute("min", currentDate);

    // Disable rented dates by comparing with already rented ranges
    let rentedDates = @json($rentals); // Pass the rented dates from the controller

    rentedDates.forEach(rental => {
        let rentedStart = new Date(rental.rental_start_date);
        let rentedEnd = new Date(rental.rental_end_date);

        // Disable all dates in the rented range
        let dateInputs = document.querySelectorAll("#rental_start_date, #rental_end_date");

        dateInputs.forEach(input => {
            input.addEventListener('input', function() {
                let selectedDate = new Date(this.value);
                if (selectedDate >= rentedStart && selectedDate <= rentedEnd) {
                    showModal();  // Show the rental message in modal
                    this.value = ''; // Clear the input if date is within rented range
                }
            });
        });
    });

    // Modal functionality
    function showModal() {
        let modal = document.getElementById("rentalModal");
        modal.style.display = "block"; // Show modal

        let closeBtn = document.querySelector(".close");
        closeBtn.onclick = function() {
            modal.style.display = "none"; // Close modal when close button is clicked
        }

        // Close the modal when clicked outside
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none"; // Close modal if user clicks outside
            }
        }
    }
</script>


