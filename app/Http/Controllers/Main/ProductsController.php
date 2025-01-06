<?php

namespace App\Http\Controllers\Main;
use App\Models\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line


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

    public function search(Request $request)
    {
        $query = DB::table('products');

        if ($request->filled('customword')) {
            $query->where('name', 'like', '%' . $request->customword . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->get();



        return view('main.productsPage', compact('products'));
    }


    

}
