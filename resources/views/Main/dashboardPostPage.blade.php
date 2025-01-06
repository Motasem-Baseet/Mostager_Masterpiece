@extends('mainlayouts.user-dashboard')

@section('usercontent')
<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div style="padding-top:50px" class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Rentals</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Home /</a></li>
                        <li class="current">My Ads</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="section-padding">
    <div class="container">
        <div class="row">
            @include('mainlayouts.inc.user-dashboard-sidebar')

            <div class="col-sm-12 col-md-8 col-lg-9">
                <div class="page-content">
                    <div class="inner-box">
                        <div class="dashboard-box">
                            <h2 class="dashbord-title">My Rentals</h2>
                        </div>
                        <div class="dashboard-wrapper">

                            <table class="table table-responsive dashboardtable tablemyads">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Rented By</th> <!-- Add Rented By column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rentals as $rental)
                                    <tr data-category="{{ $rental->status }}">



                                        <td data-title="Title">
                                            <h3>{{ $rental->product->name }}</h3>
                                        </td>
                                        <td data-title="Category"><span class="adcategories">{{ $rental->product->category->name }}</span></td>

                                        <td data-title="Price">
                                            <h3>${{ $rental->price }}</h3>
                                        </td>
                                        <td data-title="Rented By">
                                            @if($rental->status == 'rented')
                                                <h5>{{ $rental->renter->name }}</h5>
                                                <p>Rental Dates: {{ $rental->rental_start_date }} to {{ $rental->rental_end_date }}</p>
                                            @else
                                                <span>Not Rented</span>
                                            @endif
                                        </td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
