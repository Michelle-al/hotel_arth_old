<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationVideoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home/hero', [HeroController::class, 'index']);

# Presentation-video API routes
Route::get('/home/presentation-video', [VideoController::class, 'index']);
Route::put('/home/presentation-video', [VideoController::class, 'index']);
