@extends('layouts.dashboard')

@section('content')
<div class="card shadow-lg border-0">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">⚽ Match Prediction</h4>
        <a href="{{ route('predictions.index') }}" class="btn btn-outline-light btn-sm">← Back to Match List</a>
    </div>
    <div class="card-body">
        @if($prediction)
            @php
                $teams = $prediction['teams'];
                $predictions = $prediction['predictions'];
            @endphp

            <div class="text-center mb-4">
                <h5 class="fw-bold text-primary">{{ $teams['home']['name'] }}</h5>
                <h6 class="text-muted">vs</h6>
                <h5 class="fw-bold text-danger">{{ $teams['away']['name'] }}</h5>
            </div>

            <div class="mb-3 text-center">
                <p class="fs-5"><strong>🔮 Predicted Winner:</strong> {{ $predictions['winner']['name'] ?? 'No clear prediction' }}</p>
                <p class="text-secondary"><strong>💡 Advice:</strong> {{ $predictions['advice'] ?? 'No advice available' }}</p>
            </div>

            <div class="mb-4">
                <h6 class="fw-bold">📈 Prediction Breakdown:</h6>
                <ul class="list-unstyled">
                    <li>🏠 Home Win: <strong>{{ round((float) $homeWinChance, 2) }}%</strong></li>
                    <li>🤝 Draw: <strong>{{ round((float) $drawChance, 2) }}%</strong></li>
                    <li>🚪 Away Win: <strong>{{ round((float) $awayWinChance, 2) }}%</strong></li>
                </ul>

                <div class="progress-stacked">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                         style="width: {{ round((float) $homeWinChance, 2) }}%"></div>
                    <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated"
                         style="width: {{ round((float) $drawChance, 2) }}%"></div>
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                         style="width: {{ round((float) $awayWinChance, 2) }}%"></div>
                </div>
            </div>

            {{-- Recent Form --}}
            <div class="recent-form mt-5">
                <h5 class="fw-bold mb-3">📊 Recent Form (Last 5 Matches)</h5>
                <div class="row">
                    <!-- Home Team Recent Matches -->
                    <div class="col-md-6">
                        <div class="border rounded p-3 shadow-sm">
                            <h6 class="text-primary">{{ $teams['home']['name'] }}</h6>
                            <ul class="list-group list-group-flush">
                                @forelse ($homeRecentMatches as $match)
                                    @php
                                        $home = $match['teams']['home'];
                                        $away = $match['teams']['away'];
                                        $score = $match['goals']['home'] . ' - ' . $match['goals']['away'];
                                        $result = $home['winner'] ? 'W' : ($away['winner'] ? 'L' : 'D');
                                        $badge = $result === 'W' ? 'success' : ($result === 'D' ? 'secondary' : 'danger');
                                    @endphp
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $home['name'] }} vs {{ $away['name'] }}
                                        <span class="badge bg-{{ $badge }}">{{ $score }} ({{ $result }})</span>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted">No recent matches available.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <!-- Away Team Recent Matches -->
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="border rounded p-3 shadow-sm">
                            <h6 class="text-danger">{{ $teams['away']['name'] }}</h6>
                            <ul class="list-group list-group-flush">
                                @forelse ($awayRecentMatches as $match)
                                    @php
                                        $home = $match['teams']['home'];
                                        $away = $match['teams']['away'];
                                        $score = $match['goals']['home'] . ' - ' . $match['goals']['away'];
                                        $result = $away['winner'] ? 'W' : ($home['winner'] ? 'L' : 'D');
                                        $badge = $result === 'W' ? 'success' : ($result === 'D' ? 'secondary' : 'danger');
                                    @endphp
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $home['name'] }} vs {{ $away['name'] }}
                                        <span class="badge bg-{{ $badge }}">{{ $score }} ({{ $result }})</span>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted">No recent matches available.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="lead text-muted">⚽ Stay tuned for this exciting match!</p>
            </div>
        @else
            <div class="alert alert-warning text-center">
                No prediction data available for this match.
            </div>
        @endif
    </div>
</div>
@endsection
