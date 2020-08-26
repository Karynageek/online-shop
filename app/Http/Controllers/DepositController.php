<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Deposit;
use App\History;
use App\Account;
use App\Http\Requests\DepositRequest;
use Auth;

class DepositController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function show() {
        $deposits = Deposit::where('user_id', Auth::user()->id)
                        ->where('status', 2)->paginate(5);
        return View::make('deposit.view')
                        ->with('deposits', $deposits);
    }

    public function create() {
        return View::make('deposit.create');
    }

    public function store(DepositRequest $request) {
        $deposit = new Deposit;
        $account = Account::where('user_id', Auth::user()->id)->first();
        if ($account->balance >= $request->input('sum')) {
            $deposit->status = $request->input('status');
            $deposit->finished_at = $request->input('finished_at');
            $deposit->sum = $request->input('sum');
            $deposit->interest_rate = $request->input('interest_rate');
            $deposit->user_id = Auth::user()->id;
            $deposit = $account->deposits()->save($deposit);
            
            $account->balance -= $deposit->sum;
            $account->save();
            
            $history = History::create([
                'account_id' => $account->id, 
                'user_id'=> Auth::user()->id,
                'title' => strtoupper("new deposit"),
                'sum'=>$deposit->sum,
                ]);
        }
        return Redirect::to('user/deposit/view');
    }

}
