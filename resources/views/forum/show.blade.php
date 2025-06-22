@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $discussion->subject }}</h4>
                    <a href="{{ route('forum.index') }}" class="btn btn-secondary">Back to Forum</a>
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
                    
                    @if($discussion->is_blocked)
                        <div class="alert alert-danger">
                            <i class="fas fa-ban"></i> This discussion has been blocked by an administrator.
                            <strong>Reason:</strong> {{ $discussion->blocked_reason }}
                        </div>
                    @endif
                    
                    <!-- Original post -->
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <span>
                                <strong>{{ $discussion->user->name }}</strong>
                                <small class="text-muted">{{ $discussion->created_at->format('M d, Y g:i A') }}</small>
                            </span>
                            <span class="badge bg-secondary">Original Post</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                {!! nl2br(e($discussion->content)) !!}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Replies -->
                    <h5 class="mb-3">Replies ({{ $discussion->replies->count() }})</h5>
                    
                    @foreach($discussion->replies as $reply)
                        <div class="card mb-3">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <span>
                                    <strong>{{ $reply->user->name }}</strong>
                                    <small class="text-muted">{{ $reply->created_at->format('M d, Y g:i A') }}</small>
                                </span>
                            </div>
                            <div class="card-body">
                                @if($reply->is_blocked)
                                    <div class="alert alert-danger mb-2">
                                        <i class="fas fa-ban"></i> This reply has been blocked by an administrator.
                                        <strong>Reason:</strong> {{ $reply->blocked_reason }}
                                    </div>
                                @else
                                    <div class="mb-3">
                                        {!! nl2br(e($reply->content)) !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    
                    <!-- Reply form -->
                    @if(!$discussion->is_blocked)
                        <div class="card mt-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Post a Reply</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('forum.reply', $discussion) }}" method="POST">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <textarea class="form-control" name="content" rows="4" required>{{ old('content') }}</textarea>
                                    </div>
                                    
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Post Reply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection