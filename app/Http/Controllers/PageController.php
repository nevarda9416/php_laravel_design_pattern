<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/22/2024
 * Time: 11:14 PM
 */

namespace App\Http\Controllers;

use App\Core\Enums\PageEnum;
use App\Helpers\HttpHelper\Response;
use Jenssegers\Agent\Agent;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail($slug)
    {
        $page = app(Response::class)->getData('/pages/slug/'.$slug);
        $agent = new Agent;
        $pageData = $page['data'];
        if ($pageData) {
            $view = 'index';
        } else {
            $view = match ($slug) {
                PageEnum::GIOI_THIEU => config('constants.FOLDER_NAME_TEMPLATE').'/about',
                PageEnum::THONG_TIN_LIEN_HE => config('constants.FOLDER_NAME_TEMPLATE').'/contact',
                PageEnum::DIEU_KHOAN_GIAO_DICH => config('constants.FOLDER_NAME_TEMPLATE').'/reform',
                PageEnum::CHINH_SACH_BAO_MAT_THONG_TIN_KHACH_HANG => config('constants.FOLDER_NAME_TEMPLATE').'/policy',
                PageEnum::CHINH_SACH_KINH_DOANH => config('constants.FOLDER_NAME_TEMPLATE').'/business',
                PageEnum::CHINH_SACH_CHO_KHACH_HANG_DOANH_NGHIEP => config('constants.FOLDER_NAME_TEMPLATE').'/enterprise',
                PageEnum::CHINH_SACH_GAME_NET => config('constants.FOLDER_NAME_TEMPLATE').'/game',
                PageEnum::VAN_CHUYEN_GIAO_NHAN_HANG_HOA => config('constants.FOLDER_NAME_TEMPLATE').'/shipping',
                PageEnum::CHINH_SACH_BAO_HANH => config('constants.FOLDER_NAME_TEMPLATE').'/warranty',
                PageEnum::CHINH_SACH_DOI_TRA_SAN_PHAM => config('constants.FOLDER_NAME_TEMPLATE').'/reform',
                PageEnum::CHINH_SACH_KIEM_HANG => config('constants.FOLDER_NAME_TEMPLATE').'/inspect',
                PageEnum::HUONG_DAN_MUA_HANG_ONLINE => config('constants.FOLDER_NAME_TEMPLATE').'/online',
                PageEnum::PHUONG_THUC_THANH_TOAN => config('constants.FOLDER_NAME_TEMPLATE').'/payment',
                PageEnum::YEU_CAU_BAO_GIA_CA_NHAN => config('constants.FOLDER_NAME_TEMPLATE').'/request_personal',
                PageEnum::YEU_CAU_BAO_GIA_DOANH_NGHIEP => config('constants.FOLDER_NAME_TEMPLATE').'/request_business',
                PageEnum::TU_VAN_SAN_PHAM => config('constants.FOLDER_NAME_TEMPLATE').'/consulting',
                PageEnum::YEU_CAU_BAO_HANH => config('constants.FOLDER_NAME_TEMPLATE').'/technical',
                PageEnum::Y_KIEN_KHACH_HANG => config('constants.FOLDER_NAME_TEMPLATE').'/complaint',
                default => 'index'
            };
        }
        if ($agent->isMobile()) {
            return view('page/mobile/'.$view, ['page' => $pageData]);
        } else {
            return view('page/'.$view, ['page' => $pageData, 'slug' => $slug]);
        }
    }
}
