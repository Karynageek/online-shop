<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Account;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function show() {
        $users = User::paginate(5);

        return View::make('admin_user.view')
                        ->with('users', $users);
    }

    public function search(Request $request) {
        $search = $request->get('search');
        $users = User::where('name', 'like', '%' . $search . '%')->paginate(5);
        return View::make('admin_user.view', ['users' => $users]);
    }

    public function create() {
        return View::make('admin_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request) {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $account = new Account;
        $account->user_id = $user->id;
        $account->save();

        return Redirect::to('admin/user/view');
    }

    public function edit($id) {
        $user = User::find($id);
        return View::make('admin_user.update')
                        ->with('user', $user);
    }

    public function update($id, UserRequest $request) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return Redirect::to('admin/user/view');
    }

    public function destroy($id) {
        $user = User::find($id);
        if ($user->delete()) {
            return Redirect::to('admin/user/view');
        }
    }

}
