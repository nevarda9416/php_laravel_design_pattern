<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BatchJobController;
use App\Http\Controllers\DateTimeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    return view('homepage/index');
});
Route::prefix('dang-ky')->group(function () {
    Route::get('/', function () {
        return view('customer/register');
    });
});
Route::prefix('dang-nhap')->group(function () {
    Route::get('/', function () {
        return view('customer/login');
    });
});
Route::prefix('danh-muc')->group(function () {
    Route::get('/{slug}.html', function () {
        return view('category/index');
    });
});
Route::prefix('san-pham')->group(function () {
    Route::get('/{slug}.html', function () {
        return view('product/detail');
    });
});
Route::prefix('gio-hang')->group(function () {
    Route::get('/', function () {
        return view('cart/index');
    });
});
Route::prefix('mua-hang')->group(function () {
    Route::get('/', function () {
        return view('cart/buy');
    });
});
Route::prefix('tim-kiem')->group(function () {
    Route::get('/', function () {
        return view('search/index');
    });
});
Route::get('users/index', [UserController::class, 'index']);
Route::get('users/count', [UserController::class, 'count']);
Route::get('batch-job', [BatchJobController::class, 'run']);
Route::get('date-time', [DateTimeController::class, 'index']);
