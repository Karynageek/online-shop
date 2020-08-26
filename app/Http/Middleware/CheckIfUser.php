<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

use Closure;

/**
 * Description of CheckIfUser
 *
 * @author Karina
 */
class CheckIfUser {

    public function handle($request, Closure $next) {
        $user = $request->user();

        if (!$user->isUser()) {
            return redirect('/admin/user/view');
        }

        return $next($request);
    }

}
