@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid px-0">
        <div class="text-center py-3 bg-white shadow-sm">
            <h3>⚽ MINI GAME</h3>
        </div>
        <div class="d-flex justify-content-center" style="height: calc(100vh - 100px);">
            <iframe
                src="https://www.crazygames.com/embed/soccer-bros"
                style="width: 100%; height: 100%; border: none;"
                allowfullscreen
                allow="gamepad *;">
            </iframe>
        </div>
    </div>
@endsection
