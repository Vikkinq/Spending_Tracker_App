<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('/spending', [ExpenseController::class,'index'])->middleware(['auth', 'verified'])->name('expenses.index');
Route::get('/spending/create', [ExpenseController::class, 'create'])->middleware(['auth', 'verified'])->name('expenses.create');
Route::post('/spending', [ExpenseController::class,'store'])->middleware(['auth', 'verified'])->name('expenses.store');
Route::get('/spending/{expense}/edit', [ExpenseController::class, 'edit'])->middleware(['auth', 'verified'])->name('expenses.edit');
Route::put('/spending/{expense}/update', [ExpenseController::class,'update'])->middleware(['auth', 'verified']);
Route::get('/spending/{expense}', [ExpenseController::class,'show'])->middleware(['auth', 'verified'])->name('expense.show');
Route::delete('/spending/{expense}/delete', [ExpenseController::class,'destroy'])->middleware(['auth', 'verified']);