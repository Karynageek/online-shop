<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller {

    public function index() {
        // $orders = auth()->user()->orders; // n + 1 issues

        $orders = auth()->user()->orders()->with('products')->get(); // fix n + 1 issues

        return view('order.my-orders')->with('orders', $orders);
    }

    public function show(Order $order) {
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }

        $products = $order->products;

        return view('order.my-order')->with([
                    'order' => $order,
                    'products' => $products,
        ]);
    }

}
