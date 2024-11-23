<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function store(Request $request){

    // $request->validate([
    //     'user_id' => 'required',
    //     'category_id' => 'required',
    //     'name' => 'required|string',
    //     'description' => 'required|string',
    //     'price_per_day' => 'required|numeric',
    //     'status' => 'required|in:Available,Rented,Unavailable',
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    // ]);
    // dd($request);

    //handle file upload
    $imagePath = $request->file('image')->store('public/products');
    // dd($request->user_id);
    Product::create([
        'user_id' => auth()->id(),
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price_per_day' => $request->price_per_day,
        'status' => $request->status,
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
}

    // Show a single product
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    // Show form to edit a product
    public function edit($products_id)
    {
        $product = Product::findOrFail($products_id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $products_id)
    {
        // Validate the input data
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'price_per_day' => 'required|numeric',
            'status' => 'required|in:Available,Rented,Unavailable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($products_id);

        // Handle file upload if a new image is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products');
            $product->image = $imagePath;
        }

        // Update the product attribute
        $product->update([
            'user_id' => $product->user_id, // Keep the original user ID
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price_per_day' => $request->price_per_day,
            'status' => $request->status,
            'image' => $product->image, // Only update the image if new one is uploaded
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
