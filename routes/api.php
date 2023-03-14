<?php

use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PromotionalBannerController;
use App\Http\Controllers\PresentationVideoController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
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

Route::middleware('setLocale')->group(function () {
    # Login route
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    # Register route
    Route::post('/register', [AuthController::class, 'register']);

    # Users API routes 'api/users/'
    Route::middleware('auth:sanctum')->prefix('users')->group(function () {
        # Get a user
        Route::get('/{id}', [UserController::class, 'user']);
        # Modify a user
        Route::put('/{id}', [UserController::class, 'update']);
        # Delete a user
        Route::delete('/{id}', [UserController::class, 'destroy']);
        # Get info of user connected
        Route::get('/me', [UserController::class, 'me']);
    });

});

Route::middleware('setLocale')->prefix('reservations')->group(function () {
    Route::put('/{id}', [ReservationController::class, 'update']);
    Route::get('/availability', [ReservationController::class, 'getAvailableRoomsFromRequest']);
    Route::get('/{id}', [ReservationController::class, 'show']);
    Route::post('/create', [ReservationController::class, 'createReservation']);
    Route::delete('/delete/{id}', [ReservationController::class, 'destroy']);
});

// routes/api.php pour test
//    Route::group(['middleware' => ['auth:sanctum']], function() {
//        Route::get('home/hero', [HeroController::class, 'index']);
//    });

# Routes 'api/reservations/'
//    Route::middleware('setLocale')->prefix('reservations')->group(function () {
//        Route::put('/{id}', [ReservationController::class, 'update']);
//        Route::post('/availability', [ReservationController::class, 'isAvailable']);
//        Route::get('/{id}', [ReservationController::class, 'show']);
//    });

# Routes '/api/home/'
Route::middleware('setLocale')->prefix('home')->group(function () {
# Route avec authentification
    Route::group(['middleware' => ['auth:sanctum']], function() {

    });

# Hero API routes
    Route::get('/hero', [HeroController::class, 'index']);
    Route::post('/hero/{id}', [HeroController::class, 'update']);


# Promotional Banner API routes
    Route::get('/promotional_banner', [PromotionalBannerController::class, 'index']);
    Route::put('/promotional_banner/{id}', [PromotionalBannerController::class, 'update']);

# Presentation Video API routes
    Route::get('/presentation_video', [PresentationVideoController::class, 'index']);
    Route::get('/presentation_video/{id}', [PresentationVideoController::class, 'show']);
    Route::post('/presentation_video/{id}', [PresentationVideoController::class, 'update']);

# RoomCategory API routes
    Route::get('/room_category', [RoomCategoryController::class, 'index']);
    Route::post('/room_category/{id}', [RoomCategoryController::class, 'update']);

# advantages API routes
    Route::get('/advantages', [AdvantageController::class, 'index']);
    Route::post('/advantages/{id}', [AdvantageController::class, 'update']);
//Route::delete('/advantages/{id}', [AdvantageController::class, 'destroy']);

# Reviews API routes
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::put('/reviews/{id}', [ReviewController::class, 'update']);
//    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);

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


Route::middleware('setLocale')->prefix('rooms')->group(function () {
# Rooms API routes
    Route::get('/', [RoomController::class, 'index']);
    Route::get('/{room_number}', [RoomController::class, 'show']);
    Route::post('/', [RoomController::class, 'store']);
    Route::put('/{room_number}', [RoomController::class, 'update']);
    Route::delete('/{room_number}', [RoomController::class, 'destroy']);
});

Route::middleware('setLocale')->prefix('reservation')->group(function () {
# Options API routes
    Route::post('/options', [OptionController::class, 'store']);
    Route::get('/options', [OptionController::class, 'index']);
    Route::put('/options/{id}', [OptionController::class, 'update']);
});

Route::put('users/{id}', [UserController::class, 'updateUserInfo']);
