@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $news->title }}</h4>
                    <a href="{{ route('news') }}" class="btn btn-secondary btn-sm">Back to News</a>
                </div>
                <div class="card-body">
                    <div class="text-muted mb-3">
                        Published on {{ $news->created_at->format('d M Y, h:i A') }}
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-2">
                            <img src="{{ asset('storage/' . $news->image1) }}" class="img-fluid rounded mb-4" alt="News Main Image">
                            
                            @if($news->image2 || $news->image3)
                                <div class="row mb-4">
                                    @if($news->image2)
                                        <div class="col-md-6 mb-3">
                                            <img src="{{ asset('storage/' . $news->image2) }}" class="img-fluid rounded" alt="Additional Image">
                                        </div>
                                    @endif
                                    
                                    @if($news->image3)
                                        <div class="col-md-6 mb-3">
                                            <img src="{{ asset('storage/' . $news->image3) }}" class="img-fluid rounded" alt="Additional Image">
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="news-content">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection