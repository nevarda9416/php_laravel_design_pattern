<?php

namespace App\Core\Redis;

use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;
use Illuminate\Support\Facades\Log;

class LayoutRedis
{
    /**
     * @param  $key
     * @return mixed
     */
    public static function getHTMLHeader()
    {
        try {
            $redis = RedisServer::getConnection(config()->get('constants.REDIS_HTML'));
            if ($redis !== null) {
                $resultRedis = $redis->get(RedisEnum::GET_HTML_HEADER);
            }
        } catch (\Exception $exception) {
            $resultRedis = null;
            Log::error($exception->getMessage());
        }

        return $resultRedis;
    }

    /**
     * @param  $id
     * @param  $data
     */
    public static function setHTMLHeader($view)
    {
        $redis = RedisServer::getConnection(config()->get('constants.REDIS_HTML'));
        if ($redis !== null) {
            $redis->set(RedisEnum::GET_HTML_HEADER, $view);
        }
    }

    /**
     * @param  $key
     * @return mixed
     */
    public static function getHTMLFooter()
    {
        try {
            $redis = RedisServer::getConnection(config()->get('constants.REDIS_HTML'));
            if ($redis !== null) {
                $resultRedis = $redis->get(RedisEnum::GET_HTML_FOOTER);
            }
        } catch (\Exception $exception) {
            $resultRedis = null;
            Log::error($exception->getMessage());
        }

        return $resultRedis;
    }

    /**
     * @param  $id
     * @param  $data
     */
    public static function setHTMLFooter($view)
    {
        $redis = RedisServer::getConnection(config()->get('constants.REDIS_HTML'));
        if ($redis !== null) {
            $redis->set(RedisEnum::GET_HTML_FOOTER, $view);
        }
    }
}
