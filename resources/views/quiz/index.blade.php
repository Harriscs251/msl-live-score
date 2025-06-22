@extends('layouts.app')

@section('content')
<!-- Animate.css for sweet entry effects -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    .quiz-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .quiz-card {
        background: #ffffff;
        border-radius: 1.25rem;
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        padding: 2rem;
        transition: all 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        color: #000;
    }

    .quiz-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 18px 35px rgba(0, 0, 0, 0.2);
    }

    .quiz-title {
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: #000;
    }

    .quiz-desc {
        font-size: 1rem;
        color: #333;
        margin-bottom: 1.5rem;
    }

    .quiz-button {
        padding: 0.75rem 2rem;
        background: linear-gradient(to right, #111, #444);
        color: white;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        border-radius: 9999px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .quiz-button:hover {
        background: linear-gradient(to right, #000, #222);
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.35);
    }

    .back-button {
        display: inline-block;
        margin-bottom: 2rem;
        background-color: #e5e7eb;
        color: #111827;
        padding: 0.6rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 9999px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .back-button:hover {
        background-color: #d1d5db;
        transform: scale(1.05);
        text-decoration: none;
        color: #000;
    }

    @media (max-width: 640px) {
        .quiz-title {
            font-size: 1.4rem;
        }

        .quiz-button {
            font-size: 0.9rem;
        }

        .back-button {
            font-size: 0.9rem;
            padding: 0.5rem 1.2rem;
        }
    }
</style>

<div class="max-w-7xl mx-auto p-6 mt-16 animate__animated animate__fadeIn">

    <!-- Back to Dashboard Button -->
    <div class="text-left">
        <a href="{{ route('dashboard') }}" class="back-button animate__animated animate__fadeInLeft">
            ← Back to Dashboard
        </a>
    </div>

    <!-- Heading Section -->
    <h2 class="text-4xl sm:text-5xl font-extrabold text-center text-black animate__animated animate__fadeInDown">
        🧠 Challenge Your Football Knowledge!
    </h2>
    <p class="text-center text-gray-600 mt-3 text-lg animate__animated animate__fadeInUp">
        Take a quiz, earn points, and climb the leaderboard.
    </p>

    <!-- Quiz Cards -->
    @if ($quizzes->isEmpty())
        <p class="text-center text-gray-500 text-lg mt-12 animate__animated animate__fadeIn">
            There are no quizzes available at the moment. Please check back later!
        </p>
    @else
        <div class="quiz-grid animate__animated animate__fadeInUp animate__delay-1s">
            @foreach ($quizzes as $index => $quiz)
                <div class="quiz-card animate__animated animate__zoomIn animate__delay-{{ ($index % 3 + 1) }}00ms">
                    <h3 class="quiz-title">{{ $quiz->title }}</h3>
                    <p class="quiz-desc">Think you're the GOAT? Take this quiz and find out! ⚽</p>
                    <form action="{{ route('quiz.show', $quiz->id) }}" method="GET">
                        <button class="quiz-button">🎯 Start Quiz</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
