@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Edit Player Points</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.players.points.update', $player->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Player Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $player->name }}" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position" value="{{ $player->position }}" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" value="{{ $player->price }}" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label for="total_points" class="form-label">Points</label>
                            <input type="number" class="form-control @error('total_points') is-invalid @enderror" id="total_points" name="total_points" value="{{ old('total_points', $player->total_points) }}" step="0.1" required>
                            @error('total_points')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.players.points') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Points</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection