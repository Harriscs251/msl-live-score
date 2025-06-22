<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FootballApiService;
use App\Models\FplMatch;

class SyncFplMatches extends Command
{
    protected $signature = 'fpl:sync-matches';
    protected $description = 'Sync football matches from API';

    protected $api;

    public function __construct(FootballApiService $api)
    {
        parent::__construct();
        $this->api = $api;
    }

    public function handle()
    {
        $fixtures = $this->api->getUpcomingMatches(50); // or get full season if you want

        if (empty($fixtures)) {
            $this->error('No fixtures found from API.');
            return;
        }

        foreach ($fixtures as $item) {
            $fixture = $item['fixture'];
            $teams = $item['teams'];

            FplMatch::updateOrCreate(
                ['id' => $fixture['id']],
                [
                    'home_team_id' => $teams['home']['id'],
                    'away_team_id' => $teams['away']['id'],
                    'kickoff' => $fixture['date'],
                    'status' => strtolower($fixture['status']['short']),
                ]
            );
        }

        $this->info('Matches synced successfully!');
    }
}
