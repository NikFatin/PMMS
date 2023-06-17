<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RosterController;

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

//Manage Roster

Route::get('/roster', [RosterController::class, 'index'])->name('roster.index');
Route::get('/roster/create', [RosterController::class, 'create'])->name('roster.create');
Route::post('/roster', [RosterController::class, 'store'])->name('roster.store');
Route::get('/roster/{roster}/edit', [RosterController::class, 'edit'])->name('roster.edit');
Route::put('/roster/{roster}/update', [RosterController::class, 'update'])->name('roster.update');
Route::delete('/roster/{roster}/destroy', [RosterController::class, 'destroy'])->name('roster.destroy');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';