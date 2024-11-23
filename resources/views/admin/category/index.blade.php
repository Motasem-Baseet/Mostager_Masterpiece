@extends('layouts.master')

@section('title')
    Categories
@endsection

@section('content')
<div class="container-fluid px-4">

    <!-- Card Header with Add Category Button -->
    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">View Categories</h4>
            <a href="{{ 'add-category' }}" class="btn btn-light btn-sm float-end">Add Category</a>
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
        </div>
    </div>

</div>
@endsection
