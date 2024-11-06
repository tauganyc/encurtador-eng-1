<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\RouteController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [RouteController::class, 'index'])->name('index');
    Route::post('/store', [RouteController::class, 'store'])->name('store');
    Route::delete('/delete/{id}', [RouteController::class, 'destroy'])->name('destroy');
    Route::get('/report/{id}', [ReportController::class, 'index'])->name('report');
});

Route::get('/r/{slug}', [RouteController::class, 'redirect'])->name('redirect');

require __DIR__.'/auth.php';
