<?php

use App\Http\Controllers\HeroController;
use App\Http\Controllers\PresentationVideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

# Hero API routes
Route::get('/home/hero', [HeroController::class, 'index']);
Route::put('/home/hero', [HeroController::class, 'edit']);

# Promotionnal Banner API routes
Route::get('/home/promotional_banner', [Promotional_bannerController::class, 'index']);
Route::get('/home/promotional_banner', [Promotional_bannerController::class, 'edit']);

# Presentation-video API routes
Route::get('/home/presentation-video', [PresentationVideoController::class, 'index']);
Route::put('/home/presentation-video', [PresentationVideoController::class, 'index']);



