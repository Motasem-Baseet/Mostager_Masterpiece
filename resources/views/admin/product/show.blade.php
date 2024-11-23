@extends('layouts.master')


@section('title')
    Edit Category
@endsection

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <div class="card">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text"><strong>Price per day:</strong> {{ $product->price_per_day }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $product->status }}</p>
            </div>
        </div>
        <a href="{{ url('admin/products') }}" class="btn btn-primary mt-3">Back to Products</a>
    </div>
@endsection
