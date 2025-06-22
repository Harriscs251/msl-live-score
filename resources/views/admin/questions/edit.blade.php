@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Question</h2>

    <form method="POST" action="{{ route('admin.questions.update', $question->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" value="{{ $question->question }}" required>
        </div>
        <div class="mb-3">
            <label>Option A</label>
            <input type="text" name="option_a" class="form-control" value="{{ $question->option_a }}" required>
        </div>
        <div class="mb-3">
            <label>Option B</label>
            <input type="text" name="option_b" class="form-control" value="{{ $question->option_b }}" required>
        </div>
        <div class="mb-3">
            <label>Option C</label>
            <input type="text" name="option_c" class="form-control" value="{{ $question->option_c }}" required>
        </div>
        <div class="mb-3">
            <label>Correct Option (a/b/c)</label>
            <input type="text" name="correct_option" class="form-control" value="{{ $question->correct_option }}" required>
        </div>
        <div class="mb-3">
            <label>Points</label>
            <input type="number" name="points" class="form-control" value="{{ $question->points }}" required>
        </div>

        <button class="btn btn-primary">Update Question</button>
    </form>
</div>
@endsection
