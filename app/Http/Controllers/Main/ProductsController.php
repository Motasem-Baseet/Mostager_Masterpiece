<?php

namespace App\Http\Controllers\Main;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(){
        $products = Product::all(); // Fetch all products from the database

        return view('main.productsPage', compact('products'));
    }

}
