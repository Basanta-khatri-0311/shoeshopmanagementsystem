<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function seller_product_landing()
    {
        $products=Product::all();
        return view('products.products', ['products'=>$products]);
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
}
