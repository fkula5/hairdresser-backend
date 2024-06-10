<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Schedule;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/date/{date}/services/{service}', Schedule::class);

Route::apiResource('/employees', EmployeeController::class);
Route::apiResource('/appointments', AppointmentController::class);
Route::apiResource('/services', ServiceController::class);


