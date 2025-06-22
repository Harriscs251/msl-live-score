@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">2024 Malaysia Super League Highlights</h2>

    <div class="row">
        @forelse ($highlights as $highlight)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ $highlight['thumbnail'] }}" class="card-img-top" alt="{{ $highlight['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $highlight['match'] }}</h5>
                        <p class="card-text">{{ $highlight['title'] }}</p>
                        <a href="https://www.youtube.com/watch?v={{ $highlight['videoId'] }}" target="_blank" class="btn btn-danger btn-sm">Watch Highlight</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No highlights available at the moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
