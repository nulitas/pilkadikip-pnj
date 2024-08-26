<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Voter;
use App\Models\Candidate;

class VoteController extends Controller
{
    public function showLoginForm()
    {
        return view('vote.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'password' => 'required|string',
        ]);

        $voter = Voter::where('student_id', $request->input('student_id'))->first();

        if ($voter && $request->input('password') === $voter->password) {
            session(['voter_logged_in' => true, 'voter_id' => $voter->id, 'voter_username' => $voter->username]);

            return redirect()->route('vote.index');
        } else {
            return back()->withErrors([
                'student_id' => 'Invalid student ID or password.',
            ])->withInput();
        }
    }

    public function voteIndex()
    {
        if (!session('voter_logged_in')) {
            return redirect()->route('vote.login')->with('error', 'You must be logged in to access this page.');
        }

        $candidates = Candidate::all();
        return view('vote.index', compact('candidates'));
    }

    public function store(Request $request)
    {
        if (!session('voter_logged_in')) {
            return redirect()->route('vote.login')->with('error', 'You must be logged in to access this page.');
        }

        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $voter_id = session('voter_id');
        $candidate = Candidate::findOrFail($request->input('candidate_id'));


        $existingVote = Vote::where('voter_id', $voter_id)
            ->where('position_id', $candidate->position_id)
            ->first();

        if ($existingVote) {
            return redirect()->route('vote.index')->with('error', 'You have already voted for this position.');
        }

        Vote::create([
            'voter_id' => $voter_id,
            'candidate_id' => $candidate->id,
            'position_id' => $candidate->position_id,
        ]);

        return redirect()->route('vote.index')->with('success', 'Vote cast successfully.');
    }

    public function votes()
    {

        $votes = Vote::with(['voter', 'candidate.position'])->get();
        $totalVotes = $votes->count();
        $candidateVotes = Candidate::withCount('votes')->get();

        return view('admin.votes.index', compact('votes', 'totalVotes', 'candidateVotes'));
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('vote.login')->with('success', 'Logged out successfully.');
    }
}
