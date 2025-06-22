<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FootballApiService;

class StatisticController extends Controller
{
    protected $footballApiService;

    public function __construct(FootballApiService $footballApiService)
    {
        $this->middleware('auth');
        $this->footballApiService = $footballApiService;
    }

    public function index()
    {
        // Get standings (which include team statistics)
        $standings = $this->footballApiService->getStandings();

        return view('statistics.index', compact('standings'));
    }

    public function matchHistory(Request $request)
    {
        $selectedSeason = $request->input('season', '2023');

        // Get match history for the selected season
        $history = $this->footballApiService->getHistoryMatches(50, $selectedSeason);

        // If no matches found for current season, try previous season as fallback
        if (count($history) === 0 && $selectedSeason === '2023') {
            $history = $this->footballApiService->getHistoryMatches(50, '2022');
        }

        // List of available seasons (added 2021 and 2020)
        $seasons = ['2024', '2023', '2022', '2021', '2020'];

        return view('statistics.history', compact('history', 'seasons', 'selectedSeason'));
    }


}
