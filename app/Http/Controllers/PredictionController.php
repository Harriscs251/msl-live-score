<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FootballApiService;

class PredictionController extends Controller
{
    public function index(FootballApiService $footballApiService)
    {
        // Get upcoming matches to choose one
        $upcomingMatches = $footballApiService->getUpcomingMatches(5);

        return view('predictions.index', compact('upcomingMatches'));
    }

    public function show(FootballApiService $footballApiService, $fixtureId)
    {
        // Get prediction data for the selected match
        $prediction = $footballApiService->getMatchPrediction($fixtureId);

        if (!$prediction) {
            return redirect()->back()->with('error', 'Prediction data not available.');
        }

        // Extract team IDs
        $homeTeamId = $prediction['teams']['home']['id'] ?? null;
        $awayTeamId = $prediction['teams']['away']['id'] ?? null;

        // Fallback if team IDs are not available
        if (!$homeTeamId || !$awayTeamId) {
            return redirect()->back()->with('error', 'Team information missing in prediction data.');
        }

        // Fetch recent matches for both teams
        $homeRecentMatches = $footballApiService->getRecentMatches($homeTeamId, 5);
        $awayRecentMatches = $footballApiService->getRecentMatches($awayTeamId, 5);

        // Get prediction chances and advice (corrected key from 'prediction' to 'predictions')
        $homeWinChance = $prediction['predictions']['percent']['home'] ?? 0;
        $drawChance = $prediction['predictions']['percent']['draw'] ?? 0;
        $awayWinChance = $prediction['predictions']['percent']['away'] ?? 0;
        $advice = $prediction['predictions']['advice'] ?? 'No advice available';

        // Pass all data to the view
        return view('predictions.show', compact(
            'prediction',
            'homeWinChance',
            'drawChance',
            'awayWinChance',
            'advice',
            'homeRecentMatches',
            'awayRecentMatches'
        ));
    }
}
