<?php

namespace App\Core\Connection;

use App\Core\Enums\RedisEnum;
use Exception;
use Illuminate\Support\Facades\Log;
use Redis;

class RedisServer
{
    /**
     * @return Redis
     */
    public static function getConnection($db = RedisEnum::REDIS_DB)
    {
        try {
            $redis = new Redis;
            $redis->connect(config()->get('constants.REDIS_HOST'), config()->get('constants.REDIS_PORT'), 1);
            $redis->auth(config()->get('constants.REDIS_PASSWORD'));
            $redis->select($db);

            return $redis;
        } catch (Exception $e) {
            Log::error('Không thể kết nối được tới Redis: '.$e->getMessage()); // Log lỗi vào file

            return null;
        }
    }

    /**
     * @param  int  $db
     * @return Redis
     */
    public static function getOtherConnection($db = RedisEnum::REDIS_DB)
    {
        try {
            $redis = new Redis;
            $redis->connect(config()->get('constants.REDIS_OTHER_HOST'), config()->get('constants.REDIS_OTHER_PORT'), 1);
            $redis->auth(config()->get('constants.REDIS_OTHER_PASSWORD'));
            $redis->select($db);

            return $redis;
        } catch (Exception $e) {
            Log::error('Không thể kết nối được tới Redis: '.$e->getMessage()); // Log lỗi vào file

            return null;
        }
    }

    /**
     * @return mixed|string
     */
    public static function getKey($key, $db = 1, $otherConnection = 0)
    {
        try {
            if ($otherConnection == 1) {
                $redis = RedisServer::getOtherConnection($db);
            } else {
                $redis = RedisServer::getConnection($db);
            }
            if ($redis !== null) {
                $result_item = $redis->get($key);

                return json_decode($result_item, true);
            }
        } catch (Exception $e) {
            Log::error('Không lấy được dữ liệu từ Redis: '.$e->getMessage()); // Log lỗi vào file

            return 'Không lấy được dữ liệu từ Redis: '.$e->getMessage(); // return lỗi
        }
    }

    public static function setKey($key, $data, $db = 1)
    {
        try {
            $redis = RedisServer::getConnection($db);
            $redis->set($key, $data);
        } catch (Exception $e) {
            Log::error('Không set được dữ liệu Redis: '.$e->getMessage()); // Log lỗi vào file
        }
    }

    /**
     * @param  $keys  = array(key1, key2, key3, ...)
     * @return array|string
     */
    public static function mget($keys, $db = 1, $otherConnection = 0)
    {
        try {
            if ($otherConnection == 1) {
                $redis = RedisServer::getOtherConnection($db);
            } else {
                $redis = RedisServer::getConnection($db);
            }
            if ($redis !== null) {
                $result_item = $redis->mget($keys);
                if (! empty($result_item)) {
                    foreach ($result_item as $k => $v) {
                        $result_item[$k] = json_decode($v, true);
                    }
                }

                return $result_item;
            }
        } catch (Exception $e) {
            Log::error('Không lấy được dữ liệu từ Redis: '.$e->getMessage());

            return 'Không lấy được dữ liệu từ Redis: '.$e->getMessage();
        }
    }
}
