@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Quiz</h2>

    <form action="{{ route('admin.quizzes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Quiz Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div id="questions-container"></div>

        <button type="button" class="btn btn-secondary mb-3" onclick="addQuestion()">+ Add Question</button>
        <button type="submit" class="btn btn-success">Create Quiz</button>
    </form>
</div>

<script>
let questionIndex = 0;

function addQuestion() {
    const container = document.getElementById('questions-container');
    const qId = `q${questionIndex}`;

    const html = `
        <div class="card mb-3 p-3">
            <div class="mb-2">
                <label>Question</label>
                <input type="text" name="questions[${questionIndex}][question]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Answers</label>
                <input type="text" name="questions[${questionIndex}][answers][]" class="form-control mb-1" required>
                <input type="text" name="questions[${questionIndex}][answers][]" class="form-control mb-1" required>
                <input type="text" name="questions[${questionIndex}][answers][]" class="form-control mb-1">
                <input type="text" name="questions[${questionIndex}][answers][]" class="form-control mb-1">
            </div>
            <div class="mb-2">
                <label>Correct Answer (0-3)</label>
                <input type="number" name="questions[${questionIndex}][correct]" min="0" max="3" class="form-control" required>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
    questionIndex++;
}
</script>
@endsection
