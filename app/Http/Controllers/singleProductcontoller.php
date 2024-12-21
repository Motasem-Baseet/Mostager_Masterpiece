<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

class singleProductcontoller extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);
        return view('main.singleProduct', compact('product'));
    }
}
