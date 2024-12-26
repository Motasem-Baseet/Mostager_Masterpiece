<?php

namespace App\Http\Controllers\Main;
use App\Models\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::query();

        // Check if a category filter is applied
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->get(); // Fetch filtered or all products
        return view('main.productsPage', compact('products'));
    }


}
