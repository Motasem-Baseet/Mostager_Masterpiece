@extends('layouts.master')


@section('title')
    Users
@endsection

@section('content')
<div class="container-fluid px-4">

<div class="card mt-4">
    <div class="card-header">
        <h4>View Users</h4>
            <a href="{{'add-category'}}" class="btn btn-primary btn-sm float-end">Add Category</a>

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
        <td>Email</td>
        <td>Adress</td>
        <td>Phone Number</td>
        <td>Role</td>
        <td>Edit</td>
    </tr>
</thead>
    <tbody>
        @foreach($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->role_as == '1' ? 'Admin':'User' }}</td>
            <td><a href="{{ url('admin/users/'.$item->id)}}" class="btn btn-success">Edit</a></td>
            <td><a href="{{ url('admin/users/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection

