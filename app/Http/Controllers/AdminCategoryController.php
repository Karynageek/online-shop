<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function show() {
        $categories = Category::all();

        return View::make('admin_category.view')
                        ->with('categories', $categories);
    }

    public function create() {
        return View::make('admin_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CategoryRequest $request) {
        $category = new Category;
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->save();

        return Redirect::to('admin/category/view');
    }

    public function edit($id) {
        $category = Category::find($id);
        return View::make('admin_category.update')
                        ->with('category', $category);
    }

    public function update($id, CategoryRequest $request) {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->save();

        return Redirect::to('admin/category/view');
    }

    public function destroy($id) {
        $category = Category::find($id);
        if ($category->delete()) {
            return Redirect::to('admin/category/view');
        }
    }

}
