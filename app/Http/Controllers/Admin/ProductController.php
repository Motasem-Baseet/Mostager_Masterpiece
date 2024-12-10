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
        $products = Product::with('category')->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'price_per_day' => 'required|numeric|min:1',
        'status' => 'required|in:Available,Rented,Unavailable',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle file upload
    $filename = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/products');
        $image->move($destinationPath, $filename);
    }

    // Create a new product
    Product::create([
        'user_id' => auth()->id(),
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price_per_day' => $request->price_per_day,
        'status' => $request->status,
        'product_image' => $filename ? 'assets/products/' . $filename : null,
    ]);

    // Redirect with success message
    return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
}


    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit($products_id)
    {
        $product = Product::findOrFail($products_id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $products_id)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required|string',
        'description' => 'required|string',
        'price_per_day' => 'required|numeric',
        'status' => 'required|in:Available,Rented,Unavailable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($products_id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/products');
        $image->move($destinationPath, $filename);

        // Save the filename to the database
        $product->product_image = 'assets/products/' . $filename;
        $product->save();
    }


    $product->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price_per_day' => $request->price_per_day,
        'status' => $request->status,
        'product_image' => $product->product_image,
    ]);

    return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
}


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }

}

