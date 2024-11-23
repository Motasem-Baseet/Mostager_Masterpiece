@extends('layouts.master')


@section('title')
    Add Product
@endsection

@section('content')

<div class="container">
        <h1>Add New Product</h1>
        <form action="{{ url('admin/add-products') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            @foreach($category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="price_per_day">Price per Day</label>
        <input type="number" class="form-control" id="price_per_day" name="price_per_day" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Available">Available</option>
            <option value="Rented">Rented</option>
            <option value="Unavailable">Unavailable</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>




@endsection

