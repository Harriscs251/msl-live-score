<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FootballApiService;
use App\Models\MatchPoll;
use App\Models\FantasyLeaderboard;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $footballApiService;

    public function __construct(FootballApiService $footballApiService)
    {
        $this->middleware('auth');
        $this->footballApiService = $footballApiService;
    }

    public function index()
    {
        $standings = $this->footballApiService->getStandings();
        $liveMatches = $this->footballApiService->getLiveMatches();
        $upcomingMatches = $this->footballApiService->getUpcomingMatches(1);

        $liveMatch = count($liveMatches) > 0 ? $liveMatches[0] : null;
        $upcomingMatch = count($upcomingMatches) > 0 ? $upcomingMatches[0] : null;

        $prediction = null;
        $fixtureId = null;

        if ($upcomingMatch) {
            $fixtureTime = Carbon::parse($upcomingMatch['fixture']['date']);
            if ($fixtureTime->diffInHours(now()) <= 48) {
                $fixtureId = $upcomingMatch['fixture']['id'];
                $prediction = $this->footballApiService->getMatchPrediction($fixtureId);
            }
        }

        $voteData = ['home' => 0, 'away' => 0, 'draw' => 0];
        $totalVotes = 0;
        $hasVoted = false;

        if ($fixtureId) {
            $votes = MatchPoll::where('fixture_id', $fixtureId)->get();
            $voteData['home'] = $votes->where('vote', 'home')->count();
            $voteData['away'] = $votes->where('vote', 'away')->count();
            $voteData['draw'] = $votes->where('vote', 'draw')->count();
            $totalVotes = $votes->count();

            $hasVoted = MatchPoll::where('user_id', Auth::id())
                                 ->where('fixture_id', $fixtureId)
                                 ->exists();
        }

        $fantasyLeaderboard = FantasyLeaderboard::orderByDesc('points')->get();

        // Only use fantasy rank now
        $fantasyRank = $this->getRankFromLeaderboard($fantasyLeaderboard, Auth::id());

        // Assign badge and flash it to session based on fantasy rank
        $badge = $this->assignBadgeBasedOnRank($fantasyRank);
        if ($badge) {
            session()->flash('badge', $badge);
        }

        // Flash popup message for leaderboard win based on fantasy rank
        $popupMessage = match ($fantasyRank) {
            1 => 'You are ranked 1st in the fantasy! 🏆',
            2 => 'You are ranked 2nd in the fantasy! 🥈',
            3 => 'You are ranked 3rd in the fantasy! 🥉',
            default => null,
        };

        // Check if the popup has been shown before
        if ($popupMessage && !session()->has('leaderboard_win_shown')) {
            // Flash the message to session
            session()->flash('leaderboard_win', $popupMessage);
            // Mark that the popup has been shown
            session()->put('leaderboard_win_shown', true);
        }

        return view('dashboard', compact(
            'standings',
            'liveMatch',
            'upcomingMatch',
            'prediction',
            'fixtureId',
            'voteData',
            'totalVotes',
            'hasVoted',
            'badge'
        ));
    }

    private function getRankFromLeaderboard($leaderboard, $userId)
    {
        $index = $leaderboard->search(fn($entry) => $entry->user_id === $userId);
        return $index !== false ? $index + 1 : null;
    }

    private function assignBadgeBasedOnRank($fantasyRank)
    {
        if ($fantasyRank !== null && $fantasyRank <= 3) {
            return $this->getBadgeForRank($fantasyRank);
        }

        return null;
    }

    private function getBadgeForRank($rank)
    {
        return match ($rank) {
            1 => '🥇 1st Place',
            2 => '🥈 2nd Place',
            3 => '🥉 3rd Place',
            default => null,
        };
    }
}
