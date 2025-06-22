@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $team->name }} ({{ $team->user->name }})</h2>
    <p><strong>Budget:</strong> ${{ $team->budget }} million</p>
    <p><strong>Total Price:</strong> ${{ $totalPrice }} million</p>

    <h4 class="mt-4">Players:</h4>
    <ul class="list-group">
        @foreach ($team->players as $player)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $player->name }} - ${{ $player->price }}m
                @if ($player->pivot->is_captain)
                    <span class="badge bg-primary">Captain</span>
                @elseif ($player->pivot->is_vice_captain)
                    <span class="badge bg-secondary">Vice-Captain</span>
                @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.fantasy.leaderboard') }}" class="btn btn-secondary mt-4">← Back to Leaderboard</a>
</div>
@endsection
