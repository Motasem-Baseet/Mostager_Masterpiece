<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;



class CheckoutController extends Controller
{
    public function index()
    {
        $cartItem = Cart::where('user_id', auth()->id())->get();

        return view('main.checkoutPage', compact('cartItem'));
    }



    public function process(Request $request)
    {
        // Assuming $cartItem is available through the authenticated user
        $cartItem = auth()->user()->cartItem;

        if ($cartItem) {
            DB::transaction(function () use ($cartItem) {
                // Update the product status to 'rented'
                $cartItem->product->update(['status' => 'rented']);

                // Optionally delete the cart item after checkout
                $cartItem->delete();
            });

            return redirect()->route('products.index')->with('success', 'Checkout successful! Product has been rented.');
        } else {
            return redirect()->route('cart.index')->with('error', 'No items in the cart.');
        }
    }

}
