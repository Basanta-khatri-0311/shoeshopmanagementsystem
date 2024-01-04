<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**for showing products in table along with edit and delete buttons */
    public function seller_product_landing()
    {
        $products = Product::all();
        return view('products.products', ['products' => $products]);
    }
    public function seller_product_add()
    {
        return view('products.addproducts');
    }

    public function orders()
    {
        return view('products.orders');
    }

    public function add_product(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user_id = Auth::id();

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
        }

        $newproduct = Product::create($data);
        $newproduct->user_id = $user_id;
        return redirect(route('product.index'));

    }

    public function edit_products(Product $product)
    {
        return view('products.editproduct', ['product' => $product]);
    }

    // public function userdashboard()
    // {
    //     return view('user.userlanding');
    // }


    public function update_products(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product updated successfuly');
    }

    public function delete_products(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted successfuly');
    }
}
