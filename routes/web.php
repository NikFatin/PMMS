<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\paymentController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/payment/{payment}', [PaymentController::class, 'update'])->name('payment.update');
    Route::delete('/payment/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');

}); 
require __DIR__ . '/auth.php';