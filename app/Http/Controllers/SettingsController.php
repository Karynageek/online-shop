<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;

/**
 * Description of HistoryController
 *
 * @author Karina
 */
class SettingsController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function edit($id) {
        $user = User::find($id);
        return View::make('settings.update')
                        ->with('user', $user);
    }

    public function updateNickname($id, UserRequest $request) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->save();

        return Redirect::to('user/account/view');
    }

    public function updatePass($id, UserRequest $request) {
        $user = User::find($id);
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is invalid']);
        }
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return Redirect::to('user/account/view');
    }

}
