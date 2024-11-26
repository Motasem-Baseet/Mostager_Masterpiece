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
    $imagePath = $request->file('image')->store('assets/products');
    // dd($request->user_id);
    Product::create([
        'user_id' => auth()->id(),
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price_per_day' => $request->price_per_day,
        'status' => $request->status,
        'product_image' => $imagePath,
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

    // Handle file upload if a new image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/products');
        $image->move($destinationPath, $filename);

        // Save the filename to the database
        $product->product_image = 'assets/products/' . $filename;
        $product->save();
    }


    // Update product attributes
    $product->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price_per_day' => $request->price_per_day,
        'status' => $request->status,
        'product_image' => $product->product_image, // Save updated image or keep the old one
    ]);

    return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
}


    public function destroy($id)
    {
        // Find the product by ID and delete it
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect or return a response
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }

}

