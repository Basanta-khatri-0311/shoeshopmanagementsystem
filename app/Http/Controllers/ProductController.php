<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;


class ProductController extends Controller
{

    public function seller_product_landing()
    {
        $user = Auth::user();

        $products = $user->products()->paginate(5);

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
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif', 
        ]);

        $user_id = Auth::id();

        $data['user_id'] = $user_id;

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimage'), $imagename);
            $data['product_image'] = 'postimage/' . $imagename;
        }

        $newproduct = Product::create($data);

        return redirect(route('product.index'));
    }


    public function edit_products(Product $product)
    {
        return view('products.editproduct', ['product' => $product]);
    }



    public function update_products(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif', 
        ]);

        if ($request->hasFile('product_image')) {

            $image = $request->file('product_image');

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('postimage'), $imagename);

            $data['product_image'] = 'postimage/' . $imagename;
        }
        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product updated successfully');
    }
    public function delete_products(Product $product)
    {
        $product->delete();

        return redirect(route('product.index'))->with('success', 'Product deleted successfuly');
    }

    public function orderList()
    {
        $user = auth()->user();

        $userProducts = $user->products;

        $orders = Order::whereIn('product_id', $userProducts->pluck('id'))->get();

        return view('products.orders', compact('orders'));
    }
}
