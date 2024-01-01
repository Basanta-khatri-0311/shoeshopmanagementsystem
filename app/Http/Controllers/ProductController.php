<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_product_landing()
    {
        $products = Product::all();
        return view('products.allproducts', ['products' => $products]);
    }
    
    public function seller_product_landing()
    {
        $products = Product::all();
        return view('products.products', ['products' => $products]);
    }
    public function seller_product_add()
    {
        return view('products.addproducts');
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
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
        }

        $newproduct = Product::create($data);

        return redirect(route('product.index'));

    }

    public function edit_products(Product $product)
    {
        return view('products.editproduct', ['product' => $product]);
    }
    public function services()
    {
        return view('service');
    }
    public function aboutus()
    {
        return view('aboutus');
    }
    public function contact()
    {
        return view('contact');
    }

    
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
