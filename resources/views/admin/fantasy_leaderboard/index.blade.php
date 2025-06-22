@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Fantasy Leaderboard (Admin)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Points</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaderboards as $index => $leaderboard)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $leaderboard->user->name }}</td>
                    <td>{{ $leaderboard->points }}</td>
                    <td>

                        <a href="{{ route('admin.fantasy.leaderboard.team', $leaderboard->user->id) }}" class="btn btn-sm btn-info">View Team</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-center">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Back to Admin Dashboard</a>
    </div>
</div>
@endsection
