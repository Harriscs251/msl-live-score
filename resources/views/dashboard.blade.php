@extends('layouts.dashboard')

@section('content')

<!-- 🏆 First Place Pop-up Modal -->
@if(session('leaderboard_win'))
    <div id="leaderboardPopup" class="popup-overlay">
        <div class="popup-content text-center">
            <h3 class="mb-3">🏆 Congratulations!</h3>
            <p>{{ session('leaderboard_win') }}</p>
            <button class="btn btn-success mt-3" onclick="document.getElementById('leaderboardPopup').style.display='none'">OK</button>
        </div>
    </div>
@endif

<div class="row">
    <!-- Left Column -->
    <div class="col-md-6">
        <!-- Live Match -->
        <div class="card animate__animated animate__fadeInLeft">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <span class="live-dot"></span> Live Match
                </h5>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light" type="button" id="liveMatchOptions" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu">
                        @isset($liveMatch['teams']['home'], $liveMatch['teams']['away'])
                            <li>
                                <a class="dropdown-item" href="{{ route('live-match.highlight', ['homeTeam' => $liveMatch['teams']['home']['name'], 'awayTeam' => $liveMatch['teams']['away']['name']]) }}">
                                    View Highlight
                                </a>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="#">No live match</a></li>
                        @endisset
                    </ul>
                </div>
            </div>
            <div class="card-body" id="liveMatchContainer">
                @include('partials.live-match', ['liveMatch' => $liveMatch])
            </div>
        </div>

        <!-- Upcoming Match -->
        <div class="card mt-4 animate__animated animate__fadeInLeft">
            <div class="card-header">
                <h5 class="mb-0">Upcoming Matches</h5>
                <span class="badge bg-primary">Favourite Teams</span>
            </div>
            <div class="card-body">
                @if($upcomingMatch && isset($upcomingMatch['fixture'], $upcomingMatch['teams']['home'], $upcomingMatch['teams']['away']))
                    <div class="row align-items-center">
                        <div class="col-5 text-center">
                            <img src="{{ $upcomingMatch['teams']['home']['logo'] ?? '' }}" class="img-fluid">
                            <h6>{{ $upcomingMatch['teams']['home']['name'] }}</h6>
                        </div>
                        <div class="col-2 text-center">
                            <h6 class="text-muted">VS</h6>
                        </div>
                        <div class="col-5 text-center">
                            <img src="{{ $upcomingMatch['teams']['away']['logo'] ?? '' }}" class="img-fluid">
                            <h6>{{ $upcomingMatch['teams']['away']['name'] }}</h6>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        @php
                            $matchTime = \Carbon\Carbon::parse($upcomingMatch['fixture']['date'])->timezone('Asia/Kuala_Lumpur');
                        @endphp
                        <p>{{ $matchTime->format('d M, g:i A') }} MYT</p>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('match.lineup', ['fixture_id' => $upcomingMatch['fixture']['id']]) }}" class="btn btn-outline-info">
                            <i class="fas fa-users me-1"></i> View Lineup
                        </a>
                    </div>
                @else
                    <div class="alert alert-info mb-0 text-center">No upcoming matches scheduled.</div>
                @endif
            </div>
        </div>

        <!-- Vote -->
        <div class="card mt-4 shadow animate__animated animate__bounceInUp">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-fire me-2"></i> Vote for Your Team</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success animate__animated animate__fadeIn">
                        {{ session('success') }}
                    </div>
                @endif

                @if($upcomingMatch && isset($upcomingMatch['fixture']['id']))
                    <form method="POST" action="{{ route('poll.vote') }}" class="vote-form">
                        @csrf
                        <input type="hidden" name="fixture_id" value="{{ $upcomingMatch['fixture']['id'] }}">

                        <div class="d-grid gap-3" id="vote-options">
                            <label class="vote-option btn btn-outline-primary py-3 rounded-pill shadow-sm">
                                <input type="radio" name="vote" value="home" required hidden>
                                <strong>{{ $upcomingMatch['teams']['home']['name'] }}</strong>
                            </label>

                            <label class="vote-option btn btn-outline-success py-3 rounded-pill shadow-sm">
                                <input type="radio" name="vote" value="away" required hidden>
                                <strong>{{ $upcomingMatch['teams']['away']['name'] }}</strong>
                            </label>

                            <label class="vote-option btn btn-outline-warning py-3 rounded-pill shadow-sm">
                                <input type="radio" name="vote" value="draw" required hidden>
                                <strong>Draw</strong>
                            </label>
                        </div>

                        <button class="btn btn-dark w-100 mt-4 py-2 shadow-sm" type="submit">
                            <i class="fas fa-vote-yea me-2"></i> Submit Vote
                        </button>
                    </form>
                @else
                    <div class="alert alert-warning text-center mb-3">
                        Voting is not available until the next match is scheduled.
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="col-6">
                        <a href="{{ route('matches.history') }}" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-history me-1"></i> History Match
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('feedback.create') }}" class="btn btn-success w-100 py-3">
                            <i class="fas fa-comment me-1"></i> Feedback
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-md-6">
        <div class="card animate__animated animate__fadeInRight">
            <div class="card-header">
                <h5 class="mb-0">Standings</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Team</th>
                                <th class="text-center">MP</th>
                                <th class="text-center">W</th>
                                <th class="text-center">D</th>
                                <th class="text-center">L</th>
                                <th class="text-center">GD</th>
                                <th class="text-center">Pts</th>
                                <th class="text-center">Form</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($standings as $team)
                                <tr>
                                    <td>{{ $team['rank'] }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $team['team']['logo'] }}" alt="{{ $team['team']['name'] }}" style="width: 20px; height: 20px; margin-right: 8px;">
                                            {{ $team['team']['name'] }}
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $team['all']['played'] }}</td>
                                    <td class="text-center">{{ $team['all']['win'] }}</td>
                                    <td class="text-center">{{ $team['all']['draw'] }}</td>
                                    <td class="text-center">{{ $team['all']['lose'] }}</td>
                                    <td class="text-center">{{ $team['goalsDiff'] }}</td>
                                    <td class="text-center">{{ $team['points'] }}</td>
                                    <td class="text-center">
                                        @if(isset($team['form']))
                                            @foreach(str_split($team['form']) as $result)
                                                <span class="form-badge {{ strtolower($result) == 'w' ? 'win' : (strtolower($result) == 'd' ? 'draw' : 'loss') }}"></span>
                                            @endforeach
                                        @endif
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

<!-- Styles -->
<style>
    .card {
        border-radius: 1rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-3px);
    }
    .btn:hover {
        box-shadow: 0 0 10px rgba(13, 110, 253, 0.4);
    }
    .vote-option.selected {
        background: linear-gradient(145deg, #0d6efd, #0056d2);
        color: white !important;
        border-color: transparent !important;
        transform: scale(1.03);
        box-shadow: 0 0 15px rgba(13, 110, 253, 0.4);
    }
    .form-badge {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 2px;
    }
    .form-badge.win { background-color: #28a745; }
    .form-badge.draw { background-color: #ffc107; }
    .form-badge.loss { background-color: #dc3545; }
    .live-dot {
        height: 12px;
        width: 12px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
        margin-right: 6px;
        animation: pulse 1.5s infinite;
    }
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.5); }
        70% { box-shadow: 0 0 0 10px rgba(255, 0, 0, 0); }
        100% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0); }
    }

    /* 🏆 Pop-up Modal */
    .popup-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .popup-content {
        background: white;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
        animation: slideIn 0.5s ease;
    }
    @keyframes slideIn {
        from { transform: translateY(-30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const voteOptions = document.querySelectorAll('.vote-option');
        voteOptions.forEach(option => {
            option.addEventListener('click', function () {
                voteOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        @if(session('success') || session('leaderboard_win'))
            confetti({
                particleCount: 120,
                spread: 80,
                origin: { y: 0.6 }
            });
        @endif
    });

    // Function to fetch live match data from the backend
    function fetchLiveMatchData() {
        fetch('{{ url('/live-match/data') }}')
            .then(response => response.json())
            .then(data => {
                const liveMatchContainer = document.getElementById('liveMatchContainer');
                if (data && data.teams) {
                    const homeTeam = data.teams.home.name;
                    const awayTeam = data.teams.away.name;
                    const score = `${data.score.home} - ${data.score.away}`;
                    const status = data.status;

                    // Calculate the running minute
                    const matchTime = new Date(data.fixture.date);
                    const currentTime = new Date();
                    const timeDiffInSeconds = Math.floor((currentTime - matchTime) / 1000);  // time difference in seconds
                    const timeDiffInMinutes = Math.floor(timeDiffInSeconds / 60);  // convert seconds to minutes

                    // Update the live match container with new data
                    liveMatchContainer.innerHTML = `
                        <h5>${homeTeam} vs ${awayTeam}</h5>
                        <p><strong>Current Score: </strong>${score}</p>
                        <p><strong>Status: </strong>${status}</p>
                        <p><strong>Time: </strong>${matchTime.toLocaleString("en-US", { timeZone: "Asia/Kuala_Lumpur" })} MYT</p>
                        <p><strong>Minute: </strong>${timeDiffInMinutes} min</p>
                    `;
                }
            })
            .catch(error => console.error('Error fetching live match data:', error));
    }

    setInterval(fetchLiveMatchData, 10000); // Refresh every 10 seconds

    // Initial fetch when the page loads
    fetchLiveMatchData();
</script>

@endsection
