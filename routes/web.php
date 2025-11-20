<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('HolaMundo');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('Contador', function () {
    return Inertia::render('Contador');
})->middleware(['auth', 'verified'])->name('Contador');

require __DIR__.'/settings.php';
