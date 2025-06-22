@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Forum Moderation</h4>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Author</th>
                                    <th>Created</th>
                                    <th>Replies</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($discussions as $discussion)
                                    <tr>
                                        <td>
                                            <a href="{{ route('forum.show', $discussion) }}" target="_blank">
                                                {{ $discussion->subject }}
                                            </a>
                                        </td>
                                        <td>{{ $discussion->user->name }}</td>
                                        <td>{{ $discussion->created_at->format('M d, Y') }}</td>
                                        <td>{{ $discussion->replies_count }}</td>
                                        <td>
                                            @if($discussion->is_blocked)
                                                <span class="badge bg-danger">Blocked</span>
                                            @else
                                                <span class="badge bg-success">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($discussion->is_blocked)
                                                <form action="{{ route('admin.forum.unblock.discussion', $discussion) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Unblock</button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#blockModal-{{ $discussion->id }}">
                                                    Block
                                                </button>
                                                
                                                <!-- Block Modal -->
                                                <div class="modal fade" id="blockModal-{{ $discussion->id }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Block Discussion</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('admin.forum.block.discussion', $discussion) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="blocked_reason" class="form-label">Reason for blocking:</label>
                                                                        <textarea class="form-control" name="blocked_reason" rows="3" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Block Discussion</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $discussions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection