@if($liveMatch && isset($liveMatch['teams']['home'], $liveMatch['teams']['away']))
    <div class="live-match-container">
        <div class="row align-items-center mb-3">
            <div class="col-4 text-center">
                <div class="d-flex flex-column align-items-center">
                    <div class="team-logo">
                        <img src="{{ $liveMatch['teams']['home']['logo'] ?? '' }}" alt="{{ $liveMatch['teams']['home']['name'] ?? 'Home' }}" class="img-fluid">
                    </div>
                    <h4 class="mb-0">{{ $liveMatch['goals']['home'] ?? 0 }}</h4>
                </div>
            </div>
            <div class="col-4 text-center">
                <h3 class="mb-0">{{ $liveMatch['fixture']['status']['elapsed'] ?? '00' }}'</h3>
                <p class="text-muted small">{{ $liveMatch['fixture']['status']['long'] ?? '' }}</p>
            </div>
            <div class="col-4 text-center">
                <div class="d-flex flex-column align-items-center">
                    <div class="team-logo">
                        <img src="{{ $liveMatch['teams']['away']['logo'] ?? '' }}" alt="{{ $liveMatch['teams']['away']['name'] ?? 'Away' }}" class="img-fluid">
                    </div>
                    <h4 class="mb-0">{{ $liveMatch['goals']['away'] ?? 0 }}</h4>
                </div>
            </div>
        </div>

        <!-- Goal Scorers -->
        @if(isset($liveMatch['events']) && count($liveMatch['events']) > 0)
            <h6 class="fw-bold">Goals:</h6>
            <ul class="list-group list-group-flush">
                @foreach($liveMatch['events'] as $event)
                    @if($event['type'] === 'Goal')
                        <li class="list-group-item d-flex justify-content-between align-items-center px-2 py-1">
                            <div>
                                <strong>{{ $event['player']['name'] ?? 'Unknown' }}</strong>
                                @if(isset($event['detail']))<small class="text-muted">({{ $event['detail'] }})</small>@endif
                            </div>
                            <span class="badge bg-secondary">
                                {{ $event['team']['name'] ?? 'Team' }} - {{ $event['time']['elapsed'] ?? '--' }}'
                            </span>
                        </li>
                    @endif
                @endforeach
            </ul>
        @else
            <p class="text-muted">No goals recorded yet.</p>
        @endif

        <!-- View Lineup Button -->
        <div class="text-center mt-3">
            <a href="{{ route('match.lineup', ['fixture_id' => $liveMatch['fixture']['id']]) }}" class="btn btn-outline-info">
                <i class="fas fa-users me-1"></i> View Lineup
            </a>
        </div>
    </div>
@else
    <div class="alert alert-info mb-0">
        No live matches at the moment.
    </div>
@endif
