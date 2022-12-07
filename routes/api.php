<?php

use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PromotionalBannerController;
use App\Http\Controllers\PresentationVideoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\UserController;
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

# Login route
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


# Routes '/api/users'
# Users API routes
Route::post('/users', [UserController::class, 'create']);
Route::get('/users', [UserController::class, 'index']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
});

Route::post('/register', [UserController::class, 'register']);





Route::middleware('authenticate')->prefix('users')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});


# Routes '/api/home/'
Route::middleware('setLocale')->prefix('home')->group(function () {
    # Hero API routes
    Route::get('/hero', [HeroController::class, 'index']);
    Route::post('/hero/{id}', [HeroController::class, 'update']);


# Promotional Banner API routes
    Route::get('/promotional_banner', [PromotionalBannerController::class, 'index']);
    Route::put('/promotional_banner/{id}', [PromotionalBannerController::class, 'update']);

# Presentation Video API routes
    Route::get('/presentation_video', [PresentationVideoController::class, 'index']);
    Route::post('/presentation_video/{id}', [PresentationVideoController::class, 'update']);

# RoomCategory API routes
    Route::get('/room_category', [RoomCategoryController::class, 'index']);
    Route::post('home/room_category/{id}', [RoomCategoryController::class, 'update']);

# advantages API routes
    Route::get('/advantages', [AdvantageController::class, 'index']);
    Route::post('/advantages/{id}', [AdvantageController::class, 'update']);
//Route::delete('/advantages/{id}', [AdvantageController::class, 'destroy']);

# Customers API routes
//Route::post('/customers', [CustomerController::class, 'create']);
//    Route::get('/customers', [CustomerController::class, 'index']);
//Route::put('/customers/{id}', [CustomerController::class, 'update']);
//Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);

# Reviews API routes
    Route::post('/reviews', [ReviewController::class, 'create']);
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::put('/reviews/{id}', [ReviewController::class, 'update']);
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);

# News
    Route::get('/news', [NewsController::class, 'index']);
    Route::post('/news/{id}', [NewsController::class, 'update']);
    Route::post('/news', [NewsController::class, 'store']);

# Footer API routes
    Route::get('/footer', [FooterController::class, 'index']);
    Route::put('/footer/{id}', [FooterController::class, 'update']);
    Route::delete('/footer/{id}', [FooterController::class, 'destroy']);
    # Ajouter un nouveau lien au footer
    Route::post('/footer', [FooterController::class, 'store']);

# Social Media API routes
    Route::get('/social_medias', [SocialMediaController::class, 'index']);
    Route::post('/social_medias/{id}', [SocialMediaController::class, 'update']);
    Route::delete('/social_medias/{id}', [SocialMediaController::class, 'destroy']);
    Route::post('/social_medias', [SocialMediaController::class, 'store']);
});

#Admin API routes
