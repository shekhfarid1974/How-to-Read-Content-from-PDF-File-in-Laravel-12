<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PDFController;

Route::get('/upload-pdf', [PDFController::class, 'index'])->name('upload.pdf');
Route::post('/read-pdf', [PDFController::class, 'readPDF'])->name('read.pdf');

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
