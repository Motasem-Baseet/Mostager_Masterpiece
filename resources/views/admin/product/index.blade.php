@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
<div class="container-fluid px-4">

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Products</h1>
        <a href="{{ url('admin/add-products') }}" class="btn btn-primary btn-lg">Add New Product</a>
    </div>

    <!-- Products Table Section -->
    <div class="card shadow-sm rounded">
        <div class="card-body">

            <!-- Products Table -->
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price Per Day</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
                        <td>${{ $product->price_per_day }}</td>
                        <td>
                            <span class="badge {{ $product->status == 'Available' ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->status }}
                            </span>
                        </td>
                        <td class="d-flex">
                            <!-- Edit Button -->
                            <a href="{{ url('admin/edit-products', $product->id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ url('admin/delete-products', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm me-2">
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
        </div>
    </div>

</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 8px;
    }

    .thead-dark {
        background-color: #343a40;
        color: white;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .btn {
        padding: 8px 16px;
        font-size: 14px;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 13px;
    }

    .btn-warning {
        background-color: #ffca28;
        border-color: #ffca28;
    }

    .btn-warning:hover {
        background-color: #ffb300;
        border-color: #ffb300;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #138496;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }

    .badge {
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 12px;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
@endsection
