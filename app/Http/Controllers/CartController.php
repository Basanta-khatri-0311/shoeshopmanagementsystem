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
    public function show_cart_product()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart.show', compact('cartItems'));
    }

    public function removeFromCart($productId)
    {
        // Find the cart item and delete it
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        // Redirect back to the cart page with a success message
        return redirect()->route('cart.show')->with('success', 'Product removed from cart!');
    }
    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1', // Adjust validation rules as needed
        ]);

        // Find the cart item by user ID and product ID
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->firstOrFail();

        $product = Product::findOrFail($productId);
        $originalPrice = $product->price;

        // Update the quantity and calculate the updated price
        $updatedQuantity = $request->input('quantity');
        $updatedPrice = $originalPrice * $updatedQuantity;

        // Update the quantity and price in the cart and save to the database
        $cartItem->update([
            'quantity' => $updatedQuantity,
            'price_at_purchase' => $updatedPrice,
        ]);

        // Redirect back to the cart page
        return redirect()->route('cart.show');
    }




}
