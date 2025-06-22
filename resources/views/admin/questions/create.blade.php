@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Question to: {{ $quiz->title }}</h2>

    <form method="POST" action="{{ route('admin.questions.store') }}">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Option A</label>
            <input type="text" name="option_a" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Option B</label>
            <input type="text" name="option_b" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Option C</label>
            <input type="text" name="option_c" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Correct Option (a/b/c)</label>
            <input type="text" name="correct_option" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Points</label>
            <input type="number" name="points" class="form-control" value="1" required>
        </div>

        <button class="btn btn-success">Save Question</button>
    </form>
</div>
@endsection
