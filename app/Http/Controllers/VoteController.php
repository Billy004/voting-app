<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::all()->groupBy('option')->map->count();
        $userHasVoted = Vote::hasUserVoted(auth()->id());
        return view('vote', compact('votes', 'userHasVoted'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'option' => 'required|string',
        ]);

        if (Vote::hasUserVoted(auth()->id())) {
            return redirect()->route('vote.index')->with('error', 'You have already voted!');
        }

        $vote = Vote::create([
            'user_id' => auth()->id(),
            'option' => $request->option,
        ]);

        return redirect()->route('vote.index')->with('success', 'Vote recorded successfully!');
    }
}