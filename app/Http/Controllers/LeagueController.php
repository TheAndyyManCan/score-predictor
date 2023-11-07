<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeagueController extends Controller {

    public function index(){
        $users = DB::table('leagues')
            ->join('league_users', 'leagues.id', '=', 'league_users.league_id')
            ->join('users', 'users.id', '=', 'league_users.user_id')
            ->where('league_users.user_id', auth()->id())
            ->get();

        return view('leagues.index', [
            'users' => $users
        ]);
    }

}
