<?php

namespace App\Http\Controllers;

use App\Models\MalaysianPlayer;

class MalaysianPlayerController extends Controller
{
    public function index()
    {
        $players = MalaysianPlayer::all();
        return view('market.index', compact('players'));
    }
}

