<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class CatalogController extends Controller {

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
    public function show($id) {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(3);
        return View::make('catalog.view')
                        ->with('categories', $categories)
                        ->with('products', $products);
    }

}
