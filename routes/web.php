<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth'/*, 'verified'*/])->group(function () {

    Route::post('/notes', [NotesController::class, 'store'])
        ->name('notes.store');

    Route::get('/notes', [NotesController::class, 'index'])
        ->name('notes.index');

    Route::get('/notes/{note}/edit', [NotesController::class, 'edit'])
        ->name('notes.edit');

    Route::put('/notes/{note}', [NotesController::class, 'update'])
        ->name('notes.update');

    Route::delete('/notes/{note}', [NotesController::class, 'destroy'])
        ->name('notes.destroy');

    Route::get('/notes/{note}', function ($note) {
        return "Welcome to my notes " . $note;
    });
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
