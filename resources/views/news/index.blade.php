@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Latest News</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($news as $article)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/' . $article->image1) }}" class="card-img-top" alt="News Image" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text text-muted small">{{ $article->created_at->format('d M Y') }}</p>
                                        <p class="card-text">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                                        <a href="{{ route('news.show', $article) }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    No news articles available at the moment.
                                </div>
                            </div>
                        @endforelse
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection