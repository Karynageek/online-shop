<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Deposit;
use App\History;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DepositRequest;

class AdminDepositController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function show() {

        $deposits = Deposit::paginate(5);

        return View::make('admin_deposit.view')
                        ->with('deposits', $deposits);
    }

    public function edit($id) {
        $deposit = Deposit::find($id);
        return View::make('admin_deposit.update')
                        ->with('deposit', $deposit);
    }

    public function update($id, DepositRequest $request) {
        $deposit = Deposit::find($id);
        $deposit->status = $request->input('status');
        $deposit->created_at = $request->input('created_at');
        $deposit->finished_at = $request->input('finished_at');
        $deposit->sum = $request->input('sum');
        $deposit->interest_rate = $request->input('interest_rate');
        $deposit->save();

        if ($deposit->status == 0) {
            $history = History::create([
                        'user_id' => $deposit->user_id,
                        'title' => strtoupper("deactivated deposit"),
                        'sum' => $deposit->sum,
            ]);
        }


        return Redirect::to('admin/deposit/view');
    }

    public function destroy($id) {
        $deposit = Deposit::find($id);
        if ($deposit->delete()) {
            return Redirect::to('admin/deposit/view');
        }
    }

    public function runAccruals() {
        $deposits = Deposit::where('status', 2)->get();
        $profit = 0;
        foreach ($deposits as $deposit) {
            $profit = $deposit->profit + ($deposit->sum * $deposit->interest_rate / 100);
            Deposit::where('id', $deposit->id)->update(['profit' => $profit]);
            $history = History::create([
                        'user_id' => $deposit->user_id,
                        'title' => strtoupper("accruals"),
                        'sum' => $profit,
            ]);
        }
    }

}
