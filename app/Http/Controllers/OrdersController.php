<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Order;
use App\User;
use App\OrderProduct;
use Auth;

class OrdersController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function create() {
        $products = session('cart');
        $total = 0;
        foreach ($products as $key => $value) {
            $total += $value['price'] * $value['quantity'];
        }
        return View::make('order.create')
                        ->with('products', $products)
                        ->with('total', $total);
    }

    public function store(Request $request) {
        $order = new Order();
        $order_product = new OrderProduct();

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $products = session('cart');
        $total = 0;
        $product_id = null;
        foreach ($products as $product_id => $value) {
            $total += $value['price'] * $value['quantity'];
        }
        $order->user_id = Auth::user()->id;
        $order->billing_name = $user->name;
        $order->billing_email = $request->input('billing_email');
        $order->billing_phone = $request->input('billing_phone');
        $order->billing_address = $request->input('billing_address');
        $order->billing_name_on_card = $request->input('billing_name_on_card');
        $order->billing_total = $total;
        $order->save();
        foreach ($products as $product_id => $value) {
            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $product_id;
            $order_product->save();
        }

        session()->forget('cart');

        return Redirect::to('/shop/view');
    }

}
