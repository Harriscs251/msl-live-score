<!-- resources/views/admin/malaysian_players/create.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Malaysian Player</h2>
    <form action="{{ route('malaysian-players.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Goals:</label>
            <input type="number" name="goals" class="form-control" value="{{ old('goals', 0) }}" required>
        </div>
        <div class="mb-3">
            <label>Matches Played:</label>
            <input type="number" name="matches_played" class="form-control" value="{{ old('matches_played', 0) }}" required>
        </div>
        <div class="mb-3">
            <label>Market Price (RM):</label>
            <input type="number" step="0.01" name="market_price" class="form-control" value="{{ old('market_price', 0.00) }}" required>
        </div>
        <div class="mb-3">
            <label>Player Photo:</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
