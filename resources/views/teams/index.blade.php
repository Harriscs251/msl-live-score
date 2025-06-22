@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Teams</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($teams as $team)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="{{ $team['team']['logo'] ?? asset('images/default-logo.png') }}" class="card-img-top" alt="Team Logo" style="height: 200px; object-fit: contain;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $team['team']['name'] ?? 'Unnamed Team' }}</h5>
                                        <p class="card-text text-muted">
                                            Venue: {{ $team['venue']['name'] ?? 'N/A' }}<br>
                                            City: {{ $team['venue']['city'] ?? 'Unknown' }}
                                        </p>
                                        <a href="{{ route('teams.show', ['id' => $team['team']['id']]) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    No teams available at the moment.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
