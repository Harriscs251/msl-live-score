@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4 text-center wow fadeInUp" data-wow-delay="0.2s">Match Poll: #{{ $fixtureId }}</h3>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success wow fadeInUp" data-wow-delay="0.4s">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger wow fadeInUp" data-wow-delay="0.4s">{{ session('error') }}</div>
    @endif

    {{-- Voting Form --}}
    @if(!$userVote)
        <div class="card wow fadeInUp" data-wow-delay="0.6s">
            <div class="card-body">
                <form action="{{ route('poll.vote') }}" method="POST">
                    @csrf
                    <input type="hidden" name="fixture_id" value="{{ $fixtureId }}">

                    <h5 class="mb-3 text-center">Cast your vote:</h5>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vote" value="home" id="voteHome" required>
                            <label class="form-check-label" for="voteHome">Home Win</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vote" value="draw" id="voteDraw">
                            <label class="form-check-label" for="voteDraw">Draw</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vote" value="away" id="voteAway">
                            <label class="form-check-label" for="voteAway">Away Win</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 wow bounceIn" data-wow-delay="0.8s">Submit Vote</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-info mt-3 wow fadeInUp" data-wow-delay="0.6s">
            You voted for: <strong>{{ ucfirst($userVote) }}</strong>
        </div>
    @endif

    {{-- Poll Stats --}}
    <div class="mt-5">
        @if($totalVotes > 0)
            <div class="mt-4 wow fadeInUp" data-wow-delay="1s">
                <p><strong>Vote Percentages:</strong></p>
                <div class="mb-4">
                    <div class="progress" style="height: 60px; transition: all 0.5s ease-out;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $homePercent }}%" aria-valuenow="{{ $homePercent }}" aria-valuemin="0" aria-valuemax="100">
                            <span class="progress-bar-text">{{ $homePercent }}% Home Win</span>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="progress" style="height: 60px; transition: all 0.5s ease-out;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $drawPercent }}%" aria-valuenow="{{ $drawPercent }}" aria-valuemin="0" aria-valuemax="100">
                            <span class="progress-bar-text">{{ $drawPercent }}% Draw</span>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="progress" style="height: 60px; transition: all 0.5s ease-out;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $awayPercent }}%" aria-valuenow="{{ $awayPercent }}" aria-valuemin="0" aria-valuemax="100">
                            <span class="progress-bar-text">{{ $awayPercent }}% Away Win</span>
                        </div>
                    </div>
                </div>
                <p><strong>Total Votes:</strong> {{ $totalVotes }}</p>
            </div>
        @else
            <div class="alert alert-warning wow fadeInUp" data-wow-delay="1s">No votes yet for this match.</div>
        @endif
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4 wow zoomIn" data-wow-delay="1.2s">Back</a>
</div>
@endsection

@section('scripts')
<!-- WOW.js for animation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
@endsection

@section('styles')
<!-- Animate.css for prebuilt animations -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<style>
    .progress-bar {
        text-align: center;
        font-weight: bold;
        color: white;
        transition: width 1s ease-in-out;
        position: relative;
    }

    .progress-bar-text {
        position: absolute;
        width: 100%;
        text-align: center;
        color: white;
        font-size: 18px;
        font-weight: bold;
        z-index: 2;
    }

    .progress-bar.bg-primary {
        background-color: #007bff !important;
    }

    .progress-bar.bg-warning {
        background-color: #ffc107 !important;
    }

    .progress-bar.bg-success {
        background-color: #28a745 !important;
    }

    .progress {
        border-radius: 30px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .progress-bar {
        border-radius: 30px;
        transition: width 1s ease-in-out;
    }

    .btn-primary {
        font-weight: bold;
        border-radius: 30px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .alert {
        border-radius: 15px;
    }
</style>
@endsection
