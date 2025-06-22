@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('dashboard') }}" class="btn btn-dark mb-4">← Back to Dashboard</a>

    <h2 class="text-center mb-5 fw-bold">FIFA-Style Lineups</h2>

    @if($lineups && count($lineups) > 0)
        <div class="row">
            @foreach($lineups as $lineup)
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow rounded-4 p-4 bg-light">
                        {{-- Team Info --}}
                        <div class="d-flex align-items-center mb-3">
                            @if($lineup['team']['logo'])
                                <img src="{{ $lineup['team']['logo'] }}" alt="Logo" class="me-3" style="height: 50px;">
                            @endif
                            <div>
                                <h4 class="mb-1">{{ $lineup['team']['name'] }}</h4>
                                <small class="text-muted">Formation: {{ $lineup['formation'] ?? 'N/A' }}</small><br>
                                <small class="text-muted">Coach: {{ $lineup['coach']['name'] ?? 'N/A' }}</small>
                            </div>
                        </div>

                        {{-- Starting XI --}}
                        <h6 class="text-primary fw-bold mb-2">Starting XI</h6>
                        <div class="row row-cols-2 row-cols-sm-3 g-2">
                            @foreach($lineup['startXI'] as $starter)
                                @php
                                    $player = $starter['player'];
                                    $pos = strtoupper($player['pos'] ?? '');
                                    $emoji = match($pos) {
                                        'G' => '🧤',
                                        'D' => '🛡️',
                                        'M' => '🎯',
                                        'F', 'A' => '🔥',
                                        default => '👟'
                                    };
                                    $badgeClass = match($pos) {
                                        'G' => 'bg-danger',
                                        'D' => 'bg-primary',
                                        'M' => 'bg-success',
                                        'F', 'A' => 'bg-warning text-dark',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <div class="col">
                                    <div class="border rounded-3 p-2 text-center h-100 bg-white shadow-sm">
                                        <div class="fw-bold mb-1 small">#{{ $player['number'] }} {{ $player['name'] }}</div>
                                        <span class="badge {{ $badgeClass }}">{{ $emoji }} {{ $pos }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Substitutes --}}
                        @if(isset($lineup['substitutes']) && count($lineup['substitutes']) > 0)
                            <h6 class="text-secondary fw-bold mt-4 mb-2">Substitutes</h6>
                            <div class="row row-cols-2 row-cols-sm-3 g-2">
                                @foreach($lineup['substitutes'] as $sub)
                                    @php
                                        $player = $sub['player'];
                                        $pos = strtoupper($player['pos'] ?? '');
                                        $emoji = match($pos) {
                                            'G' => '🧤',
                                            'D' => '🛡️',
                                            'M' => '🎯',
                                            'F', 'A' => '🔥',
                                            default => '👟'
                                        };
                                        $badgeClass = match($pos) {
                                            'G' => 'bg-danger',
                                            'D' => 'bg-primary',
                                            'M' => 'bg-success',
                                            'F', 'A' => 'bg-warning text-dark',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <div class="col">
                                        <div class="border rounded-3 p-2 text-center h-100 bg-white shadow-sm">
                                            <div class="fw-bold mb-1 small">#{{ $player['number'] }} {{ $player['name'] }}</div>
                                            <span class="badge {{ $badgeClass }}">{{ $emoji }} {{ $pos }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center">
            🚫 “Official lineup will be updated 30 mins before kickoff.”
        </div>
    @endif
</div>
@endsection
