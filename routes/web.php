<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BatchJobController;
use App\Http\Controllers\DateTimeController;
use Jenssegers\Agent\Agent;

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
    $agent = new Agent();
    if ($agent->isMobile()) {
        return view('homepage/mobile/index');
    } else {
        return view('homepage/index');
    }
});
Route::prefix('dang-ky')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('customer/mobile/register');
        } else {
            return view('customer/register');
        }
    });
});
Route::prefix('dang-nhap')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('customer/mobile/login');
        } else {
            return view('customer/login');
        }
    });
});
Route::prefix('danh-muc')->group(function () {
    Route::get('/{slug}.html', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('category/mobile/index');
        } else {
            return view('category/index');
        }
    });
});
Route::prefix('san-pham')->group(function () {
    Route::get('/{slug}.html', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('product/mobile/detail');
        } else {
            return view('product/detail');
        }
    });
});
Route::prefix('gio-hang')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('cart/mobile/index');
        } else {
            return view('cart/index');
        }
    });
});
Route::prefix('mua-hang')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('cart/mobile/buy');
        } else {
            return view('cart/buy');
        }
    });
});
Route::prefix('tim-kiem')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('search/mobile/index');
        } else {
            return view('search/index');
        }
    });
});
Route::prefix('khuyen-mai')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('promotion/mobile/index');
        } else {
            return view('promotion/index');
        }
    });
});
Route::prefix('tin-khuyen-mai')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('news/mobile/index');
        } else {
            return view('news/index');
        }
    });
    Route::get('/{slug}.html', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('news/mobile/detail');
        } else {
            return view('news/detail');
        }
    });
});
Route::prefix('tin-cong-nghe')->group(function () {
    Route::get('/', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('news/mobile/index');
        } else {
            return view('news/index');
        }
    });
    Route::get('/{slug}.html', function () {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('news/mobile/detail');
        } else {
            return view('news/detail');
        }
    });
});
Route::prefix('trang')->group(function () {
    Route::get('/gioi-thieu', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/about') : view('page/about');
    });
    Route::get('/chinh-sach-cho-khach-hang-doanh-nghiep', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/business') : view('page/business');
    });
    Route::get('/chinh-sach-game-net', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/game') : view('page/game');
    });
    Route::get('/vận-chuyển-giao-nhận-hàng-hóa', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/shipping') : view('page/shipping');
    });
    Route::get('/vận-chuyển-giao-nhận-hàng-hóa', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/shipping') : view('page/shipping');
    });
    Route::get('/chinh-sach-kinh-doanh', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/policy') : view('page/policy');
    });
    Route::get('/chinh-sach-bao-hanh', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/warranty') : view('page/warranty');
    });
    Route::get('/chinh-sach-doi-tra-san-pham', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/reform') : view('page/reform');
    });
});
Route::get('users/index', [UserController::class, 'index']);
Route::get('users/count', [UserController::class, 'count']);
Route::get('batch-job', [BatchJobController::class, 'run']);
Route::get('date-time', [DateTimeController::class, 'index']);
