@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Quiz: {{ $quiz->title }}</h2>

    <form action="{{ route('admin.quizzes.update', $quiz->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Quiz Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $quiz->title }}" required>
        </div>

        <div id="questions-section">
            @foreach ($quiz->questions as $question)
                <div class="form-group">
                    <label for="question-{{ $question->id }}">Question</label>
                    <input type="text" name="questions[{{ $question->id }}][question]" id="question-{{ $question->id }}" class="form-control" value="{{ $question->question }}" required>

                    <label for="answers-{{ $question->id }}">Answers</label>
                    @foreach ($question->answers as $index => $answer)
                        <input type="text" name="questions[{{ $question->id }}][answers][]" class="form-control" value="{{ $answer->answer }}" required>
                        <input type="radio" name="questions[{{ $question->id }}][correct]" value="{{ $index }}" {{ $answer->is_correct ? 'checked' : '' }}> Correct
                    @endforeach
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update Quiz</button>
    </form>
</div>
@endsection
