<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \SportMonksFootballApi as SFA;
use App\Http\Controllers\FixtureController;

class PredictionController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'fixtures' => FixtureController::getByDate('2023-08-05')
        ]);
    }
}
