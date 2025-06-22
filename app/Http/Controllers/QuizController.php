<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\UserAnswer;
use App\Models\FantasyLeaderboard;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Displays the list of quizzes
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quiz.index', compact('quizzes'));
    }

    // Displays a specific quiz with its questions and answers
    public function show($id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        return view('quiz.show', compact('quiz'));
    }

    // Handles the submission of the quiz
    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        $score = 0;

        // Loop through the questions and check user's answers
        foreach ($quiz->questions as $question) {
            $selected = $request->input("question.{$question->id}");

            if ($selected === null) {
                continue; // No answer selected
            }

            $isCorrect = $question->answers->firstWhere('id', $selected)?->is_correct;

            UserAnswer::create([
                'user_id' => Auth::id(),
                'question_id' => $question->id,
                'answer_id' => $selected,
                'is_correct' => $isCorrect
            ]);

            if ($isCorrect) $score++;
        }

        // Update user total points (optional cumulative system)
        $user = Auth::user();
        $user->increment('points', $score);

        // Update or create leaderboard entry
        FantasyLeaderboard::updateOrCreate(
            ['user_id' => $user->id],
            ['points' => $user->points]
        );

        // Assign badge based on today's quiz rank
        $badge = $this->assignBadgeBasedOnRank();

        return redirect()->route('leaderboard.index')
                         ->with('success', "You scored $score points!")
                         ->with('badge', $badge);
    }

    // ✅ Rank users based on today's quiz performance
    protected function assignBadgeBasedOnRank()
    {
        $today = now()->toDateString();

        $rankedUsers = UserAnswer::where('is_correct', true)
            ->whereDate('created_at', $today)
            ->groupBy('user_id')
            ->selectRaw('user_id, count(*) as score')
            ->orderByDesc('score')
            ->get();

        $index = $rankedUsers->search(fn($entry) => $entry->user_id == Auth::id());

        $rank = $index !== false ? $index + 1 : null;

        return match ($rank) {
            1 => '🥇 1st Place',
            2 => '🥈 2nd Place',
            3 => '🥉 3rd Place',
            default => null,
        };
    }
}
