<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteTeam;
use App\Services\FootballApiService;

class FavoriteController extends Controller
{
    protected $footballApiService;
    
    public function __construct(FootballApiService $footballApiService)
    {
        $this->middleware('auth');
        $this->footballApiService = $footballApiService;
    }
    
    public function index()
    {
        // Get user's favorite teams
        $favoriteTeams = auth()->user()->favoriteTeams;
        
        // Get standings
        $standings = $this->footballApiService->getStandings();
        
        // Get all teams for selection
        $allTeams = $this->footballApiService->getTeams();
        
        // Filter standings to show favorite teams first
        $favoriteTeamIds = $favoriteTeams->pluck('team_id')->toArray();
        
        // Separate favorite and other teams in standings
        $favoriteStandings = [];
        $otherStandings = [];
        
        foreach ($standings as $team) {
            if (in_array($team['team']['id'], $favoriteTeamIds)) {
                $favoriteStandings[] = $team;
            } else {
                $otherStandings[] = $team;
            }
        }
        
        return view('favorites.index', compact('favoriteTeams', 'favoriteStandings', 'otherStandings', 'allTeams'));
    }
    
    public function toggleFavorite(Request $request)
    {
        $teamId = $request->input('team_id');
        $teamName = $request->input('team_name');
        $teamLogo = $request->input('team_logo');
        
        // Check if already favorited
        $favorite = FavoriteTeam::where('user_id', auth()->id())
            ->where('team_id', $teamId)
            ->first();
        
        if ($favorite) {
            // If already favorited, remove it
            $favorite->delete();
            $message = "$teamName removed from favorites";
        } else {
            // Otherwise add as favorite
            FavoriteTeam::create([
                'user_id' => auth()->id(),
                'team_id' => $teamId,
                'team_name' => $teamName,
                'team_logo' => $teamLogo
            ]);
            $message = "$teamName added to favorites";
        }
        
        return redirect()->route('favorites.index')->with('success', $message);
    }
}