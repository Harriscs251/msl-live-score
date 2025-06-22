@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2 class="my-4">Team Players</h2>

    @if(count($players) > 0)
        <div class="row">
            @foreach($players as $player)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <!-- Display player photo or default if not available -->
                        <img src="{{ $player['player']['photo'] ?? asset('images/default-player.png') }}" class="card-img-top" style="height: 200px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $player['player']['name'] }}</h5>
                            <p class="card-text">
                                <strong>Age:</strong> {{ $player['player']['age'] }}<br>
                                <strong>Nationality:</strong> {{ $player['player']['nationality'] }}<br>
                                <strong>Position:</strong> {{ $player['statistics'][0]['games']['position'] ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No player data available for this team.</div>
    @endif

    <!-- Back button to the teams list -->
    <a href="{{ route('teams') }}" class="btn btn-secondary mt-4">← Back to Teams</a>
</div>
@endsection
