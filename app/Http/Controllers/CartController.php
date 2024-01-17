<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the product by ID
        $product = Product::findOrFail($productId);

        // Add the product to the cart
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 1, // You can adjust the quantity as needed
            'price_at_purchase' => $product->price,
        ]);

        // Optionally, you can redirect the user back to the userlanding page
        return redirect()->route('home')->with('success', 'Product added to cart!');
    }
}
