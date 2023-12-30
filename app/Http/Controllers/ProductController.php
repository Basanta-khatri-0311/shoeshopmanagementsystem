<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function seller_product_landing(){
        return view('products.products');
    }

    public function seller_product_add(){
        return view('products.addproducts');
    }
    public function add_product(Request $request){
        $data =$request->validate([
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|decimal',
            'product_image'=>'required',

        ]);

        
    }
}
