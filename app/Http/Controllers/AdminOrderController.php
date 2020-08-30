<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Order;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function show() {
        $orders = Order::paginate(5);

        return View::make('admin_order.view')
                        ->with('orders', $orders);
    }

    public function create() {
        return View::make('admin_order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(OrderRequest $request) {
        $order = new Order;
        $order->user_name = $request->input('user_name');
        $order->user_email = $request->input('user_email');
        $order->user_phone = $request->input('user_phone');
        $order->user_comment = $request->input('user_comment');
        $order->user_id = Auth::user()->id;
        $order->product_id = $request->input('product_id');
        $order->status = $request->input('status');
        $order->save();

        return Redirect::to('admin/order/view');
    }

//    public function edit($id) {
//        $order = Order::find($id);
//        return View::make('admin_order.update')
//                        ->with('order', $order);
//    }
//
//    public function update($id, OrderRequest $request) {
//        $order = Order::find($id);
//        $order->name = $request->input('name');
//        $order->save();
//
//        return Redirect::to('admin/order/view');
//    }

    public function destroy($id) {
        $order = Order::find($id);
        if ($order->delete()) {
            return Redirect::to('admin/order/view');
        }
    }

}
