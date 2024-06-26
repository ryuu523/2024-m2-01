<?php

use Illuminate\Http\Request;
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
Route::get("events",[\App\Http\Controllers\ApiController::class,"get_events"]);
Route::post("events",[\App\Http\Controllers\ApiController::class,"events_approval"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
