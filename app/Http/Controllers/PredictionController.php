<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FixtureController;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Models\Prediction;
use Illuminate\Support\Facades\Validator;

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
        $rules = array(
            'sportmonks_id' => ['required', 'numeric'],
            'home_prediction' => ['required', 'numeric'],
            'away_prediction' => ['required', 'numeric']
        );

        $errors = array();

        foreach(request('fixtures') as $fixtureId => $fixture){
            $validator = Validator::make($fixture, $rules);

            if($validator->fails()){
                $errors[$fixtureId] = $validator->errors();
            }

            if(!empty($errors)){
                return response()->json(['errors' => $errors], 422);
            } else {
                $attributes = $fixture;
                $attributes['user_id'] = auth()->id();
                $fixture = FixtureController::getFixtureBySportsmonkId($fixture['sportmonks_id']);
                $attributes['fixture_id'] = $fixture->id;
                Prediction::create($attributes);
            }
        }

        return redirect('/')->with('success', 'Predictions entered correctly');
    }
}
