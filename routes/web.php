<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');



Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    $username = session('admin_username');
    return view('admin.layouts.dashboard', compact('username'));
})->name('admin.dashboard');


Route::get('/admin/voters', [VoterController::class, 'index'])->name('voters.index');
Route::get('/admin/voters/create', [VoterController::class, 'create'])->name('voters.create');
Route::post('/admin/voters', [VoterController::class, 'store'])->name('voters.store');
Route::get('/admin/voters/{voter}/edit', [VoterController::class, 'edit'])->name('voters.edit');
Route::put('/admin/voters/{voter}', [VoterController::class, 'update'])->name('voters.update');
Route::delete('/admin/voters/{voter}', [VoterController::class, 'destroy'])->name('voters.destroy');
