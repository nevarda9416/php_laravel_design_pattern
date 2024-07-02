<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/22/2024
 * Time: 11:14 PM
 */

namespace App\Http\Controllers;

use App\Enums\Page;
use App\Helpers\HttpHelper\Response;
use Jenssegers\Agent\Agent;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail($slug)
    {
        $page = app(Response::class)->responseData('/pages/slug/'.$slug);
        $agent = new Agent();
        $view = match ($slug) {
            Page::GIOI_THIEU => config('constants.FOLDER_NAME_TEMPLATE').'/about',
            Page::THONG_TIN_LIEN_HE => config('constants.FOLDER_NAME_TEMPLATE').'/contact',
            Page::DIEU_KHOAN_GIAO_DICH => config('constants.FOLDER_NAME_TEMPLATE').'/reform',
            Page::CHINH_SACH_BAO_MAT_THONG_TIN_KHACH_HANG => config('constants.FOLDER_NAME_TEMPLATE').'/policy',
            Page::CHINH_SACH_KINH_DOANH => config('constants.FOLDER_NAME_TEMPLATE').'/business',
            Page::CHINH_SACH_CHO_KHACH_HANG_DOANH_NGHIEP => config('constants.FOLDER_NAME_TEMPLATE').'/enterprise',
            Page::CHINH_SACH_GAME_NET => config('constants.FOLDER_NAME_TEMPLATE').'/game',
            Page::VAN_CHUYEN_GIAO_NHAN_HANG_HOA => config('constants.FOLDER_NAME_TEMPLATE').'/shipping',
            Page::CHINH_SACH_BAO_HANH => config('constants.FOLDER_NAME_TEMPLATE').'/warranty',
            Page::CHINH_SACH_DOI_TRA_SAN_PHAM => config('constants.FOLDER_NAME_TEMPLATE').'/reform',
            Page::CHINH_SACH_KIEM_HANG => config('constants.FOLDER_NAME_TEMPLATE').'/inspect',
            Page::HUONG_DAN_MUA_HANG_ONLINE => config('constants.FOLDER_NAME_TEMPLATE').'/online',
            Page::PHUONG_THUC_THANH_TOAN => config('constants.FOLDER_NAME_TEMPLATE').'/payment',
            Page::YEU_CAU_BAO_GIA_CA_NHAN => config('constants.FOLDER_NAME_TEMPLATE').'/request_personal',
            Page::YEU_CAU_BAO_GIA_DOANH_NGHIEP => config('constants.FOLDER_NAME_TEMPLATE').'/request_business',
            Page::TU_VAN_SAN_PHAM => config('constants.FOLDER_NAME_TEMPLATE').'/consulting',
            Page::YEU_CAU_BAO_HANH => config('constants.FOLDER_NAME_TEMPLATE').'/technical',
            Page::Y_KIEN_KHACH_HANG => config('constants.FOLDER_NAME_TEMPLATE').'/complaint',
            default => 'index'
        };
        if ($agent->isMobile()) {
            return view('page/mobile/'.$view, ['page' => $page['data']]);
        } else {
            return view('page/'.$view, ['page' => $page['data'], 'slug' => $slug]);
        }
    }
}
