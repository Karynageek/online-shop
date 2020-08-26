<?php

namespace App\Http\Controllers;

use App\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $deposits = Deposit::where('user_id', Auth::user()->id)
                        ->where('status', 2)->get();
        $total_sum = 0;
        $count = 0;
        foreach ($deposits as $deposit) {
            $total_sum += $deposit->sum;
            $count++;
        }
        return View::make('home')->with('total_sum', $total_sum)
                        ->with('count', $count);
    }

}
