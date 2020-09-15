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
        $orders = DB::table('orders')
                ->join('order_product', 'order_product.order_id', '=', 'orders.id')
      //          ->where('category_id', $id)
                ->paginate(6);
        return View::make('admin_order.view')
                        ->with('orders', $orders);
    }


}
