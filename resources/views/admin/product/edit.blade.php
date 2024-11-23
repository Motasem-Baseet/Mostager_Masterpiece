@extends('layouts.master')

@section('title')
    Edit Product
@endsection

@section('content')
<div class="container-fluid px-4">

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Product</h1>
    </div>

    <!-- Edit Product Form -->
    <div class="card shadow-sm rounded">
        <div class="card-body">

            <!-- Form Start -->
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="form-group mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>

                <!-- Category Selection -->
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Description -->
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                </div>

                <!-- Price per Day -->
                <div class="form-group mb-3">
                    <label for="price_per_day">Price per Day</label>
                    <input type="number" class="form-control" id="price_per_day" name="price_per_day" value="{{ $product->price_per_day }}" required>
                </div>

                <!-- Status Selection -->
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Available" {{ $product->status == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Rented" {{ $product->status == 'Rented' ? 'selected' : '' }}>Rented</option>
                        <option value="Unavailable" {{ $product->status == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <!-- Product Image -->
                <div class="form-group mb-3">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="form-text text-muted">Current Image: {{ $product->image }}</small>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-save"></i> Update Product
                </button>
            </form>
            <!-- Form End -->

        </div>
    </div>

</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
    }

    .card-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px;
        font-size: 16px;
    }

    .btn {
        font-size: 16px;
        padding: 10px 20px;
    }

    .btn-lg {
        padding: 12px 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .form-text {
        font-size: 12px;
        color: #6c757d;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
@endsection
