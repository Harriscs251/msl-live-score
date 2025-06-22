@extends('layouts.dashboard')

@section('content')
<!-- AOS Animation CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Page Style -->
<style>
    .highlight-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .highlight-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .highlight-card:hover {
        transform: translateY(-5px);
    }

    .highlight-header {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: white;
        padding: 1.5rem 2rem;
        border-bottom: 3px solid #fff;
        font-size: 1.4rem;
        font-weight: 600;
    }

    .highlight-header i {
        margin-right: 10px;
    }

    .back-button {
        margin-bottom: 1.5rem;
    }

    .alert {
        font-size: 1.15rem;
    }

    .highlight-footer {
        padding: 1rem;
        background: #f8f9fa;
        text-align: center;
        font-size: 0.95rem;
        color: #6c757d;
    }
</style>

<!-- AOS Animation Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 900 });
</script>

<div class="container py-4 highlight-container">

    <!-- Back Button -->
    <div class="back-button" data-aos="fade-down">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-lg shadow-sm">
            <i class="bi bi-arrow-left-circle me-2"></i> Back to Dashboard
        </a>
    </div>

    <!-- Main Highlight Card -->
    <div class="card highlight-card" data-aos="zoom-in">
        <div class="highlight-header d-flex align-items-center">
            <i class="bi bi-camera-reels-fill fs-4"></i>
            Match Highlights: {{ $homeTeam }} vs {{ $awayTeam }}
        </div>

        <div class="card-body p-0">
            @if(isset($videoId))
                <div class="ratio ratio-16x9">
                    <iframe class="border-0"
                        src="https://www.youtube.com/embed/{{ $videoId }}"
                        title="YouTube Highlight"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            @else
                <div class="alert alert-warning text-center m-4" data-aos="fade-up">
                    {{ $message ?? 'No highlight video found for this match.' }}
                </div>
            @endif
        </div>

        <div class="highlight-footer">
            Powered by YouTube Highlights • Auto-synced by system
        </div>
    </div>
</div>
@endsection
