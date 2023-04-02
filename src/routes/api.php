<?php

use App\Http\Controllers\SensorReadingsController;
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

Route::post('/sensor-readings', [SensorReadingsController::class, 'store'])->name('api.sensor-readings.store');
Route::get('/sensor-readings/get-average', [SensorReadingsController::class, 'getMiddleTemperature'])->name('api.sensor-readings.get-average');
