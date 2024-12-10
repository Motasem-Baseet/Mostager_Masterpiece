@extends('layouts.master')

@section('title')
    Edit Product
@endsection

@section('content')
<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Edit Product</h1>
    </div>

    <!-- Edit Product Form -->
    <div class="card shadow-lg border-0 rounded">
        <div class="card-body p-4">

            <!-- Form Start -->
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>

                <!-- Category Selection -->
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Description -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
                </div>

                <!-- Price per Day -->
                <div class="form-group mb-3">
                    <label for="price_per_day" class="form-label">Price per Day</label>
                    <input type="number" class="form-control" id="price_per_day" name="price_per_day" value="{{ $product->price_per_day }}" required>
                </div>

                <!-- Status Selection -->
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Available" {{ $product->status == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Rented" {{ $product->status == 'Rented' ? 'selected' : '' }}>Rented</option>
                        <option value="Unavailable" {{ $product->status == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <!-- Product Image -->
                <div class="form-group mb-4">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($product->product_image)
                        <div class="mt-3">
                            {{-- <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" class="img-thumbnail" style="max-height: 200px;"> --}}
                            <img src="{{ asset( $product->product_image) }}" alt="Product Image" style="max-height: 80px; max-width: 120px; object-fit: cover;">

                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        <i class="bi bi-save"></i> Update Product
                    </button>
                </div>
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

    .form-label {
        font-weight: bold;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        padding: 10px;
        font-size: 16px;
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

    .img-thumbnail {
        border-radius: 10px;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
@endsection
