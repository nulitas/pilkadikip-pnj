<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\Voter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalCandidates = Candidate::count();
        $totalPositions = Position::count();
        $totalVoters = Voter::count();
        $totalVotes = Vote::count();

        return view('admin.dashboard_content', compact('totalCandidates', 'totalPositions', 'totalVoters', 'totalVotes'));
    }
}
