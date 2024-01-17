<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function checkout()
    {
        // Step 1: Create a new order for each cart item
        $cartItems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartItems as $cartItem) {
            Order::create([
                'user_id' => Auth::id(),
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'total_price' => $cartItem->price_at_purchase,
                // Add other order details as needed
            ]);
        }

        // Step 2: Remove cart items
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
