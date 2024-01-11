<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->role;
            if ($usertype == 'admin') {
                return view('admin.adminlanding');
            }
            elseif($usertype=='trader'){
                $products = Product::where('user_id', Auth::id())->get();
                return view('products.sellerlanding', ['products' => $products]);
            }
            elseif($usertype=='customer'){
                $search= $request['search'] ?? "";

                if($search != "")
                {
                   $allProducts=Product::where('name','Like','%'.$search.'%')->get();
                }
                else
                {
                    $allProducts = Product::all();
                }
               
                return view('user.userlanding', ['allProducts' => $allProducts,'search' => $search]);
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function services()
    {
        return view('home.service');
    }
    public function aboutus()
    {
        return view('home.aboutus');
    }
    public function contact()
    {
        return view('home.contact');
    }
}
