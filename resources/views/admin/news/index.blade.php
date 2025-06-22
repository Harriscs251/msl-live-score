@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Manage News</h4>
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-2">Back to Dashboard</a>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-success btn-sm">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Preview</th>
                                    <th>Date Added</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($news as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>
                                        @if($article->image1)
                                            <img src="{{ asset('storage/' . $article->image1) }}" alt="News Image" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $article->created_at->format('d M Y, h:i A') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.news.edit', $article) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.news.delete', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news article?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No news articles found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
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