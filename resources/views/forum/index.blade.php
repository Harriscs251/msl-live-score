@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Forum Discussions</h4>
                    <a href="{{ route('forum.create') }}" class="btn btn-primary">Start New Discussion</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if(count($discussions) > 0)
                        <div class="list-group">
                            @foreach($discussions as $discussion)
                                <a href="{{ route('forum.show', $discussion) }}" class="list-group-item list-group-item-action mb-2 rounded">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $discussion->subject }}</h5>
                                        <small>{{ $discussion->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ Str::limit(strip_tags($discussion->content), 150) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small>Started by: {{ $discussion->user->name }}</small>
                                        <span class="badge bg-primary rounded-pill">{{ $discussion->replies_count }} {{ Str::plural('reply', $discussion->replies_count) }}</span>
                                    </div>
                                    @if($discussion->is_blocked)
                                        <div class="alert alert-danger mt-2 mb-0 py-1 px-2">
                                            <small><i class="fas fa-ban"></i> This discussion has been blocked: {{ $discussion->blocked_reason }}</small>
                                        </div>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            {{ $discussions->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            No discussions found. Be the first to start a discussion!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection