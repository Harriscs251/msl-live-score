<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FootballApiService;
use App\Models\Team;

class SyncFplTeams extends Command
{
    protected $signature = 'fpl:sync-teams';
    protected $description = 'Sync teams from football API';

    protected $api;

    public function __construct(FootballApiService $api)
    {
        parent::__construct();
        $this->api = $api;
    }

    public function handle()
    {
        $leagueId = 271; // Malaysian Super League
$teams = $this->api->getTeams($leagueId);

        if (empty($teams)) {
            $this->error('No teams data found.');
            return;
        }

        foreach ($teams as $item) {
            $teamInfo = $item['team'];

            Team::updateOrCreate(
                ['id' => $teamInfo['id']],
                [
                    'name' => $teamInfo['name'],
                    'short_name' => $teamInfo['code'] ?? substr($teamInfo['name'], 0, 3),
                    'logo' => $teamInfo['logo'],
                ]
            );
        }

        $this->info('Teams synced successfully!');
    }
}
