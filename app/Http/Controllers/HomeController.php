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
            } elseif ($usertype == 'trader') {
                $products = Product::where('user_id', Auth::id())->get();
                return view('products.sellerlanding', ['products' => $products]);
            } elseif ($usertype == 'customer') {
                $query = Product::query();
    
                // Search functionality
                $search = $request->input('search') ?? "";
                if ($search != "") {
                    $query->where('name', 'like', '%' . $search . '%');
                }
    
                // Sorting functionality
                $sort = $request->input('sort');
                switch ($sort) {
                    case 'price_lo_hi':
                        $query->orderBy('price');
                        break;
                    case 'price_hi_lo':
                        $query->orderByDesc('price');
                        break;
                    case 'newest':
                        $query->latest();
                        break;
                    default:
                        // Default sorting if no valid option is provided
                        $query->orderBy('created_at', 'desc');
                }
    
                $allProducts = $query->get();
    
                return view('user.userlanding', ['allProducts' => $allProducts, 'search' => $search]);
            } else {
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
