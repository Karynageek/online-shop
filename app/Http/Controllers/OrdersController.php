<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller {

    public function index() {
        $orders = auth()->user()->orders()->with('products')->get();

        return view('order.my-orders')->with('orders', $orders);
    }

    public function show(Order $order) {
        $products = $order->products;

        return view('order.my-order')->with([
                    'order' => $order,
                    'products' => $products,
        ]);
    }

}
