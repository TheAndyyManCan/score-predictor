<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FixtureController;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Models\Prediction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PredictionController extends Controller
{
    public function index()
    {
        $friday = new CarbonImmutable('next friday');
        $thursday = $friday->addDays(6);

        $fixtures = array();
        $data = FixtureController::getByDateRange($friday->toDateString(), $thursday->toDateString());

        foreach($data as $fixture){
            $prediction = DB::table('predictions')
                ->where('sportmonks_id', $fixture['id'])
                ->where('user_id', auth()->id())
                ->first();

            if(!isset($prediction)){
                array_push($fixtures, $fixture);
            }
        }

        if(!GameweekController::checkGameweekExists($friday, $thursday)){
            GameweekController::store($friday->toDateString(), $thursday->toDateString());
        }

        return view('welcome', [
            'fixtures' => $fixtures
        ]);
    }

    public function show()
    {
        return view('account.predictions');
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
