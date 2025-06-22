@extends('layouts.dashboard')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Your Favorite Teams</h4>
                </div>
                <div class="card-body">
                    @if(count($favoriteStandings) > 0)
                        <h5 class="mb-3">Favorite Teams Standings</h5>
                        <div class="table-responsive mb-4">
                            <table class="table table-striped table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Team</th>
                                        <th class="text-center">Played</th>
                                        <th class="text-center">W</th>
                                        <th class="text-center">D</th>
                                        <th class="text-center">L</th>
                                        <th class="text-center">GD</th>
                                        <th class="text-center">Points</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($favoriteStandings as $team)
                                    <tr>
                                        <td>{{ $team['rank'] }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $team['team']['logo'] }}" alt="{{ $team['team']['name'] }}" style="width: 24px; height: 24px; margin-right: 8px;">
                                                {{ $team['team']['name'] }}
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $team['all']['played'] }}</td>
                                        <td class="text-center">{{ $team['all']['win'] }}</td>
                                        <td class="text-center">{{ $team['all']['draw'] }}</td>
                                        <td class="text-center">{{ $team['all']['lose'] }}</td>
                                        <td class="text-center">{{ $team['goalsDiff'] }}</td>
                                        <td class="text-center font-weight-bold">{{ $team['points'] }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('favorites.toggle') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="team_id" value="{{ $team['team']['id'] }}">
                                                <input type="hidden" name="team_name" value="{{ $team['team']['name'] }}">
                                                <input type="hidden" name="team_logo" value="{{ $team['team']['logo'] }}">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-star"></i> Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            You haven't selected any favorite teams yet. Choose from the list below.
                        </div>
                    @endif
                    
                    <h5 class="mb-3">Other Teams</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Rank</th>
                                    <th>Team</th>
                                    <th class="text-center">Played</th>
                                    <th class="text-center">W</th>
                                    <th class="text-center">D</th>
                                    <th class="text-center">L</th>
                                    <th class="text-center">GD</th>
                                    <th class="text-center">Points</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($otherStandings as $team)
                                <tr>
                                    <td>{{ $team['rank'] }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $team['team']['logo'] }}" alt="{{ $team['team']['name'] }}" style="width: 24px; height: 24px; margin-right: 8px;">
                                            {{ $team['team']['name'] }}
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $team['all']['played'] }}</td>
                                    <td class="text-center">{{ $team['all']['win'] }}</td>
                                    <td class="text-center">{{ $team['all']['draw'] }}</td>
                                    <td class="text-center">{{ $team['all']['lose'] }}</td>
                                    <td class="text-center">{{ $team['goalsDiff'] }}</td>
                                    <td class="text-center font-weight-bold">{{ $team['points'] }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('favorites.toggle') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="team_id" value="{{ $team['team']['id'] }}">
                                            <input type="hidden" name="team_name" value="{{ $team['team']['name'] }}">
                                            <input type="hidden" name="team_logo" value="{{ $team['team']['logo'] }}">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="far fa-star"></i> Add
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection