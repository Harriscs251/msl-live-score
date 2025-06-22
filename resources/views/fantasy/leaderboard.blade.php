@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Fantasy Leaderboard</h2>

    <div class="alert alert-info text-center">
        <strong>Your Points:</strong> {{ $userPoints }}
    </div>

    <table class="table table-hover table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Rank</th>
                <th>Player</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaderboards as $index => $entry)
                <tr @if (auth()->id() === $entry->user_id) style="background-color: #d0f0fd;" @endif>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $entry->user->name }}</td>
                    <td>{{ $entry->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
