<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class AdminQuizController extends Controller
{
    // Show a list of all quizzes with their questions and answers
    public function index()
    {
        $quizzes = Quiz::with('questions.answers')->get();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    // Show the form to create a new quiz
    public function create()
    {
        return view('admin.quizzes.create');
    }

    // Store a new quiz with its questions and answers
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.answers' => 'required|array|min:2',
            'questions.*.answers.*' => 'required|string',
            'questions.*.correct' => 'required|integer'
        ]);

        // Create the quiz
        $quiz = Quiz::create(['title' => $request->title]);

        // Loop through the questions and store them
        foreach ($request->questions as $q) {
            $question = $quiz->questions()->create(['question' => $q['question']]);

            // Store the answers for the current question
            foreach ($q['answers'] as $index => $answer) {
                $question->answers()->create([
                    'answer' => $answer,
                    'is_correct' => $index == $q['correct'] ? 1 : 0
                ]);
            }
        }

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz created successfully.');
    }

    // Show the form to edit a quiz
    public function edit($id)
    {
        // Retrieve quiz with questions and answers
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        return view('admin.quizzes.edit', compact('quiz'));
    }

    // Update a specific quiz
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.id' => 'required|integer|exists:questions,id',
            'questions.*.question' => 'required|string',
            'questions.*.answers' => 'required|array|min:2',
            'questions.*.answers.*' => 'required|string',
            'questions.*.correct' => 'required|integer'
        ]);

        // Find the quiz and update the title
        $quiz = Quiz::findOrFail($id);
        $quiz->update(['title' => $request->title]);

        // Loop through the questions and update them
        foreach ($request->questions as $q) {
            $question = $quiz->questions()->findOrFail($q['id']);
            $question->update(['question' => $q['question']]);

            // Loop through the answers and update them
            foreach ($q['answers'] as $index => $answer) {
                // Find and update the answer
                $answerModel = $question->answers()->findOrFail($answer['id']);
                $answerModel->update([
                    'answer' => $answer['answer'], // Make sure 'answer' key is used here
                    'is_correct' => $index == $q['correct'] ? 1 : 0 // Update correct answer flag
                ]);
            }
        }

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    // Delete a specific quiz
    public function destroy($id)
    {
        // Find the quiz and delete it (with cascade delete for related questions and answers if set in the DB)
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
}
