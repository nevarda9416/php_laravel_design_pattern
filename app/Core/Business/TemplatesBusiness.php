<?php

namespace App\Core\Business;

use App\Core\Connection\RedisServer;
use App\Core\Enums\CommonEnum;
use App\Core\Models\Templates;
use Illuminate\Support\Facades\DB;

class TemplatesBusiness extends Templates
{
    /**
     * @return array
     */
    public static function getAllContent($mobileKey = '')
    {
        $result = [];
        $redis = RedisServer::getConnection();
        if ($redis !== null) {
            $result[CommonEnum::HOME_BANNER_TOP] = $redis->get(CommonEnum::HOME_BANNER_TOP.$mobileKey);
            $result[CommonEnum::HOME_BANNER_LEFT] = $redis->get(CommonEnum::HOME_BANNER_LEFT.$mobileKey);
            $result[CommonEnum::HOME_BANNER_BOTTOM] = $redis->get(CommonEnum::HOME_BANNER_BOTTOM.$mobileKey);
            $result[CommonEnum::HOME_SECTION_HD] = $redis->get(CommonEnum::HOME_SECTION_HD.$mobileKey);
            $result[CommonEnum::HOME_SECTION_TTB] = $redis->get(CommonEnum::HOME_SECTION_TTB.$mobileKey);
            $result[CommonEnum::HOME_SECTION_TTNB] = $redis->get(CommonEnum::HOME_SECTION_TTNB.$mobileKey);
            $result[CommonEnum::HOME_SECTION_HDCG] = $redis->get(CommonEnum::HOME_SECTION_HDCG.$mobileKey);
            $result[CommonEnum::HOME_SECTION_STB] = $redis->get(CommonEnum::HOME_SECTION_STB.$mobileKey);
            $result[CommonEnum::HOME_SECTION_NN] = $redis->get(CommonEnum::HOME_SECTION_NN.$mobileKey);
            $result[CommonEnum::HOME_SECTION_SEO] = [];
            if ($redis->exists(CommonEnum::HOME_SECTION_SEO) == 1) {
                $dataSeo = json_decode($redis->get(CommonEnum::HOME_SECTION_SEO), true);
                if (isset($dataSeo[0])) {
                    $result[CommonEnum::HOME_SECTION_SEO] = $dataSeo[0];
                }
            }
            if (empty($result[CommonEnum::HOME_SECTION_SEO])) {
                $re0 = DB::table('templates')->where('key', '=', CommonEnum::HOME_SECTION_SEO)->pluck('data_template', 'key');
                foreach ($re0 as $key => $data) {
                    $redis->set($key, $data);
                }
            }
            if ($result[CommonEnum::HOME_BANNER_TOP] == ''
                || $result[CommonEnum::HOME_BANNER_LEFT] == ''
                || $result[CommonEnum::HOME_BANNER_BOTTOM] == ''
                || $result[CommonEnum::HOME_SECTION_HD] == ''
                || $result[CommonEnum::HOME_SECTION_TTB] == ''
                || $result[CommonEnum::HOME_SECTION_TTNB] == ''
                || $result[CommonEnum::HOME_SECTION_HDCG] == ''
                || $result[CommonEnum::HOME_SECTION_STB] == ''
                || $result[CommonEnum::HOME_SECTION_NN] == ''
            ) {
                $re1 = DB::table('templates')->where('key', '!=', CommonEnum::HOME_SECTION_SEO)->pluck('content', 'key');
                foreach ($re1 as $key => $data) {
                    $dataT = json_decode($data, true);
                    $redis->set($key, $dataT['d']);
                    $redis->set($key.'_m', $dataT['m']);
                }
            }
        }

        return $result;
    }

    public static function getDataContent($key = '', $row = 1)
    {
        $result = [];
        $dataT = [];
        $redis = RedisServer::getConnection();
        if ($redis !== null && $key != '') {
            $data = $redis->get(CommonEnum::HOME_SECTION_DATA.$key);
            if (! empty($data)) {
                $dataT = json_decode($data, true);
            } else {
                $re1 = DB::table('templates')->where('key', '=', $key)->select('data_template')->first();
                if ($re1) {
                    $dataT = json_decode($re1->data_template, true);
                    $redis->set(CommonEnum::HOME_SECTION_DATA.$key, $re1->data_template);
                }
            }
        }

        if (count($dataT) > $row) {
            $rKeys = array_rand($dataT, $row);
            foreach ($rKeys as $k) {
                $result[] = $dataT[$k];
            }
        } else {
            $result = $dataT;
        }

        return $result;
    }

    public static function getMenuByType($type = 'menu_header')
    {
        $result = [];

        return $result;
        $menus = DB::table('menus')->select('id', 'parent_id', 'item_url', 'item_title', 'order')
            ->where([['is_actived', 1], ['position', $type]])
            ->orderBy('order', 'ASC')->get();
        if (count($menus) > 0) {
            foreach ($menus as $menu) {
                if ($menu->parent_id == 0) {
                    $result[$menu->id] = ['id' => $menu->id, 'item_url' => $menu->item_url, 'item_title' => $menu->item_title, 'order' => $menu->order];
                    $sortO = [];
                } else {
                    if (isset($result[$menu->parent_id])) {
                        $result[$menu->parent_id]['chinld'][] = ['id' => $menu->id, 'item_url' => $menu->item_url, 'item_title' => $menu->item_title, 'order' => $menu->order];
                    }
                }
            }

            $order = array_column($result, 'order');
            array_multisort($order, SORT_ASC, $result);
        }

        return $result;
    }
}
