@extends('layouts.master')


@section('title')
    Category
@endsection

@section('content')
<div class="container-fluid px-4">

<div class="card mt-4">
    <div class="card-header">
        <h4>View Category <a href="{{'add-category'}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>

    </div>
    <div class="card body">
    @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                        @endif
    </div>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Description</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
</thead>
    <tbody>
        @foreach($category as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td><a href="{{ url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a></td>
            <td><a href="{{ url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection

