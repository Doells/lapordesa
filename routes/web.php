<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', [ReportController::class, 'index']);
Route::post('/lapor', [ReportController::class, 'store'])->name('lapor.store');