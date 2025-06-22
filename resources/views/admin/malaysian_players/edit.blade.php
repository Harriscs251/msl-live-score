<!-- resources/views/admin/malaysian_players/edit.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Malaysian Player</h2>
    <form action="{{ route('malaysian-players.update', $malaysianPlayer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $malaysianPlayer->name) }}" required>
        </div>
        <div class="mb-3">
            <label>Goals:</label>
            <input type="number" name="goals" class="form-control" value="{{ old('goals', $malaysianPlayer->goals) }}" required>
        </div>
        <div class="mb-3">
            <label>Matches Played:</label>
            <input type="number" name="matches_played" class="form-control" value="{{ old('matches_played', $malaysianPlayer->matches_played) }}" required>
        </div>
        <div class="mb-3">
            <label>Market Price (RM):</label>
            <input type="number" step="0.01" name="market_price" class="form-control" value="{{ old('market_price', $malaysianPlayer->market_price) }}" required>
        </div>
        <div class="mb-3">
            <label>Player Photo:</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
            @if($malaysianPlayer->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $malaysianPlayer->photo) }}" alt="{{ $malaysianPlayer->name }}" class="img-thumbnail" style="max-height: 150px">
                    <p class="small text-muted">Current photo</p>
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('malaysian-players.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
