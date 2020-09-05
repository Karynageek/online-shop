<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show() {
        $categories = Category::where('status', 'Shown')->get();
        $latestProducts = DB::table('products')
                ->join('category_product', 'category_product.product_id', '=', 'products.id')
                ->join('categories', 'category_product.category_id', '=', 'categories.id')
                ->where('categories.status', 'Shown')
                ->paginate(3);
        $sliderProducts = DB::table('products')
                ->where('is_recommended', '1')
                ->join('category_product', 'category_product.product_id', '=', 'products.id')
                ->join('categories', 'category_product.category_id', '=', 'categories.id')
                ->where('categories.status', 'Shown')
                ->paginate(3);
        return View::make('site.view')
                        ->with('categories', $categories)
                        ->with('latestProducts', $latestProducts)
                        ->with('sliderProducts', $sliderProducts);
    }

}
