<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FootballApiService;

class MatchController extends Controller
{
    public function showLineup($fixture_id)
    {
        $api = new FootballApiService();
        $response = $api->request("/fixtures/lineups", ['fixture' => $fixture_id]);

        $lineups = $response->json()['response'] ?? [];

        return view('match.lineup', compact('lineups'));
    }
}
