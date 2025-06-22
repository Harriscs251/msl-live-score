@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-white bg-gradient bg-primary p-3 rounded-3 shadow">
            🇲🇾 Malaysian Players Market Price
        </h2>
        <p class="text-muted">Real-time valuation based on player performance</p>

        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3">
            ⬅️ Back
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">📸 Photo</th>
                    <th scope="col">🧑 Player</th>
                    <th scope="col">⚽ Goals</th>
                    <th scope="col">🎯 Matches Played</th>
                    <th scope="col">💰 Market Price (RM)</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach ($players as $player)
                    <tr class="text-center">
                        <td>
                            @if($player->photo)
                                <img src="{{ asset('storage/' . $player->photo) }}" alt="{{ $player->name }}"
                                     class="img-thumbnail rounded-circle" style="width: 70px; height: 70px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto"
                                     style="width: 60px; height: 60px;">
                                    <span class="fs-4">{{ substr($player->name, 0, 1) }}</span>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold text-capitalize">{{ $player->name }}</td>
                        <td>
                            <span class="badge bg-success fs-6">
                                {{ $player->goals }}
                            </span>
                        </td>
                        <td>{{ $player->matches_played }}</td>
                        <td>
                            <span class="fw-bold text-success fs-5">
                                RM {{ number_format($player->market_price, 2) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
