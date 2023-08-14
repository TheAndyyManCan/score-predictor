<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \SportMonksFootballApi as SFA;
use App\Http\Controllers\FixtureController;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class PredictionController extends Controller
{
    public function index()
    {
        $friday = new CarbonImmutable('next friday');
        $thursday = new Carbon('next thursday');

        if(!$thursday->isNextWeek()){
            $thursday->addWeek();
        }

        // ddd($friday, $thursday);

        return view('welcome', [
            'fixtures' => FixtureController::getByDateRange($friday->toDateString(), $thursday->toDateString())
        ]);
    }
}
