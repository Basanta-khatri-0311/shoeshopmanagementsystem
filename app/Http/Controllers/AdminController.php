<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function usermgm()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.manageuser', ['users' => $users]);

    }

    public function productmgm()
    {
        $products = Product::all();
        return view('admin.manageproducts', ['products' => $products]);
    }

    public function approveUser(User $user,Request $request)
    {
        $user= User::find($user->id);
        $user->user_status='active';
        $user->save();
        return redirect()->back();
    }

    public function declineUser(User $user,Request $request)
    {
        $user= User::find($user->id);
        $user->user_status='inactive';
        $user->save();
        return redirect()->back();
    }

    public function approveProduct(Product $product,Request $request)
    {
        $product= Product::find($product->id);
        $product->product_status='active';
        $product->save();
        return redirect()->back();
    }

    public function declineProduct(Product $product,Request $request)
    {
        $product= Product::find($product->id);
        $product->product_status='inactive';
        $product->save();
        return redirect()->back();
    }
}
