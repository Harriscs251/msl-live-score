<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FootballApiService;
use App\Models\Player;
use App\Models\Team;

class SyncFplPlayers extends Command
{
    protected $signature = 'fpl:sync-players';
    protected $description = 'Sync players from football API';

    protected $api;

    public function __construct(FootballApiService $api)
    {
        parent::__construct();
        $this->api = $api;
    }

    public function handle()
    {
        $teams = Team::all();

        if ($teams->isEmpty()) {
            $this->error('No teams found. Please sync teams first.');
            return;
        }

        foreach ($teams as $team) {
            $this->info("Syncing players for team: " . $team->name);

            // Get the response from the API
            $response = $this->api->getTeamPlayers($team->id);

            // Log the entire response to check the format
            $this->info('Full API Response: ' . print_r($response, true));

            foreach ($response as $item) {
                $player = $item['player'] ?? null;
                if (!$player) continue;

                // Log the full player data to understand its structure
                $this->info('Full player data: ' . print_r($player, true));

                // Check if the position key exists before logging and processing
                $mappedPosition = 'Unknown'; // Default position in case it's missing

                if (isset($player['position'])) {
                    $this->info('Raw position: ' . $player['position']);
                    $mappedPosition = $this->mapPosition($player['position']);
                } else {
                    $this->info('Position not set for player: ' . $player['name']);
                }

                // Use the player's photo URL
                $photoUrl = $player['photo'] ?? 'default-image-url.jpg'; // Provide a default image if the URL is missing

                Player::updateOrCreate(
                    ['id' => $player['id']],
                    [
                        'team_id' => $team->id,
                        'name' => $player['name'],
                        'position' => $mappedPosition,
                        'price' => $this->randomPrice(),
                        'total_points' => 0,
                        'photo' => $photoUrl, // Save the image URL to the database
                    ]
                );
            }
        }

        $this->info('Players synced successfully!');
    }

    protected function randomPrice()
    {
        return round(mt_rand(40, 125) / 10, 1); // e.g. 4.0 to 12.5
    }

    protected function mapPosition($raw)
    {
        // Define the known mappings
        $map = [
            'Goalkeeper' => 'GK',
            'Defender' => 'DEF',
            'Midfielder' => 'MID',
            'Forward' => 'FWD',
            'Attacker' => 'FWD', // in case your API uses this
            'Unknown' => 'Unknown',
        ];

        // Log the raw value for debugging purposes
        if ($raw && !array_key_exists($raw, $map)) {
            $this->info("Unmapped position: $raw"); // Log to check any unmatched position values
        }

        // Return the mapped position or 'Unknown' if no match
        return $map[$raw] ?? 'Unknown';
    }
}
