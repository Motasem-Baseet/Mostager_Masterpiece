<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


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
                'quantity' => 'required|min:1|max:100'

            ]);

            $filename = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/products');
        $image->move($destinationPath, $filename);
    }

            // Save the product
            Product::create([
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price_per_day' => $request->price_per_day,
                'product_image' => $filename ? 'assets/products/' . $filename : null,
                'quantity' => $request->quantity,
            ]);

            return redirect()->route('main.dashsettingPage')->with('success', 'Product created successfully.');
        }
    }

    public function updateProfile(Request $request)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255', // Updated to use 'name' instead of 'first_name' and 'last_name'
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
    ]);

    // Get the currently authenticated user
    $user = Auth::user();
    dd($user); // This will dump the user object to check its structure and values


    // Update the user profile information
    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->address = $request->address;

    // Save the updated user
    $user->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Profile updated successfully!');
}

}
