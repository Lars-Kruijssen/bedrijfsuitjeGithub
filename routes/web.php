<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\VoteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;
use App\Models\Vote;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $destinations = \App\Models\Destination::withCount([
        'votes as yes_votes' => fn($q) => $q->where('vote', true),
        'votes as no_votes' => fn($q) => $q->where('vote', false),
    ])->get(['id', 'name', 'flight_time']);

    return Inertia::render('Dashboard', [
        'destinations' => $destinations,
        'votes' => Vote::where('user_id', Auth::id())->get(['id', 'destination_id', 'vote']),
        'user' => Auth::user(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->post('/votes', [VoteController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/destinations/create', [DestinationController::class, 'create'])->name('destinations.create');
    Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store');
});

require __DIR__.'/auth.php';
