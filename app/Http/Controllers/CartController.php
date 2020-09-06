<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Auth;

class CartController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function addToCart($id) {
        if (session()->has('cart')) {
            $oldCart = session()->get('cart');
            $cartdata = $oldCart;
            if (array_key_exists('product_id', $cartdata)) {
                if (in_array($id, $cartdata)) {
                    $cartdata['quantity'] += 1;
                } else {
                    $cartdata['product_id'] = $id;
                    $cartdata['quantity'] = 1;
                }
            }
        } else {
            $cartdata = [];
            $cartdata['product_id'] = $id;
            $cartdata['quantity'] = 1;
        }
        session()->put('cart', $cartdata);
        // dd(session()->get("cart"));
        session()->flash('message', 'Item added to cart !');

        return back();
    }

    public function view() {
        $cart_items = null;
        $session_cart_items = null;
        if (\Session::get('cart')) {
            $session_cart_items = [];
            foreach (session('cart') as $session_cart_items[]) {
                $session_cart_items['product'] = Product::where('id', session('cart.product_id'))->get();
                $session_cart_items['quantity'] = session('cart.quantity');
            }
        }
        $cart_items_count = count(\Session::get('cart'));
        return View::make('cart.view')
                        ->with([
                            'cart_items' => $cart_items, 'cart_items_count' => $cart_items_count,
                            'session_cart_items' => $session_cart_items,
        ]);
    }

}

//    public function delCartItem(Request $request, $id) {
//        if (session()->has('cart')) {
//            $oldCart = session()->get('cart');
//            $cartdata = $oldCart;
//            $cartdata->del($cartdata, $cartdata->product_id);
//            $request->session()->put('cart', $cartdata);
//            return redirect()->route('shop-view');
//        }
//    }

