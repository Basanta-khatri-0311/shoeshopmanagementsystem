<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->role;
            if ($usertype == 'admin') {
                return view('admin.adminlanding');
            }
            elseif($usertype=='trader'){
                $products = Product::all();
                return view('products.sellerlanding', ['products' => $products]);
            }
            elseif($usertype=='customer'){
                return view('user.userlanding');
            }
            else{
                return redirect()->back();
            }
        }
    }
}
