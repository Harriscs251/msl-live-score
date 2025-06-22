<!-- resources/views/admin/malaysian_players/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Manage Malaysian Players</h2>
    <a href="{{ route('malaysian-players.create') }}" class="btn btn-primary mb-2">Add New Player</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Goals</th>
                <th>Matches</th>
                <th>Market Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
            <tr>
                <td>
                    @if($player->photo)
                        <img src="{{ asset('storage/' . $player->photo) }}" alt="{{ $player->name }}" class="img-thumbnail" style="max-height: 50px">
                    @else
                        <span>No photo</span>
                    @endif
                </td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->goals }}</td>
                <td>{{ $player->matches_played }}</td>
                <td>RM {{ number_format($player->market_price, 2) }}</td>
                <td>
                    <a href="{{ route('malaysian-players.edit', $player->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('malaysian-players.destroy', $player->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
