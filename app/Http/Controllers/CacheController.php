<?php

namespace App\Http\Controllers;

use App\Core\Business\TemplatesBusiness;
use App\Core\Redis\LayoutRedis;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CacheController extends Controller
{
    public function clear()
    {
        // Clear application cache
        Artisan::call('cache:clear');
        // Clear compiled view files
        Artisan::call('view:clear');
        echo 'Clear cache app và cache view thành công.';
    }

    /**
     * @param  int  $reset
     * @return mixed
     *
     * @throws \Throwable
     */
    public static function cacheHTMLHeader()
    {
        return null;
        try {
            if (LayoutRedis::getHTMLHeader() == null) {
                $menu_header = TemplatesBusiness::getMenuByType();
                $html = view('layouts.partials.header')->with(['menu_header' => $menu_header])->render();
                try {
                    LayoutRedis::setHTMLHeader($html);
                } catch (Exception $exception) {
                    Log::error($exception->getMessage());
                }

                return $html;
            }

            return LayoutRedis::getHTMLHeader();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return null;
        }
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public static function cacheHTMLFooter()
    {
        return null;
        try {
            // Xử lý logic cache
            // 1) Get cache
            if (LayoutRedis::getHTMLFooter() == null) {
                // 2) If not have, set cache
                $menu_footer_1 = DB::table('menus')->select('item_url', 'item_title')->where([
                    ['is_actived', 1],
                    ['position', 'menu_footer_1'],
                ])->orderBy('order', 'ASC')->get();
                $menu_footer_2 = DB::table('menus')->select('item_url', 'item_title')->where([
                    ['is_actived', 1],
                    ['position', 'menu_footer_2'],
                ])->orderBy('order', 'ASC')->get();
                $setting = DB::table('settings')->first();
                if (! empty((array) $setting)) {
                    $setting = $setting;
                }//json_decode($setting->value, true);
                else {
                    $setting = ['telephone_contact' => '', 'email_contact' => '', 'copyright_left' => '', 'copyright_right' => ''];
                }
                $html = view('layouts.partials.footer')->with(['menu_footer_1' => $menu_footer_1, 'menu_footer_2' => $menu_footer_2, 'setting' => $setting])->render();
                try {
                    LayoutRedis::setHTMLFooter($html);
                } catch (Exception $exception) {
                    Log::error($exception->getMessage());
                }

                return $html;
            }

            return LayoutRedis::getHTMLFooter();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return null;
        }
    }
}
