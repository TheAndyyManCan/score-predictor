<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FixtureController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
            // $post = new postCallController(
            //     GameweekController::class,
            //     'store',
            //     Request::class,
            //     [
            //         'start_date' => $friday->toDateString(),
            //         'end_date' => $thursday->toDateString()
            //     ]
            // );

            // ddd($post);
            // $post->call();

            // $response = Http::post('/storegameweek', [
            //     'start_date' => $friday->toDateString(),
            //     'end_date' => $thursday->toDateString()
            // ]);

            // dd($response);
            GameweekController::store($friday->toDateString(), $thursday->toDateString());
        }

        return view('welcome', [
            'fixtures' => FixtureController::getByDateRange($friday->toDateString(), $thursday->toDateString())
        ]);
    }
}
