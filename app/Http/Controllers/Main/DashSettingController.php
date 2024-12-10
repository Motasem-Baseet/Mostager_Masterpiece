<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashSettingController extends Controller
{
    public function handleRequest(Request $request)
    {
        if ($request->isMethod('get')) {
            // Display the form
            $categories = Category::all();
            return view('main.dashsettingPage', compact('categories'));
        }

        if ($request->isMethod('post')) {
            // Process form submission
            $request->validate([
                'category_id' => 'required',
                'name' => 'required|string',
                'description' => 'required|string',
                'price_per_day' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle file upload
            $imagePath = $request->file('image')->store('assets/products');

            // Save the product
            Product::create([
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price_per_day' => $request->price_per_day,
                'product_image' => $imagePath,
            ]);

            return redirect()->route('main.dashsettingPage')->with('success', 'Product created successfully.');
        }
    }
}
