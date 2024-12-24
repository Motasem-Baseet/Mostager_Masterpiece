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
        // Retrieve only the cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->get();
        if($cartItems->isNotEmpty()){
            $cartItem = $cartItems[0];
            return view('main.cartPage', compact('cartItem'));
        } else
        return view('main.cartPage');


        // dd($cartItem);


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

            $cartItem = Cart::create([
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
            // dd($cartItem);
            return view('main.cartPage', compact('cartItem'));


        }
        private function calculatePrice($productId, $quantity, $startDate, $endDate){

            $product = Product::find($productId);
            $hours = (strtotime($endDate) - strtotime($startDate))/86400;
            return $product->price_per_day * $quantity * $hours;
    }

    public function removeFromCart($cartItemId)
    {
        $cartItem = Cart::where('user_id', auth()->id())->find($cartItemId);

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Item not found in your cart.');
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from the cart.');
    }


}
