@extends('layouts.master')

@section('title')
  Main Dashboard
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="my-4 text-center text-primary">Admin Dashboard</h1>

    <div class="row">
        <!-- Total Products -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-4">{{ $productCount }}</p>
                    <a href="{{ url('admin/products') }}" class="btn btn-light btn-block">View Products</a>
                </div>
            </div>
        </div>

        <!-- Total Rentals -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Total Rentals</h5>
                    <p class="card-text display-4">{{ $rentalCount }}</p>
                    <a href="{{ url('admin/rentals') }}" class="btn btn-light btn-block">View Rentals</a>
                </div>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text display-4">{{ $categoryCount }}</p>
                    <a href="{{ url('admin/category') }}" class="btn btn-light btn-block">View Categories</a>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-4">{{ $userCount }}</p>
                    <a href="{{ url('admin/users') }}" class="btn btn-light btn-block">View Users</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Rentals Over the Last Year</h5>
                    <canvas id="rentalsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Recent Activities</h5>
                    <p class="card-text">Show any recent actions or system activities here...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script>
    const ctx = document.getElementById('rentalsChart').getContext('2d');
    const rentalsChart = new Chart(ctx, {
        type: 'line', // Change to 'bar' if you prefer a bar chart
        data: {
            labels: [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ],
            datasets: [{
                label: 'Rentals per Month',
                data: @json(array_values($rentalCountsByMonth)),
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.4,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
