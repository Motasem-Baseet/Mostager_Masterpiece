<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Rental;
use App\Models\User;

use Illuminate\Http\Request;

class singleProductcontoller extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);

        // Get all the rental dates for the product
        $rentals = Rental::where('product_id', $id)
            ->where('status', 'rented')
            ->get();

        return view('main.singleProduct', compact('product', 'rentals'));
    }



}

