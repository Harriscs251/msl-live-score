<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\UserQuizScore;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function show(Quiz $quiz)
    {
        // Make sure user hasn't answered this quiz already
        $alreadyAnswered = UserQuizScore::where('user_id', Auth::id())
                            ->where('quiz_id', $quiz->id)
                            ->exists();

        if ($alreadyAnswered) {
            return redirect()->route('dashboard')->with('info', 'You already answered this quiz!');
        }

        return view('quizzes.answer', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $answers = $request->input('answers');
        $totalPoints = 0;

        foreach ($quiz->questions as $question) {
            $userAnswer = $answers[$question->id] ?? null;

            if ($userAnswer === $question->correct_option) {
                $totalPoints += $question->points;
            }
        }

        UserQuizScore::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $totalPoints,
        ]);

        return redirect()->route('dashboard')->with('success', "You scored $totalPoints points!");
    }
}
