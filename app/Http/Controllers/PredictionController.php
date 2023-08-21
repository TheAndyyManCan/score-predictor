<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FixtureController;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class PredictionController extends Controller
{
    public function index()
    {
        $friday = new CarbonImmutable('next friday');
        $thursday = $friday->addDays(6);

        if(!GameweekController::checkGameweekExists($friday, $thursday)){
            GameweekController::store($friday->toDateString(), $thursday->toDateString());
        }

        return view('welcome', [
            'fixtures' => FixtureController::getByDateRange($friday->toDateString(), $thursday->toDateString())
        ]);
    }
}
