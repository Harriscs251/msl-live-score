<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchPoll;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    // Show the poll form + results on the same page
    public function show($fixtureId)
{
    $userId = Auth::id();

    // Fetch user vote (if any)
    $userVote = MatchPoll::where('fixture_id', $fixtureId)
        ->where('user_id', $userId)
        ->value('vote');

    // Fetch vote counts
    $votes = MatchPoll::where('fixture_id', $fixtureId)->get();
    $homeVotes = $votes->where('vote', 'home')->count();
    $awayVotes = $votes->where('vote', 'away')->count();
    $drawVotes = $votes->where('vote', 'draw')->count();
    $totalVotes = $votes->count();

    // Avoid division by zero
    $homePercent = $totalVotes > 0 ? round(($homeVotes / $totalVotes) * 100) : 0;
    $awayPercent = $totalVotes > 0 ? round(($awayVotes / $totalVotes) * 100) : 0;
    $drawPercent = $totalVotes > 0 ? round(($drawVotes / $totalVotes) * 100) : 0;

    return view('polls.vote_with_results', [
        'fixtureId' => $fixtureId,
        'homeVotes' => $homeVotes,
        'awayVotes' => $awayVotes,
        'drawVotes' => $drawVotes,
        'totalVotes' => $totalVotes,
        'userVote' => $userVote,
        'homePercent' => $homePercent,
        'awayPercent' => $awayPercent,
        'drawPercent' => $drawPercent,
    ]);
}


    // Handle vote submission
    public function vote(Request $request)
    {
        $request->validate([
            'fixture_id' => 'required|integer',
            'vote' => 'required|in:home,away,draw',
        ]);

        $userId = Auth::id();

        // Prevent double voting
        $existingVote = MatchPoll::where('user_id', $userId)
            ->where('fixture_id', $request->fixture_id)
            ->first();

        if ($existingVote) {
            return redirect()->route('poll.show', ['fixtureId' => $request->fixture_id])
                ->with('error', 'You have already voted for this match.');
        }

        // Save the vote (normalize to lowercase)
        MatchPoll::create([
            'user_id' => $userId,
            'fixture_id' => $request->fixture_id,
            'vote' => strtolower($request->vote),
        ]);

        return redirect()->route('poll.show', ['fixtureId' => $request->fixture_id])
            ->with('success', 'Your vote has been submitted.');
    }

    // Admin view: group poll results
    public function adminResults()
    {
        $results = MatchPoll::select('fixture_id', 'vote')
            ->get()
            ->groupBy('fixture_id');

        return view('admin.polls.results', compact('results'));
    }
}
