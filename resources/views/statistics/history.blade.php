@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Match History</h4>
                    <div>
                        <form method="GET" action="{{ route('matches.history') }}" class="d-flex">
                            <select name="season" class="form-select me-2" onchange="this.form.submit()">
                                @foreach($seasons as $season)
                                    <option value="{{ $season }}" {{ $selectedSeason == $season ? 'selected' : '' }}>
                                        {{ $season }} Season
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($history) > 0)
                        <div class="list-group">
                            @foreach($history as $match)
                                <div class="list-group-item mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2 text-center">
                                            <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($match['fixture']['date'])->format('d M Y') }}</p>
                                            <small>{{ \Carbon\Carbon::parse($match['fixture']['date'])->format('h:i A') }}</small>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row align-items-center">
                                                <div class="col-4 text-end">
                                                    <div class="d-flex flex-column align-items-end">
                                                        <span class="fw-bold mb-1">{{ $match['teams']['home']['name'] }}</span>
                                                        <img src="{{ $match['teams']['home']['logo'] }}" alt="{{ $match['teams']['home']['name'] }}" height="40">
                                                    </div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <div class="match-score bg-light rounded py-2">
                                                        <h3 class="mb-0">{{ $match['goals']['home'] }} - {{ $match['goals']['away'] }}</h3>
                                                        <span class="badge bg-secondary">Final</span>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-start">
                                                    <div class="d-flex flex-column align-items-start">
                                                        <span class="fw-bold mb-1">{{ $match['teams']['away']['name'] }}</span>
                                                        <img src="{{ $match['teams']['away']['logo'] }}" alt="{{ $match['teams']['away']['name'] }}" height="40">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <span class="badge {{ $match['teams']['home']['winner'] ? 'bg-success' : ($match['teams']['away']['winner'] ? 'bg-danger' : 'bg-secondary') }}">
                                                {{ $match['teams']['home']['winner'] ? 'Home Win' : ($match['teams']['away']['winner'] ? 'Away Win' : 'Draw') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            No match history available for the {{ $selectedSeason }} season.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection