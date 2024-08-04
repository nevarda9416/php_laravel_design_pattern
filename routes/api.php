<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ViewPublicUserProfileController;
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
Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('/v2')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});
Route::post('login', [UserController::class], 'login');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::prefix('contracts')->group(function () {
        Route::patch('status', [ContractController::class, 'update'])
            ->name('contracts.status.update');
    });
});
Route::get('/profiles/{user:public_profile_slug}', ViewPublicUserProfileController::class)//Giải nghĩa cách viết???
    ->name('users.profile.view.public');
Route::fallback(function () {
    return response()->json([
        'message' => 'PageEnum Not Found. If error persists, contact info@website.com',
    ], 404);
});
