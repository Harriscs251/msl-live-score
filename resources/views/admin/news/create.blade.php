@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add News Article</h4>
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
                    
                    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="image1" class="form-label">Main Image (Required)</label>
                                <input type="file" class="form-control" id="image1" name="image1" accept="image/*" required>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="image2" class="form-label">Additional Image (Optional)</label>
                                <input type="file" class="form-control" id="image2" name="image2" accept="image/*">
                            </div>
                            
                            <div class="col-md-4">
                                <label for="image3" class="form-label">Additional Image (Optional)</label>
                                <input type="file" class="form-control" id="image3" name="image3" accept="image/*">
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Save News Article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection