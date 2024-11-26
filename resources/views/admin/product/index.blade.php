@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
<div class="container-fluid px-4">

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light shadow-sm rounded">
        <h1 class="mb-0 text-primary" style="font-size: 2rem; font-weight: bold;">Products</h1>
        <a href="{{ url('admin/add-products') }}" class="btn btn-success btn-lg d-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i> Add New Product
        </a>
    </div>

    <!-- Products Table Section -->
    <div class="card shadow-sm rounded">
        <div class="card-body">
            <!-- Products Table -->
            <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price Per Day</th>
                        <th>Picture</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>${{ $product->price_per_day }}</td>
                        <td>
                            <img src="{{ asset($product->product_image) }}" alt="Product Image" style="max-height: 80px; max-width: 120px; object-fit: cover;">
                        </td>
                        <td>
                            <span class="badge {{ $product->status == 'Available' ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->status }}
                            </span>
                        </td>
                        <td class="d-flex gap-2">
                            <!-- Edit Button -->
                            <a href="{{ url('admin/edit-products', $product->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ url('admin/delete-products/' . $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>

                            <!-- View Button -->
                            <a href="{{ url('admin/show-products', $product->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-3 d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
@endsection
