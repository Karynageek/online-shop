<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Account;
use App\History;
use Auth;

class AccountController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function show() {
        $account = Account::where('user_id', Auth::user()->id)->first();
        $histories = History::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')->paginate(5);
        return View::make('account.view')
                        ->with('account', $account)
                        ->with('histories', $histories);
    }

    public function edit($id) {
        $account = Account::find($id);
        return View::make('account.update')
                        ->with('account', $account);
    }

    public function refill($id, AccountRequest $request) {
        $account = Account::find($id);
        $account->balance += $request->input('balance');
        $account->save();

        $history = History::create([
                    'account_id' => $account->id,
                    'user_id' => Auth::user()->id,
                    'title' => strtoupper("refill"),
                    'sum' => $request->input('balance'),
        ]);
        return Redirect::to('user/account/view');
    }

    public function withdraw($id, AccountRequest $request) {
        $account = Account::find($id);
        if ($account->balance >= $request->input('balance')) {
            $account->balance -= $request->input('balance');
            $account->save();

            $history = History::create([
                        'account_id' => $account->id,
                        'user_id' => Auth::user()->id,
                        'title' => strtoupper("withdraw"),
                        'sum' => $request->input('balance'),
            ]);
        }
        return Redirect::to('user/account/view');
    }

}
