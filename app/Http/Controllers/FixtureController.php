<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \SportmonksFootballApi as SFA;

class FixtureController extends Controller
{
    public static function getByDate($date)
    {
        $fixtures = array();
        $data = SFA::fixture()->setInclude('participants')->byDate($date);

        foreach($data['data'] as $fixture){
            $teamNames = array();
            $teams = $fixture['participants'];
            foreach($teams as $team){
                array_push($teamNames, $team['name']);
            }
            array_push($fixtures, $teamNames);
        }

        return $fixtures;
    }
}
