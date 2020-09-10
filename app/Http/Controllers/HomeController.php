<?php

namespace App\Http\Controllers;

use App\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function index() {
        return View::make('home');
    }

}
