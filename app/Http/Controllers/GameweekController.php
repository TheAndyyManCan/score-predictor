<?php

namespace App\Http\Controllers;

use App\Models\Gameweek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GameweekController extends Controller
{
    public static function store($friday, $thursday)
    {
        $attributes = array(
            'start_date' => $friday,
            'end_date' => $thursday
        );

        Gameweek::create($attributes);
    }

    public static function checkGameweekExists($startdate, $enddate)
    {
        $gw = DB::table('gameweeks')
            ->where('start_date', $startdate)
            ->where('end_date', $enddate)
            ->first();

        if(isset($gw)){
            return true;
        } else {
            return false;
        }
    }
}
