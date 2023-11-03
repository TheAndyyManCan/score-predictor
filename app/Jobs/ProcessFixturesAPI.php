<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \SportmonksFootballApi as SFA;

class ProcessFixturesAPI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     */
    public function handle($fixture): array {
        $teams = array();
        $hometeam = SFA::team()->byId($fixture->home_team_id);
        $awayteam = SFA::team()->byId($fixture->away_team_id);
        $teams[0] = $hometeam;
        $teams[1] = $awayteam;
        return $teams;
    }
}
