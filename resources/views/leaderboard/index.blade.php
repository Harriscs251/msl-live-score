@extends('layouts.app')

@section('content')
<!-- Sweet animated entry using animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    /* Main container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        text-align: center;
    }

    /* Title section */
    h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 2rem;
    }

    /* Leaderboard table */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2rem;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
    }

    .table th, .table td {
        padding: 1.25rem;
        text-align: center;
        border-bottom: 1px solid #ddd;
        font-size: 1.1rem;
        color: #333;
    }

    .table th {
        background: #111827;
        color: #fff;
        font-size: 1.25rem;
        text-transform: uppercase;
    }

    .table tbody tr {
        background: #fafafa;
        border-radius: 1rem;
        transition: background 0.3s ease;
    }

    .table tbody tr:hover {
        background: #e5e7eb;
    }

    .table tbody tr:nth-child(odd) {
        background: #f9fafb;
    }

    .table tbody tr:nth-child(odd):hover {
        background: #d1d5db;
    }

    /* Rank circle */
    .rank-circle {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        background: linear-gradient(to bottom right, #4caf50, #8bc34a);
        border-radius: 50%;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Congratulations box */
    .congrats-box {
        background-color: #ffeb3b;
        color: #111827;
        font-size: 1.25rem;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    /* Button styles */
    .back-button {
        padding: 0.75rem 2rem;
        background-color: #4caf50;
        color: white;
        font-weight: 600;
        border-radius: 9999px;
        border: none;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        margin-top: 3rem;
    }

    .back-button:hover {
        background-color: #388e3c;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        transform: scale(1.05);
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .table th, .table td {
            padding: 1rem;
            font-size: 1rem;
        }

        .rank-circle {
            width: 35px;
            height: 35px;
            font-size: 1rem;
        }
    }

</style>

<div class="container animate__animated animate__fadeInUp animate__delay-1s">
    <!-- Congratulations Box for Logged-in User if in Top 3 -->
    @if ($users->count() > 0)
        @foreach ($users->take(3) as $index => $user)
            @if ($user->id == auth()->id())  <!-- Only show congrats for logged-in user -->
                @if ($index == 0)
                    <div class="congrats-box">
                        <strong>Congratulations {{ $user->name }}!</strong> 🏆 You've secured <strong>1st place</strong> with {{ $user->points }} points!
                    </div>
                @elseif ($index == 1)
                    <div class="congrats-box">
                        <strong>Well done {{ $user->name }}!</strong> 🥈 You've secured <strong>2nd place</strong> with {{ $user->points }} points!
                    </div>
                @elseif ($index == 2)
                    <div class="congrats-box">
                        <strong>Great job {{ $user->name }}!</strong> 🥉 You've secured <strong>3rd place</strong> with {{ $user->points }} points!
                    </div>
                @endif
            @endif
        @endforeach
    @endif

    <!-- Title -->
    <h2>🏆 Quiz Leaderboard</h2>

    <!-- Table Section -->
    <table class="table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>User</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>
                        <!-- Display rank as a circle -->
                        <div class="rank-circle">
                            @if ($index == 0)
                                🥇
                            @elseif ($index == 1)
                                🥈
                            @elseif ($index == 2)
                                🥉
                            @else
                                {{ $index + 1 }}
                            @endif
                        </div>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Back Button -->
    <div>
        <a href="{{ route('dashboard') }}" class="back-button">
            ← Back to Dashboard
        </a>
    </div>
</div>

@endsection
