<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Rental;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();

        if ($cartItems->isNotEmpty()) {
            $cartItem = $cartItems[0];
            return view('main.checkoutPage', compact('cartItem'));
        }

        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    public function processCheckout(Request $request)
    {
        // Get the cart item
        $cartItem = Cart::where('user_id', auth()->id())->first();

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Update product status to 'rented'
        $product = Product::find($cartItem->product_id);
        if ($product) {
            $product->update(['status' => 'rented']);
        }
// dd($product);
        // Insert data into rentals table
        Rental::create([
            'product_id' => $cartItem->product_id,
            'owner_id' => $product->user_id,
            'renter_id' => auth()->id(),
            'status' => 'rented',
            'rental_start_date' => $cartItem->rental_start_date,
            'rental_end_date' => $cartItem->rental_end_date,
            'price' => $cartItem->total_price,
            'deposit' => null,
        ]);

        // Remove the item from the cart
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Checkout completed successfully!');
    }
}
