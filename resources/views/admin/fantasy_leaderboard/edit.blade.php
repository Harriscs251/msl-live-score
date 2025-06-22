@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Points: {{ $leaderboard->user->name }}</h2>

    <form method="POST" action="{{ route('admin.fantasy.leaderboard.update', $leaderboard->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="points" class="form-label">Points</label>
            <input type="number" name="points" class="form-control" value="{{ old('points', $leaderboard->points) }}" min="0" required>
            @error('points')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.fantasy.leaderboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
