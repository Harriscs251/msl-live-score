<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FootballApiService
{
    protected $apiUrl;
    protected $apiKey;
    protected $leagueId;
    protected $season;

    public function __construct()
    {
        $this->apiUrl = "https://api-football-v1.p.rapidapi.com/v3";
        $this->apiKey = "3041b09a1amsh33ce3af4a5fdc81p14c6cfjsn5256794db175";
        $this->leagueId = 278; // Malaysia Super League
        $this->season = 2024;
    }

    // Protected method to make HTTP requests
    protected function makeRequest($endpoint, $params = [])
    {
        return Http::withHeaders([
            'X-RapidAPI-Key' => $this->apiKey,
            'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
        ])->get($this->apiUrl . $endpoint, $params);
    }

    // Public method to access makeRequest functionality for general purposes
    public function request($endpoint, $params = [])
    {
        return $this->makeRequest($endpoint, $params);
    }

    // Get standings for a specific season
    public function getStandings($season = null)
    {
        $seasonToUse = $season ?? $this->season;

        $response = $this->makeRequest("/standings", [
            'league' => $this->leagueId,
            'season' => $seasonToUse,
        ]);

        if ($response->successful() && isset($response->json()['response'][0]['league']['standings'][0])) {
            return $response->json()['response'][0]['league']['standings'][0];
        }

        return [];
    }

    // Get live matches
    public function getLiveMatches()
    {
        $response = $this->makeRequest("/fixtures", [
            'live' => 'all',
            'league' => $this->leagueId,
            'season' => $this->season,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return [];
    }

    // Get upcoming matches
    public function getUpcomingMatches($limit = 5)
    {
        $response = $this->makeRequest("/fixtures", [
            'league' => $this->leagueId,
            'season' => $this->season,
            'status' => 'NS',  // NS stands for Not Started
            'next' => $limit,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return [];
    }

    // Get historical (completed) matches
    public function getHistoryMatches($limit = 20, $season = null)
    {
        $seasonToUse = $season ?? $this->season;

        $response = $this->makeRequest("/fixtures", [
            'league' => $this->leagueId,
            'season' => $seasonToUse,
            'status' => 'FT', // FT stands for Full Time (completed match)
            'last' => $limit,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return [];
    }

    // Get all matches for a specific season
    public function getAllSeasonMatches($season)
    {
        $response = $this->makeRequest("/fixtures", [
            'league' => $this->leagueId,
            'season' => $season,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return [];
    }

    // Get all teams participating in the league
    public function getTeams()
    {
        $response = $this->makeRequest("/teams", [
            'league' => $this->leagueId,
            'season' => $this->season,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return [];
    }

    // Get team details by teamId
    public function getTeamDetails($teamId)
    {
        $response = $this->makeRequest("/teams", [
            'id' => $teamId,
        ]);

        if ($response->successful() && isset($response->json()['response'][0])) {
            return $response->json()['response'][0];
        }

        return null;
    }

    // Get players for a team by teamId
    public function getTeamPlayers($teamId)
    {
        $response = $this->makeRequest("/players", [
            'team' => $teamId,
            'season' => $this->season,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return [];
    }

    // Get match prediction based on fixtureId
    public function getMatchPrediction($fixtureId)
    {
        $response = $this->makeRequest("/predictions", [
            'fixture' => $fixtureId,
        ]);

        if ($response->successful()) {
            return $response->json()['response'][0] ?? null;
        }

        return null;
    }

    // Get match lineups based on fixtureId
    public function getMatchLineups($fixtureId)
    {
        $response = $this->makeRequest("/fixtures/lineups", [
            'fixture' => $fixtureId,
        ]);

        if ($response->successful() && isset($response->json()['response'][0])) {
            return $response->json()['response'];
        }

        return [];
    }

    // ✅ NEW METHOD: Get recent matches for a specific team
    public function getRecentMatches($teamId, $count = 5)
    {
        $response = $this->makeRequest("/fixtures", [
            'team' => $teamId,
            'season' => $this->season,
            'last' => $count,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return [];
    }

    // Method to check the match's status (whether it's past, upcoming, or future)
    public function checkMatchStatus($matchTime)
    {
        $currentTime = Carbon::now();
        $matchTime = Carbon::parse($matchTime);

        // If the match is in the past, return 'past'
        if ($matchTime->isPast()) {
            return 'past';
        }

        // If the match is in the future and more than 30 minutes away from now, return 'future'
        if ($matchTime->diffInMinutes($currentTime) > 30) {
            return 'future';
        }

        // Otherwise, the match is within 30 minutes of the current time (upcoming)
        return 'upcoming';
    }
}
