<?php

use App\Helpers\HttpHelper\Response;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchJobController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DateTimeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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
Route::get('/', function () {
    $rawResponse = app(Response::class)->getData('/products/all');
    $agent = new Agent;
    if ($agent->isMobile()) {
        return view('homepage/mobile/index', ['rawResponse' => $rawResponse]);
    } else {
        return view('homepage/index', ['rawResponse' => $rawResponse]);
    }
});
Route::prefix('dang-ky')->group(function () {
    Route::get('/', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('customer/mobile/register');
        } else {
            return view('customer/register');
        }
    });
    Route::post('/', [UserController::class, 'register']);
});
Route::prefix('dang-nhap')->group(function () {
    Route::get('/', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('customer/mobile/login');
        } else {
            return view('customer/login');
        }
    });
    Route::post('/', [UserController::class, 'login']);
});
Route::get('danh-muc/{slug}.html', [CategoryController::class, 'getProduct']);
Route::prefix('san-pham')->group(function () {
    Route::get('/{slug}.html', [ProductController::class, 'detail'])->name('product.detail');
});
Route::get('/gio-hang', [ShoppingCartController::class, 'index'])->name('cart.index');
Route::get('/list-products', [ShoppingCartController::class, 'listProducts']);
Route::get('/list-product', [ProductController::class, 'getProducts']);
Route::get('/product', [ProductController::class, 'setProduct']);
Route::prefix('mua-hang')->group(function () {
    Route::post('/', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('cart/mobile/buy');
        } else {
            return view('cart/buy');
        }
    });
});
Route::prefix('tim-kiem')->group(function () {
    Route::get('/', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('search/mobile/index');
        } else {
            return view('search/index');
        }
    });
});
Route::prefix('khuyen-mai')->group(function () {
    Route::get('/', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('promotion/mobile/index');
        } else {
            return view('promotion/index');
        }
    });
});
Route::prefix('tin-khuyen-mai')->group(function () {
    Route::get('/', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('news/mobile/index');
        } else {
            return view('news/index');
        }
    });
    Route::get('/{slug}.html', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('news/mobile/detail');
        } else {
            return view('news/detail');
        }
    });
});
Route::prefix('tin-cong-nghe')->group(function () {
    Route::get('/', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('news/mobile/index');
        } else {
            return view('news/index');
        }
    });
    Route::get('/{slug}.html', function () {
        $agent = new Agent;
        if ($agent->isMobile()) {
            return view('news/mobile/detail');
        } else {
            return view('news/detail');
        }
    });
});
Route::prefix('trang')->group(function () {
    Route::get('/{slug}', [PageController::class, 'detail'])->name('page.detail');
});
/*
    Route::get('gioi-thieu', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/about') : view('page/about');
    });
    Route::get('/thong-tin-lien-he', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/contact') : view('page/contact');
    });
    Route::get('/dieu-khoan-giao-dich', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/reform') : view('page/reform');
    });
    Route::get('/chinh-sach-bao-mat-thong-tin-khach-hang', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/policy') : view('page/policy');
    });
    Route::get('/chinh-sach-kinh-doanh', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/business') : view('page/business');
    });
    Route::get('/chinh-sach-cho-khach-hang-doanh-nghiep', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/enterprise') : view('page/enterprise');
    });
    Route::get('/chinh-sach-game-net', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/game') : view('page/game');
    });
    Route::get('/van-chuyen-giao-nhan-hang-hoa', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/shipping') : view('page/shipping');
    });
    Route::get('/chinh-sach-bao-hanh', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/warranty') : view('page/warranty');
    });
    Route::get('/chinh-sach-doi-tra-san-pham', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/reform') : view('page/reform');
    });
    Route::get('/chinh-sach-kiem-hang', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/inspect') : view('page/inspect');
    });
    Route::get('/huong-dan-mua-hang-online', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/online') : view('page/online');
    });
    Route::get('/phuong-thuc-thanh-toan', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/payment') : view('page/payment');
    });
    Route::get('/yeu-cau-bao-gia-ca-nhan', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/request_personal') : view('page/request_personal');
    });
    Route::get('/yeu-cau-bao-gia-doanh-nghiep', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/request_business') : view('page/request_business');
    });
    Route::get('/tu-van-san-pham', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/consulting') : view('page/consulting');
    });
    Route::get('/yeu-cau-bao-hanh', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/technical') : view('page/technical');
    });
    Route::get('/y-kien-khach-hang', function () {
        $agent = new Agent();
        return $agent->isMobile() ? view('page/mobile/complaint') : view('page/complaint');
    });
});
*/
Route::get('users/index', [UserController::class, 'index']);
Route::get('users/count', [UserController::class, 'count']);
Route::post('users/fcm-token', [AuthController::class, 'fcmToken']);
Route::get('batch-job', [BatchJobController::class, 'run']);
Route::get('date-time', [DateTimeController::class, 'index']);
/**
 * Giỏ hàng
 */
Route::post('/cart-update', [ShoppingCartController::class, 'updateContent'])->name('cart.updateContent');
/**
 * Upload item csv
 */
Route::get('/import', [ItemController::class, 'index']);
Route::post('/import', [ItemController::class, 'upload'])->name('import.upload');
