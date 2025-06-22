@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Quizzes</h2>
    <a href="{{ route('admin.quizzes.create') }}" class="btn btn-primary mb-3">+ Create New Quiz</a>

    @foreach ($quizzes as $quiz)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $quiz->title }}</h5>
                <p>{{ $quiz->questions->count() }} Questions</p>

                <!-- Edit Button -->
                <a href="{{ route('admin.quizzes.edit', $quiz->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <!-- Delete Button (using form to prevent accidental deletion) -->
                <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
