<?php

use App\Http\Controllers\MockDataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Mock data API routes
Route::prefix('mock-data')->name('mock-data.')->group(function () {
    // Generic mock data endpoint
    Route::get('/', [MockDataController::class, 'index'])->name('index');
    
    // Resource-specific mock data endpoints
    Route::get('/{resource}', [MockDataController::class, 'resource'])->name('resource');
});

