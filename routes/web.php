<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\DashboardController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [VoteController::class, 'showLoginForm'])->name('vote.login');
Route::post('/', [VoteController::class, 'login']);
Route::get('/vote', [VoteController::class, 'voteIndex'])->name('vote.index');
Route::post('/vote/store', [VoteController::class, 'store'])->name('vote.store');
Route::post('/vote/logout', [VoteController::class, 'logout'])->name('vote.logout');




Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $username = session('admin_username');

    $totalCandidates = \App\Models\Candidate::count();
    $totalPositions = \App\Models\Position::count();
    $totalVoters = \App\Models\Voter::count();
    $totalVotes = \App\Models\Vote::count();

    return view('admin.layouts.dashboard', compact('username', 'totalCandidates', 'totalPositions', 'totalVoters', 'totalVotes', 'candidateVotes'));
})->name('admin.dashboard');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Votes
Route::get('/admin/votes', [VoteController::class, 'votes'])->name('votes.index');


// Voters
Route::get('/admin/voters', [VoterController::class, 'index'])->name('voters.index');
Route::get('/admin/voters/create', [VoterController::class, 'create'])->name('voters.create');
Route::post('/admin/voters', [VoterController::class, 'store'])->name('voters.store');
Route::get('/admin/voters/{voter}/edit', [VoterController::class, 'edit'])->name('voters.edit');
Route::put('/admin/voters/{voter}', [VoterController::class, 'update'])->name('voters.update');
Route::delete('/admin/voters/{voter}', [VoterController::class, 'destroy'])->name('voters.destroy');

// Positions
Route::get('/admin/positions', [PositionController::class, 'index'])->name('positions.index');
Route::get('/admin/positions/create', [PositionController::class, 'create'])->name('positions.create');
Route::post('/admin/positions', [PositionController::class, 'store'])->name('positions.store');
Route::get('/admin/positions/{position}/edit', [PositionController::class, 'edit'])->name('positions.edit');
Route::put('/admin/positions/{position}', [PositionController::class, 'update'])->name('positions.update');
Route::delete('/admin/positions/{position}', [PositionController::class, 'destroy'])->name('positions.destroy');

// Candidates
Route::get('/admin/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::get('/admin/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/admin/candidates', [CandidateController::class, 'store'])->name('candidates.store');
Route::get('/admin/candidates/{candidate}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
Route::put('/admin/candidates/{candidate}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('/admin/candidates/{candidate}', [CandidateController::class, 'destroy'])->name('candidates.destroy');
