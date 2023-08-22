<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FixtureController;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Models\Prediction;

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

    public function store()
    {
        ddd(request());
        foreach(request('fixtures') as $fixture){
            ddd($fixture);
            $attributes = $fixture->validate([
                'sportmonks_id' => ['required', 'integer'],
                'home_prediciton' => ['required', 'integer'],
                'away_prediction' => ['required', 'integer']
            ]);

            $attributes['user_id'] = auth()->id();

            $fixture = FixtureController::getFixtureBySportsmonkId($fixture['sportsmonk_id']);

            $attributes['fixture_id'] = $fixture->id;

            Prediction::create($attributes);
        }
    }
}
