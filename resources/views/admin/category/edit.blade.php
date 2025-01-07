@extends('layouts.master')

@section('title')
    Edit Category
@endsection

@section('content')
<div class="container-fluid px-4">

    <!-- Card for Edit Category Form -->
    <div class="card mt-4 shadow-lg rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Category</h4>
        </div>
        <div class="card-body">

            <!-- Display Errors -->
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- Edit Category Form -->
            <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" placeholder="Enter category name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Category Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter category description" required>{{ old('description', $category->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Category Description</label>
                    <input name="slug" id="slug" class="form-control"  placeholder="Enter category slug" required>{{ old('slug', $category->slug) }}</input>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Update Category</button>
            </form>

        </div>
    </div>

</div>
@endsection

@section('styles')
<style>
    .card-header {
        background-color: #007bff;
        color: white;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        font-size: 16px;
        padding: 12px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .alert {
        margin-top: 20px;
    }

    .alert ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .alert li {
        font-size: 14px;
    }
</style>
@endsection

@section('scripts')
<script>
    // JavaScript to close the alert on click
    document.querySelectorAll('.alert .close').forEach(function(button) {
        button.addEventListener('click', function() {
            this.closest('.alert').classList.add('fade');
        });
    });
</script>
@endsection
