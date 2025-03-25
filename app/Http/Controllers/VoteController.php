<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'vote' => 'required|boolean',
        ]);

        // Controleer of gebruiker al gestemd heeft
        $existing = Vote::where('user_id', $request->user()->id)
            ->where('destination_id', $request->destination_id)
            ->first();

        if ($existing) {
            return back()->withErrors(['message' => 'Je hebt al gestemd op deze bestemming.']);
        }

        Vote::create([
            'user_id' => $request->user()->id,
            'destination_id' => $request->destination_id,
            'vote' => $request->vote,
        ]);

        return back()->with('success', 'Je stem is opgeslagen!');
    }
}
