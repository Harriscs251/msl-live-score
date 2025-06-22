<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MalaysianPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MalaysianPlayerController extends Controller
{
    public function index()
    {
        $players = MalaysianPlayer::all();
        return view('admin.malaysian_players.index', compact('players'));
    }
    public function create()
    {
        return view('admin.malaysian_players.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'goals' => 'required|integer|min:0',
            'matches_played' => 'required|integer|min:0',
            'market_price' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048', // max 2MB
        ]);
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('player-photos', 'public');
            $validatedData['photo'] = $path;
        }
        MalaysianPlayer::create($validatedData);
        return redirect()->route('malaysian-players.index')->with('success', 'Player added.');
    }
    public function edit(MalaysianPlayer $malaysianPlayer)
    {
        return view('admin.malaysian_players.edit', compact('malaysianPlayer'));
    }
    public function update(Request $request, MalaysianPlayer $malaysianPlayer)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'goals' => 'required|integer|min:0',
            'matches_played' => 'required|integer|min:0',
            'market_price' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048', // max 2MB
        ]);
        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($malaysianPlayer->photo && Storage::disk('public')->exists($malaysianPlayer->photo)) {
                Storage::disk('public')->delete($malaysianPlayer->photo);
            }
            // Store new photo
            $path = $request->file('photo')->store('player-photos', 'public');
            $validatedData['photo'] = $path;
        } else {
            // Keep existing photo (remove photo from request data)
            unset($validatedData['photo']);
        }
        $malaysianPlayer->update($validatedData);
        return redirect()->route('malaysian-players.index')->with('success', 'Player updated.');
    }
    public function destroy(MalaysianPlayer $malaysianPlayer)
    {
        // Delete the player's photo if it exists
        if ($malaysianPlayer->photo && Storage::disk('public')->exists($malaysianPlayer->photo)) {
            Storage::disk('public')->delete($malaysianPlayer->photo);
        }
        $malaysianPlayer->delete();
        return redirect()->route('malaysian-players.index')->with('success', 'Player deleted.');
    }
}
