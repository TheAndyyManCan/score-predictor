<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FixtureController;
use Carbon\Carbon;

class PredictionController extends Controller
{
    public function index()
    {
        $friday = new Carbon('next friday');
        $thursday = new Carbon('next thursday');

        if(!$thursday->isNextWeek()){
            $thursday->addWeek();
        }

        if(!GameweekController::checkGameweekExists($friday, $thursday)){
            GameweekController::store($friday->toDateString(), $thursday->toDateString());
        }

        return view('welcome', [
            'fixtures' => FixtureController::getByDateRange($friday->toDateString(), $thursday->toDateString())
        ]);
    }
}
