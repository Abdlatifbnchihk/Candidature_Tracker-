<?php

use App\Http\Controllers\InterviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated & Verified Dashboard Route
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [ApplicationController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Protected Application & Interview Routes (Auth Middleware Workspace)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // --- User Profile Context Management ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Job Applications Management (The Parent System) ---
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/archive', [ApplicationController::class, 'archive'])->name('applications.archive');
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::patch('/applications/{id}/restore', [ApplicationController::class, 'restore'])->name('applications.restore');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy')->withTrashed();

    // --- Interviews Management (Option 2: Flat views/interviews Folder Layout) ---
    // These require the parent application identifier to associate the interview folder correctly
    Route::get('/applications/{application}/interviews/create', [InterviewController::class, 'create'])
        ->name('interviews.create');

    Route::post('/applications/{application}/interviews', [InterviewController::class, 'store'])
        ->name('interviews.store');

    // These independent resource controls manage individual interview nodes directly
    Route::get('/interviews/{interview}/edit', [InterviewController::class, 'edit'])
        ->name('interviews.edit');

    // 🟢 Use Route::match instead of Route::put when allowing multiple HTTP verbs
    Route::match(['put', 'patch'], '/interviews/{interview}', [InterviewController::class, 'update'])
        ->name('interviews.update');

    Route::delete('/interviews/{interview}', [InterviewController::class, 'destroy'])
        ->name('interviews.destroy');
});

require __DIR__ . '/auth.php';