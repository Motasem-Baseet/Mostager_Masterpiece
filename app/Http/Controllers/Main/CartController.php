<?php

namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {


        $cartItems = Cart::all();

        if ($cartItems->isEmpty()) {
            return view('main.cartPage', ['cartItems' => null]);
        }

        return view('main.cartPage', compact('cartItems'));
    }

    public function addToCart(Request $request){

        // dd($request->all());




        // $request->validate([
            //     'product_id' => 'required|exists:products,id', // Correct: "exists" is the correct rule
            //     'rental_start_date' => 'required|date',
            //     'rental_end_date' => 'required|date|after_or_equal:rental_start_date',
            //     'quantity' => 'required|integer|min:1',
            // ]);


            $existingItem = Cart::where('user_id', auth()->id())->first();

            if($existingItem){
                return response()->json([
                    'message'=>'You can only add one item to your cart'
                ], 400);
            }

            $cartItems = Cart::create([
                'user_id'=>auth()->id(),
                'product_id'=>$request->product_id,
                'rental_start_date'=>$request->rental_start_date,
                'product_name'=>$request->product_name,
                'rental_end_date'=>$request->rental_end_date,
                'quantity'=>$request->quantity,
                'product_image' => $request->product_image,
                'total_price'=>$this->calculatePrice($request->product_id, $request->quantity, $request->rental_start_date, $request->rental_end_date),
                'status'=>'pending',
            ]);
            // dd($request->quantity);

            return view('main.cartPage', compact('cartItems'));


        }
        private function calculatePrice($productId, $quantity, $startDate, $endDate){

            $product = Product::find($productId);
            $hours = (strtotime($endDate) - strtotime($startDate))/86400;
            return $product->price_per_day * $quantity * $hours;
    }

    public function removeFromCart($cartItemId)
    {
        // Find the cart item by its ID and ensure it belongs to the authenticated user
        $cartItem = Cart::where('user_id', auth()->id())->find($cartItemId);

        // If the cart item doesn't exist or the user is not the owner, return an error
        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Item not found in your cart.');
        }

        // Delete the cart item
        $cartItem->delete();

        // Redirect back to the cart page with a success message
        return redirect()->route('cart.index')->with('success', 'Item removed from the cart.');
    }


}
