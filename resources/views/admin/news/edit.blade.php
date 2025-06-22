@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit News Article</h4>
                    <a href="{{ route('admin.news') }}" class="btn btn-light btn-sm">Back to News List</a>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $news->content) }}</textarea>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="image1" class="form-label">Main Image</label>
                                @if($news->image1)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $news->image1) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="image1" name="image1" accept="image/*">
                                <small class="text-muted">Leave empty to keep the current image</small>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="image2" class="form-label">Additional Image</label>
                                @if($news->image2)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $news->image2) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="image2" name="image2" accept="image/*">
                                <small class="text-muted">Leave empty to keep the current image</small>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="image3" class="form-label">Additional Image</label>
                                @if($news->image3)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $news->image3) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="image3" name="image3" accept="image/*">
                                <small class="text-muted">Leave empty to keep the current image</small>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update News Article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection