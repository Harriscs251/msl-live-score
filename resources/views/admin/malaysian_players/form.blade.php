<!-- resources/views/admin/malaysian_players/form.blade.php -->
<form action="{{ isset($malaysianPlayer) ? route('malaysian-players.update', $malaysianPlayer->id) : route('malaysian-players.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($malaysianPlayer))
        @method('PUT')
    @endif
    <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $malaysianPlayer->name ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label>Goals:</label>
        <input type="number" name="goals" class="form-control" value="{{ old('goals', $malaysianPlayer->goals ?? 0) }}" required>
    </div>
    <div class="mb-3">
        <label>Matches Played:</label>
        <input type="number" name="matches_played" class="form-control" value="{{ old('matches_played', $malaysianPlayer->matches_played ?? 0) }}" required>
    </div>
    <div class="mb-3">
        <label>Market Price (RM):</label>
        <input type="number" step="0.01" name="market_price" class="form-control" value="{{ old('market_price', $malaysianPlayer->market_price ?? 0.00) }}" required>
    </div>
    <div class="mb-3">
        <label>Player Photo:</label>
        <input type="file" name="photo" class="form-control" accept="image/*">
        @if(isset($malaysianPlayer) && $malaysianPlayer->photo)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $malaysianPlayer->photo) }}" alt="{{ $malaysianPlayer->name }}" class="img-thumbnail" style="max-height: 150px">
                <p class="small text-muted">Current photo</p>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
