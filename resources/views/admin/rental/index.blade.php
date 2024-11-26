@extends('layouts.master')

@section('title')
    Rental Management
@endsection

@section('content')
<div class="container">


<div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light shadow-sm rounded">
        <h1 class="mb-0 text-primary" style="font-size: 2rem; font-weight: bold;">Rentals</h1>

    </div>


    <table class="table mt-4">
        <thead>
            <tr>
                <th>Product</th>
                <th>Owner</th>
                <th>Renter</th>
                <th>Status</th>
                <th>Price</th>
                <th>Start date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
                <tr>
                    <td>{{ $rental->product->name }}</td>
                    <td>{{ $rental->owner->name }}</td>
                    <td>{{ $rental->renter->name }}</td>
                    <td>{{ $rental->status }}</td>
                    <td>{{ $rental->price }}</td>
                    <td>{{ $rental->rental_start_date }}</td>
                    <td>{{ $rental->rental_end_date }}</td>
                    <td>
                        <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('rentals.show', $rental->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
