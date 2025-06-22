@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Match Poll: #{{ $fixtureId }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($userVote)
        <p><strong>You have already voted for this match.</strong></p>
        <p>You voted for: <strong>{{ ucfirst($userVote) }}</strong></p>

        <h4>Vote Percentages:</h4>
        <ul>
            <li>Home Win: {{ $homePercent }}%</li>
            <li>Draw: {{ $drawPercent }}%</li>
            <li>Away Win: {{ $awayPercent }}%</li>
        </ul>
        <p>Total Votes: {{ $totalVotes }}</p>
    @else
        <form method="POST" action="{{ route('poll.vote') }}">
            @csrf
            <input type="hidden" name="fixture_id" value="{{ $fixtureId }}">

            <div class="form-group">
                <label><input type="radio" name="vote" value="home" required> Home Win</label><br>
                <label><input type="radio" name="vote" value="draw"> Draw</label><br>
                <label><input type="radio" name="vote" value="away"> Away Win</label>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit Vote</button>
        </form>
    @endif
</div>
@endsection
