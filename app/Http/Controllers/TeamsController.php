<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FootballApiService;

class TeamsController extends Controller
{
    protected $api;

    public function __construct(FootballApiService $api)
    {
        $this->api = $api;
    }

    public function index()
    {
        // Fetch all teams
        $teams = $this->api->getTeams();  // Retains original method call
        return view('teams.index', compact('teams'));
    }

    public function show($id)
    {
        // Using the public method 'request' to access the functionality of makeRequest
        $response = $this->api->request('/players', [
            'team' => $id,
            'season' => 2024
        ]);

        // Log the response to inspect
        \Log::debug('Players API Response:', $response->json());

        // Initialize the players array
        $players = [];

        // Check if the response is successful and if the 'response' field exists
        if ($response->successful()) {
            $data = $response->json()['response'] ?? [];

            if (count($data) > 0) {
                $players = $data;
            } else {
                \Log::warning("No players found for team ID: $id");
            }
        } else {
            \Log::error("Failed to retrieve player data for team ID: $id");
        }

        return view('teams.show', compact('players'));
    }
}
