<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function seller_product_landing(){
        return view('products.products');
    }
}
