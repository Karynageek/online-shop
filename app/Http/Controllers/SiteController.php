<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

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
        $categories = Category::all();
        $latestProducts = Product::paginate(3);
        $sliderProducts = Product::where('is_recommended', 1)->paginate(3);
        return View::make('site.view')
                ->with('categories', $categories)
                ->with('latestProducts', $latestProducts)
                ->with('sliderProducts', $sliderProducts);
    }

}
