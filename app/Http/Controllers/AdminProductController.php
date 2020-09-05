<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Product;
use App\Category;
use App\CategoryProduct;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function show() {
        $products = Product::all();
        return View::make('admin_product.view')
                        ->with('products', $products);
    }

    public function create() {
        $categories = Category::all();
        return View::make('admin_product.create')
                        ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request) {
        $product = new Product;
        $catalog = new CategoryProduct;

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        $img = \Image::make($request->file('img'))->fit(300)->encode('jpg');
        $name = time() . '.jpg';
        Storage::put($name, $img);
        Storage::move($name, "public\images\'" . $name);

        $product->image = $name;
        $product->status = $request->input('status');
        $product->is_recommended = $request->input('is_recommended');
        $product->code = $request->input('code');
        $product->description = $request->input('description');
        $product->save();

        $catalog->product_id = $product->id;
        $catalog->category_id = $request->input('category_id');
        $catalog->save();

        return Redirect::to('admin/product/view');
    }

    public function edit($id) {
        $categories = Category::all();
        $product = Product::find($id);
        $catalog = CategoryProduct::where('product_id', $id)->first();
       // $category = Category::where('id', $catalog->id)->first();
        return View::make('admin_product.update')
                        ->with('product', $product)
                        ->with('categories', $categories)
                        ->with('catalog', $catalog);
    }

    public function update($id, ProductRequest $request) {
        $product = Product::find($id);
        $catalog = CategoryProduct::where('product_id', $id)->first();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');
        $product->is_recommended = $request->input('is_recommended');
        $product->code = $request->input('code');
        $product->description = $request->input('description');
        $product->save();

        $catalog->category_id = $request->input('category_id');
        $catalog->save();

        return Redirect::to('admin/product/view');
    }

    public function destroy($id) {
        $product = Product::find($id);
        if ($product->delete()) {
            return Redirect::to('admin/product/view');
        }
    }

}
