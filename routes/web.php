<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/', function () {
        return Inertia::render('Person', [
            'departments' => [
                ['id' => 1, 'name' => 'Guatemala'],
                ['id' => 2, 'name' => 'Peten'],
                ['id' => 3, 'name' => 'Quiche'],
            ],
        ]);
    })->middleware('role:user');
    
    Route::post('/persona', [PersonController::class, 'store'])->name('person.store')->middleware('role:user');
    
    Route::get('/persona/{person}', [PersonController::class, 'show'])->name('person.show')->middleware('role:analyst');
    
    Route::get('/personas', [PersonController::class, 'index'])->name('person.index')->middleware('role:analyst');
    
    Route::delete('/persona/{person}', [PersonController::class, 'destroy'])->name('person.destroy')->middleware('role:analyst');
});




require __DIR__.'/auth.php';
