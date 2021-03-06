<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function show($id) {
        $categories = Category::where('status', 'Shown')->get();
        $products = DB::table('products')
                ->join('category_product', 'category_product.product_id', '=', 'products.id')
                ->where('category_id', $id)
                ->paginate(3);

        return View::make('catalog.view')
                        ->with('categories', $categories)
                        ->with('products', $products);
    }

}
