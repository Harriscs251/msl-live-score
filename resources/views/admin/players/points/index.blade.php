@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Back to Admin Dashboard</a>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Manage Players Points</h4>
                    <form action="{{ route('admin.players.points') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search player..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
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
                                    <th>Player Name</th>
                                    <th>Position</th>
                                    <th>Price</th>
                                    <th>Current Points</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $player)
                                <tr>
                                    <td>{{ $player->id }}</td>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->position }}</td>
                                    <td>{{ $player->price }}</td>
                                    <td>{{ $player->total_points }}</td>
                                    <td>
                                        <a href="{{ route('admin.players.points.edit', $player->id) }}" class="btn btn-sm btn-primary">Edit Points</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $players->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom pagination styling */
    .pagination .page-item .page-link {
        background-color: #fff;
        border: 1px solid #dee2e6;
        color: #212529;
        padding: 8px 15px;
        transition: all 0.3s ease;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
        color: #0056b3;
    }

    /* Arrow styling */
    .pagination .page-item .page-link[rel="prev"],
    .pagination .page-item .page-link[rel="next"] {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .pagination .page-item .page-link[rel="prev"]::after {
        content: "⟨";
        display: inline-block;
    }

    .pagination .page-item .page-link[rel="next"]::after {
        content: "⟩";
        display: inline-block;
    }
</style>
@endsection
