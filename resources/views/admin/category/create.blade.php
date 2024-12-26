@extends('layouts.master')

@section('title')
    Add Category
@endsection

@section('content')
<div class="container-fluid px-4">

    <!-- Card for Add Category Form -->
    <div class="card mt-4 shadow-lg rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add Category</h4>
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

            <!-- Add Category Form -->
            <form action="{{ url('admin/add-category') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter category description" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Description</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter category slug" value="{{ old('slug') }}" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Save Category</button>
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
