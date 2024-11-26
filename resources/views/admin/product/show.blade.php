@extends('layouts.master')

@section('title')
    Product Details
@endsection

@section('content')
    <div class="container py-4">
        <!-- Page Title -->
        <h1 class="text-center mb-4 text-primary">Product Details</h1>

        <!-- Product Card -->
        <div class="card shadow-lg rounded mx-auto" style="max-width: 600px;">
            <!-- Product Image -->
            <img src="{{ asset($product->product_image) }}" alt="Product Image" style="max-height: 400px; object-fit: cover;">



            <!-- Card Body -->
            <div class="card-body">
                <h3 class="card-title text-center text-primary">{{ $product->name }}</h3>
                <hr>

                <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>Price per day:</strong> ${{ $product->price_per_day }}</p>
                <p class="card-text">
                    <strong>Status:</strong>
                    <span class="badge
                        {{ $product->status == 'Available' ? 'bg-success' : ($product->status == 'Rented' ? 'bg-warning' : 'bg-danger') }}">
                        {{ $product->status }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="{{ url('admin/products') }}" class="btn btn-primary btn-lg px-4">
                <i class="bi bi-arrow-left"></i> Back to Products
            </a>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .card img {
        border-bottom: 2px solid #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .badge {
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
        border-radius: 12px;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
@endsection
