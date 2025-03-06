<?php

namespace App\Base\Controllers;

use App\Core\Business\TemplatesBusiness;
use App\Http\Controllers\CacheController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent as Agent;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $userInfo = null;
        $agent = new Agent;
        if (isset($_COOKIE[config()->get('constants.COOKIE_USER_DATA')])) {
            $cookie_data = stripslashes($_COOKIE[config()->get('constants.COOKIE_USER_DATA')]);
            $user_data = json_decode($cookie_data, true);
            $userInfo = $user_data[0];
        }
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        [$controller, $action] = explode('@', $controllerAction);
        view()->share('action', $action);
        view()->share('controller', $controller);
        view()->share('userInfo', $userInfo);
        view()->share('isMobile', $agent->isMobile());
        if (! request()->ajax()) {
            $layout = 'layouts.default';
            if (config()->get('constants.ALLOW_GET_DATA_MENU')) {
                view()->composer($layout, function ($view) {
                    $menu_header = TemplatesBusiness::getMenuByType();
                    $menu_footer_1 = $menu_footer_2 = [];
                    /*
                    $menus = DB::table('menus')->select('parent_id', 'has_child', 'category_id', 'item_url', 'item_title', 'position')->where([
                        ['is_actived', 1]
                    ])->orderBy('order', 'ASC')->get();
                    if (count($menus) > 0) {
                        foreach ($menus as $row) {
                            switch ($row->position) {
                                case "menu_footer_1":
                                    $menu_footer_1[] = $row;
                                    break;
                                case "menu_footer_2":
                                    $menu_footer_2[] = $row;
                                    break;
                            }
                        }
                    }
                    */
                    $view->with(['menu_header' => $menu_header, 'menu_footer_1' => $menu_footer_1, 'menu_footer_2' => $menu_footer_2]);
                });
            }
            if (config()->get('constants.ALLOW_GET_DATA_INFO')) {
                view()->composer('layouts.partials.header', function ($view) {
                    $setting = DB::table('settings')->first();
                    if (! empty((array) $setting)) {
                        $setting = $setting;
                    }//json_decode($setting->value, true);
                    else {
                        $setting = ['telephone_contact' => '', 'email_contact' => '', 'copyright_left' => '', 'copyright_right' => ''];
                    }
                    $view->with(['setting' => $setting]);
                });
            }
            if (CacheController::cacheHTMLHeader() != null) {
                view()->composer('layouts.partials.header', function ($view) {
                    $view->with(['html_header' => CacheController::cacheHTMLHeader()]);
                });
            }
            if (CacheController::cacheHTMLFooter() != null) {
                view()->composer('layouts.partials.footer', function ($view) {
                    $view->with(['html_footer' => CacheController::cacheHTMLFooter()]);
                });
            }
        }
    }
}
