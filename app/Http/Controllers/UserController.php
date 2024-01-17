<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class UserController extends Controller
{
    public function userorders()
    {
        $user = auth()->user();

        // Fetch orders for the currently logged-in user
        $orders = Order::with('product')
            ->where('user_id', $user->id)
            ->get();
        return view('user.orderhistory', ['orders' => $orders]);
    }
    

}
