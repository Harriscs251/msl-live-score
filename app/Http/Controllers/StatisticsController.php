<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FootballApiService;

class StatisticsController extends Controller
{
    public function index()
    {
        $teams = app(FootballApiService::class)->getTeams();
        $statistics = [];

        foreach ($teams as $team) {
            $teamId = $team['team']['id'];

            $stats = app(FootballApiService::class)->getTeamStatistics($teamId);
            if (!empty($stats)) {
                $statistics[] = [
                    'team' => $team['team'],
                    'stats' => $stats,
                ];
            }
        }

        return view('statistics.index', compact('statistics'));
    }
}
