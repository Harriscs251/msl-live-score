@extends('layouts.dashboard')

@section('content')
<style>
    .match-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .match-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .team-logo {
        width: 80px;
        height: 80px;
        object-fit: contain;
    }

    .team-name {
        font-weight: 600;
        font-size: 18px;
        text-align: center;
        margin-top: 10px;
    }

    .vs-text {
        font-size: 24px;
        font-weight: bold;
        color: #222;
    }

    .match-date {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
    }

    .card-header {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .match-layout {
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 15px;
    }

    @media(max-width: 768px) {
        .match-layout {
            flex-direction: column;
        }
    }

    /* 🔮 Fancy Button Styling */
    .prediction-button.fancy-button {
        background: linear-gradient(135deg, #007bff, #00c3ff);
        color: #fff;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 16px;
        border-radius: 50px;
        text-transform: uppercase;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4);
        transition: all 0.35s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
        text-decoration: none;
        display: inline-block;
    }

    .prediction-button.fancy-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -75%;
        width: 50%;
        height: 100%;
        background: rgba(255, 255, 255, 0.15);
        transform: skewX(-20deg);
        z-index: 2;
        transition: all 0.75s ease;
    }

    .prediction-button.fancy-button:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.5);
    }

    .prediction-button.fancy-button:hover::before {
        left: 125%;
    }
</style>

<div class="card bg-light p-4">
    <div class="card-header">⚽ Select a Match for Prediction</div>

    @if(count($upcomingMatches) > 0)
        @foreach($upcomingMatches as $match)
            <div class="match-card">
                <div class="match-date">
                    🕒 {{ \Carbon\Carbon::parse($match['fixture']['date'])->timezone('Asia/Kuala_Lumpur')->format('d M, h:i A') }}
                </div>

                <div class="match-layout">
                    <div class="text-center">
                        <img src="{{ $match['teams']['home']['logo'] }}" alt="Home Logo" class="team-logo">
                        <div class="team-name">{{ $match['teams']['home']['name'] }}</div>
                    </div>

                    <div class="vs-text">VS</div>

                    <div class="text-center">
                        <img src="{{ $match['teams']['away']['logo'] }}" alt="Away Logo" class="team-logo">
                        <div class="team-name">{{ $match['teams']['away']['name'] }}</div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('predictions.show', $match['fixture']['id']) }}" class="prediction-button fancy-button">
                        🔮 View Prediction
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <p>No upcoming matches available.</p>
    @endif
</div>
@endsection
