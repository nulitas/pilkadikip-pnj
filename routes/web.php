<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    $username = session('admin_username');
    return view('admin.layouts.dashboard', compact('username'));
})->name('admin.dashboard');

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
