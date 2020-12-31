<?php

use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\TrainController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/github/redirect', [GithubController::class, 'redirect'])->name('github.redirect');
Route::get(config('services.github.redirect'), [GithubController::class, 'callback'])
    ->name('github.callback');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect(route('trains.index'));
    });
    Route::get('/trains', [TrainController::class, 'index'])->name('trains.index');
    Route::get('/trains/create', [TrainController::class, 'create'])->name('trains.create');
    Route::post('/trains', [TrainController::class, 'store'])->name('trains.store');
    Route::get('/trains/{train}', [TrainController::class, 'show']);
});
