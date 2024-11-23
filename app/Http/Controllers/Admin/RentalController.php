<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();  // Get all rental records
        return view('admin.rental.index', compact('rentals'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('admin.rental.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'owner_id' => 'required|exists:users,id',
            'renter_id' => 'required|exists:users,id',
            'status' => 'required|in:Available,Rented,Unavailable',
            'rental_start_date' => 'required|date',
            'rental_end_date' => 'required|date|after:rental_start_date',
            'price' => 'required|numeric',
            'deposit' => 'required|numeric',
        ]);

        Rental::create([
            'product_id' => $request->product_id,
            'owner_id' => $request->owner_id,
            'renter_id' => $request->renter_id,
            'status' => $request->status,
            'rental_start_date' => $request->rental_start_date,
            'rental_end_date' => $request->rental_end_date,
            'price' => $request->price,
            'deposit' => $request->deposit,
        ]);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental created successfully.');
    }


    public function show($id)
    {
        $rental = Rental::findOrFail($id);
        return view('admin.rental.show', compact('rental'));
    }

}
