<?php

use App\Http\Controllers\DapotController;
use App\Http\Controllers\NopController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TiketIssueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nop', [NopController::class, 'index'])->name('nop.index');
Route::post('/nop/store', [NopController::class, 'store'])->name('nop.store');
Route::put('/nop/{id}', [NopController::class, 'update'])->name('nop.update');
Route::delete('/nop/{id}', [NopController::class, 'destroy'])->name('nop.destroy');

Route::get('/dapot', [DapotController::class, 'index'])->name('dapot.index');
Route::post('/dapot/store', [DapotController::class, 'store'])->name('dapot.store');
Route::put('/dapot/{id}', [DapotController::class, 'update'])->name('dapot.update');
Route::delete('/dapot/{id}', [DapotController::class, 'destroy'])->name('dapot.destroy');
Route::post('dapot-import', [DapotController::class, 'import'])->name('dapot.import');


Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index');
Route::post('tiket-import', [TiketController::class, 'import'])->name('tiket.import');
Route::post('/tiket/store', [TiketController::class, 'store'])->name('tiket.store');
Route::delete('/tiket/{id}', [TiketController::class, 'destroy'])->name('tiket.destroy');

Route::get('/tiketissue/{id}', [TiketIssueController::class, 'show'])->name('tiketissue.show');
