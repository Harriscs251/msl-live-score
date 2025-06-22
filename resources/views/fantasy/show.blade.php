{{-- resources/views/fantasy/team.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Fantasy Team Information Section -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4 mb-4" style="background-color: #ffffff; border-radius: 10px;">
                <h2 class="text-center mb-4">{{ $fantasyTeam->name }}</h2>
                <p class="text-center"><strong>Budget:</strong> ${{ $fantasyTeam->budget }} million</p>
                <p class="text-center"><strong>Total Price of Players:</strong> ${{ $totalPrice }} million</p>
            </div>

            <!-- Fantasy Points -->
            <div class="alert alert-info text-center" style="background-color: #d0ecf7; border-radius: 10px;">
                <h4 class="mb-0">
                    <strong>Your Fantasy Points:</strong>
                    {{ auth()->user()->fantasyLeaderboard->points ?? 0 }}
                </h4>
            </div>

            <!-- Badge Section (only if user is top 3) -->
            @if ($badge)
                <div class="card text-white text-center shadow mb-4
                    @if(str_contains($badge, '🥇')) bg-warning
                    @elseif(str_contains($badge, '🥈')) bg-secondary
                    @elseif(str_contains($badge, '🥉')) bg-orange
                    @endif" style="border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title mb-0" style="font-size: 1.5rem;">
                            🎖️ Congratulations! You earned the <strong>{{ $badge }}</strong> badge!
                        </h5>
                    </div>
                </div>
            @endif
        </div>

        <!-- Player Information Section -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4 mb-4" style="background-color: #ffffff; border-radius: 10px;">
                <h3 class="mb-4 text-center">Your Players</h3>
                <div class="list-group">
                    @foreach ($fantasyTeam->players as $player)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $player->name }}</strong> - ${{ $player->pivot->price }} million
                                {{-- Display points with + sign for positive points --}}
                                <span class="badge bg-success ms-2">
                                    @if ($player->pivot->total_points >= 0)
                                        +{{ $player->pivot->total_points }} points
                                    @else
                                        {{ $player->pivot->total_points }} points
                                    @endif
                                </span>
                                {{-- Check if player is captain or vice-captain --}}
                                @if ($player->pivot->is_captain)
                                    <span class="badge bg-primary ms-2">Captain</span>
                                @elseif ($player->pivot->is_vice_captain)
                                    <span class="badge bg-secondary ms-2">Vice-Captain</span>
                                @endif
                            </div>
                            <!-- Edit Player Points (Only visible to Admin or authorized users) -->
                            @can('edit-points')  {{-- Check if the user is allowed to edit points --}}
                                <a href="{{ route('admin.players.editPoints', $player->id) }}" class="btn btn-sm btn-warning">Edit Points</a>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Fantasy Points Scoring System Table -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm p-4 mb-4" style="background-color: #ffffff; border-radius: 10px;">
                <h2 class="text-center mb-4">Fantasy Points Scoring System</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Action</th>
                            <th class="text-center">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">Default Team Creation</td>
                            <td class="text-center">+5</td>
                        </tr>
                        <tr>
                            <td class="text-center">Player Score (Goal, Assist, etc.)</td>
                            <td class="text-center">+5</td>
                        </tr>
                        <tr>
                            <td class="text-center">Red Card</td>
                            <td class="text-center">-5</td>
                        </tr>
                        <tr>
                            <td class="text-center">Yellow Card</td>
                            <td class="text-center">-2</td>
                        </tr>
                        <tr>
                            <td class="text-center">Clean Sheet (For Defenders and Goalkeepers)</td>
                            <td class="text-center">+3</td>
                        </tr>
                        <tr>
                            <td class="text-center">Goalkeeper Saves</td>
                            <td class="text-center">+1 per save</td>
                        </tr>
                        <tr>
                            <td class="text-center">Captain Bonus</td>
                            <td class="text-center">x2</td>
                        </tr>
                        <tr>
                            <td class="text-center">Vice-Captain Bonus</td>
                            <td class="text-center">x1.5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- View Leaderboard Button (Below Table) -->
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <a href="{{ route('fantasy.leaderboard') }}" class="btn btn-primary btn-lg w-50" style="border-radius: 10px;">
                View Fantasy Leaderboard
            </a>
        </div>
    </div>

    <!-- Buttons Row for Navigation -->
    <div class="row mt-4">
        <div class="col-md-6 mt-3">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-lg w-100" style="border-radius: 10px;">← Back to Dashboard</a>
        </div>
        <div class="col-md-6 mt-3">
            <form action="{{ route('fantasy.team.destroy', $fantasyTeam->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this team? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-lg w-100" style="border-radius: 10px;">🗑 Delete My Team</button>
            </form>
        </div>
    </div>
</div>
@endsection
