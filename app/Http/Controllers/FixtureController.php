<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \SportmonksFootballApi as SFA;
use \App\Models\Fixture;

class FixtureController extends Controller
{
    public static function store($fixtureid, $gameweekid, $hometeamid, $awayteamid)
    {
        $attributes = array(
            'sportsmonk_id' => $fixtureid,
            'gameweek_id' => $gameweekid,
            'home_team_id' => $hometeamid,
            'away_team_id' => $awayteamid
        );

        Fixture::create($attributes);
    }

    public static function getFixtureBySportsmonkId($fixtureid)
    {
        $fixture = DB::table('fixtures')
            ->where('sportsmonk_id', $fixtureid)
            ->first();

        return $fixture;

        // return isset($fixture);
    }

    public static function getByDate($date)
    {
        $fixtures = array();
        $data = SFA::fixture()
            ->setInclude('participants')
            ->setFilter('leagues=501')
            ->byDate($date);

        if(isset($data['data'])){
            foreach($data['data'] as $fixture){
                $teamNames = array();
                $teams = $fixture['participants'];
                foreach($teams as $team){
                    array_push($teamNames, $team);
                }
                array_push($fixtures, $teamNames);
            }
        }

        return $fixtures;
    }

    public static function getByDateRange($date1, $date2)
    {
        $fixtures = array();
        $gameweek = GameweekController::getGameweekByDates($date1, $date2);

        $data = SFA::fixture()
            ->setInclude('participants')
            ->setFilter('leagues=501')
            ->byDateRange($date1, $date2);

        if(isset($data['data'])){

            foreach($data['data'] as $fixture){
                // $teamNames = array();
                // $teams = $fixture['participants'];

                // foreach($teams as $team){
                //     array_push($teamNames, $team);
                // }

                array_push($fixtures, $fixture);

                if(FixtureController::getFixtureBySportsmonkId($fixture['id']) == null){
                    FixtureController::store(
                        $fixture['id'],
                        $gameweek->id,
                        $fixture['participants'][0]['id'],
                        $fixture['participants'][1]['id']
                    );
                }

            }

        }

        return $fixtures;
    }
}
