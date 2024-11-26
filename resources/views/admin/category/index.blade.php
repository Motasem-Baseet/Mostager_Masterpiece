@extends('layouts.master')

@section('title')
    Categories
@endsection

@section('content')
<div class="container-fluid px-4">

    <!-- Card Header with Add Category Button -->
    <div class="card mt-4 shadow-sm rounded">
    <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light shadow-sm rounded">
    <h1 class="mb-0 text-primary" style="font-size: 2rem; font-weight: bold;">Categories</h1>
    <a href="{{ url('/admin/add-category') }}" class="btn btn-success btn-lg d-flex align-items-center">
        <i class="bi bi-plus-circle me-2"></i> Add Category
    </a>
</div>
    



        <!-- Success Message Alert -->
        @if(session('message'))
        <div class="card-body">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>
        @endif
    </div>

    <!-- Table for Categories -->
    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ url('admin/edit-category/'.$item->id) }}" class="btn btn-success btn-sm">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/delete-category/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
        {{ $category->links('pagination::bootstrap-4') }}
    </div>
        </div>
    </div>

</div>
@endsection
