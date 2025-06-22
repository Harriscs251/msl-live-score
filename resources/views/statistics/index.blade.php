@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Team Statistics</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Rank</th>
                                    <th>Team</th>
                                    <th class="text-center">MP</th>
                                    <th class="text-center">W</th>
                                    <th class="text-center">D</th>
                                    <th class="text-center">L</th>
                                    <th class="text-center">GF</th>
                                    <th class="text-center">GA</th>
                                    <th class="text-center">GD</th>
                                    <th class="text-center">Points</th>
                                    <th class="text-center">Form</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($standings as $team)
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
                                    <td class="text-center">{{ $team['all']['goals']['for'] }}</td>
                                    <td class="text-center">{{ $team['all']['goals']['against'] }}</td>
                                    <td class="text-center">{{ $team['goalsDiff'] }}</td>
                                    <td class="text-center font-weight-bold">{{ $team['points'] }}</td>
                                    <td class="text-center">
                                        @if(isset($team['form']))
                                            @foreach(str_split($team['form']) as $result)
                                                @if($result == 'W')
                                                    <span class="badge bg-success">W</span>
                                                @elseif($result == 'D')
                                                    <span class="badge bg-secondary">D</span>
                                                @elseif($result == 'L')
                                                    <span class="badge bg-danger">L</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title">Legend</h5>
                                        <p class="mb-1"><strong>MP:</strong> Matches Played</p>
                                        <p class="mb-1"><strong>W:</strong> Wins</p>
                                        <p class="mb-1"><strong>D:</strong> Draws</p>
                                        <p class="mb-1"><strong>L:</strong> Losses</p>
                                        <p class="mb-1"><strong>GF:</strong> Goals For</p>
                                        <p class="mb-1"><strong>GA:</strong> Goals Against</p>
                                        <p class="mb-1"><strong>GD:</strong> Goal Difference</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection