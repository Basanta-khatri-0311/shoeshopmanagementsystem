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
        
        $user = Auth::user();

        
        $product = Product::findOrFail($productId);

        
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 1, 
            'price_at_purchase' => $product->price,
        ]);

        
        return redirect()->route('home')->with('success', 'Product added to cart!');
    }
    public function show_cart_product()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart.show', compact('cartItems'));
    }

    public function removeFromCart($productId)
    {
        
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

       
        return redirect()->route('cart.show')->with('success', 'Product removed from cart!');
    }
    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

       
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->firstOrFail();

        $product = Product::findOrFail($productId);
        $originalPrice = $product->price;

        
        $updatedQuantity = $request->input('quantity');
        $updatedPrice = $originalPrice * $updatedQuantity;

        
        $cartItem->update([
            'quantity' => $updatedQuantity,
            'price_at_purchase' => $updatedPrice,
        ]);

        return redirect()->route('cart.show');
    }
}
