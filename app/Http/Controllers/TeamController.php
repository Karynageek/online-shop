<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Auth;

class TeamController extends Controller {

    public function __construct() {
        $this->middleware('user');
    }

    public function show() {
        $sponsor = Auth::user()->id;
        $team = User::all();
        $teamView = $this->partnerTree($team, $sponsor);

        return View::make('team.view')
                        ->with('teamView', $teamView);
    }

    public function partnerTree($team, $sponsor) {
        $html = '<ul>';
        foreach ($team as $partner) {
            if ($partner->sponsor == $sponsor) {
                $html .= '<li>' . $partner->name;
                $html .= $this->partnerTree($team, $partner->id, $html);
                $html .= '</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }

}
