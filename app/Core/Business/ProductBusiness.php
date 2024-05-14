<?php

namespace App\Core\Business;

use App\Core\Connection\ElasticsearchServer;
use App\Core\Connection\RedisServer;
use App\Core\Enums\ApiEnum;
use App\Core\Enums\CommonEnum;
use App\Core\Enums\RedisEnum;
use App\Core\Utilities\FileLogUtility;
use App\Core\Utilities\HtmlFormatUtility;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class ProductBusiness
{
    public static function get_product_detail($id)
    {
        try {
            $key = RedisEnum::PRODUCT_DETAIL_KEY . $id;
            $data = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            if (count((array)$data) == 0) {
                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_DETAIL . $id;
                $data = Curl::to($url)->get();
                $data = json_decode($data, true);
                $data = isset($data['data']) ? $data['data'] : [];
            }

            return $data;
        } catch (\Exception  $e) {
            return [];
        }
    }

    public static function get_all_categories()
    {
        try {
            $key = RedisEnum::PRODUCT_CATEGORIES_KEY;
            $data = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            if (empty($data)) {
                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_ALL_CATES;
                $data = Curl::to($url)->withTimeout(config()->get('constants.CURLOPT_TIMEOUT'))
                    ->enableDebug(FileLogUtility::createFileLog('api'))->get();
                $data = json_decode($data, true);
                $data = isset($data['data']) ? $data['data'] : '';
            }
            return $data;
        } catch (\Exception  $e) {
            return [];
        }
    }

    public static function get_all_products()
    {
        try {
            $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_ALL_PRODUCTS;
            $data = Curl::to($url)->get();
            $data = json_decode($data, true);
            $data = isset($data['data']) ? $data['data'] : array();
            if (count($data) > 0) {
                foreach ($data as $key => $val) {
                    $displayOrder[$key][] = $val['DisplayOrder'];
                    $data[$key]['Products'] = ProductBusiness::getListProductByIds($val['Products']);
                }

                array_multisort($displayOrder, SORT_ASC, $data);
            }

            return $data;
        } catch (\Exception  $e) {
            return [];
        }
    }

    public static function allProducts()
    {
        try {
            $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_ALL_PRODUCTS;
            $data = Curl::to($url)->get();
            $data = json_decode($data, true);
            $data = isset($data['data']) ? $data['data'] : array();
            if (count($data) > 0) {
                $products = [];
                foreach ($data as $key => $val) {
                    $products = array_merge($products, $val['Products']);
                }

                $data = ProductBusiness::getListProductByIds($products);
            }

            return $data;
        } catch (\Exception  $e) {
            return [];
        }
    }

    public static function get_related_products($id)
    {
        try {
            $key = RedisEnum::PRODUCT_RELATED_PRODUCTS . $id;
            $data = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            $data = isset($data['TargetProducts']) ? $data['TargetProducts'] : null;
            if ($data == null) {
                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_RELATED . $id;
                $data = Curl::to($url)->get();
                $data = json_decode($data, true);
                $data = isset($data['data']['TargetProducts']) ? $data['data']['TargetProducts'] : null;
            }
            $data = $data != null && count($data) > 0 ? array_slice($data, 0, 4) : [];
            $products = ProductBusiness::getListProductByIds($data);
            return $products;
        } catch (\Exception  $e) {
            return [];
        }
    }

    public static function get_products_breadcrumb($id)
    {
        try {
            /*$key = RedisEnum::PRODUCT_GET_BREADCRUMB . $id;
            $data = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            $data = isset($data['data'])?$data['TargetProducts'] : null;*/
            $data = null;
            if ($data == null) {
                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_BREADCRUMB . $id;
                $data = Curl::to($url)->get();
                $data = json_decode($data, true);
                $data = isset($data['data']) ? $data['data'] : null;
            }
            return $data;
        } catch (\Exception  $e) {
            return [];
        }
    }

    public static function rename_img($img)
    {
        $newimg = [];
        if ($img != "") {
            $arr_img = explode('.', $img);
            if (count($arr_img) > 0) {
                $img_ext = $arr_img[count($arr_img) - 1];
                if ($img_ext != "") {
                    $arr_img = explode('.' . $img_ext, $img);
                    $newimg[CommonEnum::IMAGE_SIZE_SMALL] = config()->get('constants.PRODUCT_IMAGES') . $arr_img[0] . '_' . CommonEnum::IMAGE_SIZE_SMALL . '.' . $img_ext;
                    $newimg[CommonEnum::IMAGE_SIZE_MEDIUM] = config()->get('constants.PRODUCT_IMAGES') . $arr_img[0] . '_' . CommonEnum::IMAGE_SIZE_MEDIUM . '.' . $img_ext;
                    $newimg[CommonEnum::IMAGE_SIZE_LARGE] = config()->get('constants.PRODUCT_IMAGES') . $arr_img[0] . '_' . CommonEnum::IMAGE_SIZE_LARGE . '.' . $img_ext;
                    $newimg[CommonEnum::IMAGE_SIZE_XLARGE] = config()->get('constants.PRODUCT_IMAGES') . $arr_img[0] . '_' . CommonEnum::IMAGE_SIZE_XLARGE . '.' . $img_ext;
                }
            }
        }
        return $newimg;
    }

    public static function get_category_banners($cate_id)
    {
        try {
            $category_banner = \DB::table('category_has_banners as a')
                ->where('a.cate_id', '=', $cate_id)
                ->join('banners as b', 'a.banner_id', '=', 'b.id')
                ->select('a.*', 'b.name as banner_name', 'b.description as banner_description', 'b.banner_url as banner_url')
                ->distinct()
                ->get();
            $category_banner = json_decode($category_banner, true);
            $seq = 0;
            $cate_banners = [];
            $cate_seo = [];
            if (count($category_banner) > 0) {
                foreach ($category_banner as $val) {
                    if (isset($val)) {
                        // the cate banner data
                        $cate_banner['name'] = $val['banner_name'];
                        $cate_banner['description'] = $val['banner_description'];
                        $cate_banner['url'] = config()->get('constants.STATIC_IMAGES') . $val['banner_url'];
                        $cate_banners['banners'][] = $cate_banner;
                        if ($val['banner_id'] == $val['is_default']) {
                            $cate_banners['default']['name'] = $val['banner_name'];
                            $cate_banners['default']['description'] = $val['banner_description'];
                            $cate_banners['default']['url'] = config()->get('constants.STATIC_IMAGES') . $val['banner_url'];
                        }
                        // the seo data
                        if ($seq == 0) {
                            $cate_seo['meta_title'] = $val['meta_title'];
                            $cate_seo['meta_keyword'] = $val['meta_keyword'];
                            $cate_seo['meta_description'] = $val['meta_description'];
                            $cate_seo['meta_image'] = config()->get('constants.STATIC_IMAGES') . $val['thumb_url'];
                            $seq++;
                        }
                    }
                }
            }
            return ['cate_banners' => $cate_banners, 'cate_seo' => $cate_seo];
        } catch (\Exception  $e) {
            return [];
        }
    }

    public static function getListFavoriteProduct($perPage = 8)
    {
        try {
            $key = RedisEnum::LIST_FAVORITE_PRODUCTS;
            $dataP = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            if (empty($dataP)) {
                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::GET_LIST_FAVORITE_PORDUCTS . '?take=' . $perPage;
                $dataP = Curl::to($url)->withTimeout(config()->get('constants.CURLOPT_TIMEOUT'))
                    ->enableDebug(FileLogUtility::createFileLog('api'))->get();
                $dataP = json_decode($dataP, true);
                $dataP = $dataP['data'];
            }

            $dataP = array_slice($dataP, 0, $perPage);
            $products = ProductBusiness::getListProductByIds($dataP);
            return $products;
        } catch (\Exception $e) {
            return array();
        }
    }

    public static function getListProductByIds($ids)
    {
        $products = [];
        if (is_array($ids) && count($ids) > 0) {
            $dataK = [];
            foreach ($ids as $item => $productId) {
                $dataK[] = RedisEnum::PRODUCT_DETAIL_KEY . $productId;
            }

            //Check promotion
            $promotions = ProductBusiness::getPromotionByProducts($ids);
            $result = RedisServer::mget($dataK, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            $dP = [];
            if (count($result) > 0) {
                foreach ($result as $key => $value) {
                    $dP[$value['Id']] = array(
                        'Id' => $value['Id'],
                        'url_detail' => url('/san-pham/' . $value['SeoId'] . '-' . $value['Id'] . '.html'),
                        'Sku' => isset($value['ProductSkus'][0]['Sku']) ? $value['ProductSkus'][0]['Sku'] : '',
                        'WeightGram' => isset($value['ProductSkus'][0]['WeightGram']) ? $value['ProductSkus'][0]['WeightGram'] : '',
                        'ConvertedWeightGram' => isset($value['ProductSkus'][0]['ConvertedWeightGram']) ? $value['ProductSkus'][0]['ConvertedWeightGram'] : '',
                        'DimensionXCm' => isset($value['ProductSkus'][0]['DimensionXCm']) ? $value['ProductSkus'][0]['DimensionXCm'] : '',
                        'DimensionYCm' => isset($value['ProductSkus'][0]['DimensionYCm']) ? $value['ProductSkus'][0]['DimensionYCm'] : '',
                        'DimensionZCm' => isset($value['ProductSkus'][0]['DimensionZCm']) ? $value['ProductSkus'][0]['DimensionZCm'] : '',
                        'Name' => $value['Name'],
                        'Status' => $value['Status'],
                        'ShortDescription1' => $value['ShortDescription1'],
                        'ThumbnailUrl' => isset($value['ThumbnailUrl']) ? $value['ThumbnailUrl'] : '',
                        'SalePrice' => isset($value['ProductSkus'][0]['SalePrice']) ? $value['ProductSkus'][0]['SalePrice'] : ''
                    );
                }
            }

            foreach ($ids as $item => $productId) {
                if (isset($dP[$productId])) {
                    $products[$item] = $dP[$productId];
                    if (isset($promotions[$productId])) {
                        $products[$item]['promotion'] = $promotions[$productId];
                    }
                } else {
                    $pr = ProductBusiness::getProductDetailAPI($productId);
                    if (!empty($pr)) {
                        $products[$item] = $pr;
                        if (isset($promotions[$productId])) {
                            $products[$item]['promotion'] = $promotions[$productId];
                        }
                    }
                }
            }
        }

        return $products;
    }

    public static function getListProductCheckoutByIds($ids)
    {
        $products = [];
        if (is_array($ids) && count($ids) > 0) {
            $dataK = [];
            foreach ($ids as $item) {
                $dataK[] = $item['productId'];//RedisEnum::PRODUCT_DETAIL_KEY . $item['productId'];
            }

            //Check promotion
            $promotions = [];//ProductBusiness::getPromotionCheckouByProducts($ids);
            // Call API spring boot get product detail
//dd($dataK);
            $result = [];//RedisServer::mget($dataK, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            $dP = [];
            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    if (isset($value['Id'])) {
                        $dP[$value['Id']] = array(
                            'Id' => $value['Id'],
                            'url_detail' => url('/san-pham/' . $value['SeoId'] . '-' . $value['Id'] . '.html'),
                            'Sku' => isset($value['ProductSkus'][0]['Sku']) ? $value['ProductSkus'][0]['Sku'] : '',
                            'WeightGram' => isset($value['ProductSkus'][0]['WeightGram']) ? $value['ProductSkus'][0]['WeightGram'] : '',
                            'ConvertedWeightGram' => isset($value['ProductSkus'][0]['ConvertedWeightGram']) ? $value['ProductSkus'][0]['ConvertedWeightGram'] : '',
                            'DimensionXCm' => isset($value['ProductSkus'][0]['DimensionXCm']) ? $value['ProductSkus'][0]['DimensionXCm'] : '',
                            'DimensionYCm' => isset($value['ProductSkus'][0]['DimensionYCm']) ? $value['ProductSkus'][0]['DimensionYCm'] : '',
                            'DimensionZCm' => isset($value['ProductSkus'][0]['DimensionZCm']) ? $value['ProductSkus'][0]['DimensionZCm'] : '',
                            'Name' => isset($value['Name']) ? $value['Name']: '',
                            'Status' => isset($value['Status']) ? $value['Status'] : '' ,
                            'ShortDescription1' => isset($value['ShortDescription1']) ? $value['ShortDescription1'] : '',
                            'ThumbnailUrl' => isset($value['ThumbnailUrl']) ? $value['ThumbnailUrl'] : '',
                            'SalePrice' => isset($value['ProductSkus'][0]['SalePrice']) ? $value['ProductSkus'][0]['SalePrice'] : ''
                        );
                    }
                }
            }

            foreach ($ids as $item) {
                if (isset($dP[$item['productId']])) {
                    $products[$item['productId']] = $dP[$item['productId']];
                    if (isset($promotions[$item['productId']])) {
                        $products[$item['productId']]['promotion'] = $promotions[$item['productId']];
                    }
                } else {
                    $pr = [];//ProductBusiness::getProductDetailAPI($item['productId']);
                    if (!empty($pr)) {
                        $products[$item['productId']] = $pr;
                        if (isset($promotions[$item['productId']])) {
                            $products[$item['productId']]['promotion'] = $promotions[$item['productId']];
                        }
                    }
                }
            }
        }

        return $products;
    }

    public static function getListHighlightProduct($perPage = 4)
    {
        try {
            $key = RedisEnum::LIST_HIGHLIGHTED_PRODUCTS;
            $dataP = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
            if (empty($dataP)) {
                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::GET_LIST_HIGHLIGHTED_PRODUCTS;
                $dataP = Curl::to($url)->withTimeout(config()->get('constants.CURLOPT_TIMEOUT'))
                    ->enableDebug(FileLogUtility::createFileLog('api'))->get();
                $dataP = json_decode($dataP, true);
                $dataP = $dataP['data'];
            }

            $dataP = array_slice($dataP, 0, $perPage);
            $products = ProductBusiness::getListProductByIds($dataP);
            return $products;
        } catch (\Exception $e) {
            return array();
        }
    }

    /**
     * @param $postId
     * @return array|\Illuminate\Support\Collection
     */
    public static function getAllListHighlightProducts($postId)
    {
        try {
            $dataP1 = array();
            if ($postId > 0) {
                $products = DB::table('posts_has_products')->select('product_id')->where('post_id', $postId)->orderBy('product_order', 'ASC')->get();
                foreach ($products as $product) {
                    if (isset($product->product_id)) {
                        array_push($dataP1, $product->product_id);
                    }
                }
            }
            if (count($dataP1) < 4) {
                $key = RedisEnum::LIST_HIGHLIGHTED_PRODUCTS;
                $dataP2 = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
                if (empty($dataP2)) {
                    $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::GET_LIST_HIGHLIGHTED_PRODUCTS;
                    $dataP2 = Curl::to($url)->withTimeout(config()->get('constants.CURLOPT_TIMEOUT'))
                        ->enableDebug(FileLogUtility::createFileLog('api'))->get();
                    $dataP2 = json_decode($dataP2, true);
                    $dataP2 = isset($dataP2['data']) ? $dataP2['data'] : array();
                }
                shuffle($dataP2); // Không muốn random hiển thị list sản phẩm thì comment dòng này
                $dataP = array_unique(array_merge($dataP1, $dataP2));
            } else {
                $dataP = $dataP1;
            }
            $products = ProductBusiness::getListProductByIds($dataP);
            return $products;
        } catch (\Exception $e) {
            return array();
        }
    }

    public static function getListRelatedProduct($categoryProductId, $perPage = 4)
    {
        try {
            $products = [];
            if ($categoryProductId != null) {
                $key = RedisEnum::PRODUCT_GET_PRODUCTS_BY_CATEGORY . $categoryProductId;
                $dataP = RedisServer::getKey($key, config()->get('constants.REDIS_PRODUCT_DB'), 1);
                if (empty($dataP)) {
                    $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCTS_BY_CATEGORY . $categoryProductId;
                    $dataP = Curl::to($url)->withTimeout(config()->get('constants.CURLOPT_TIMEOUT'))
                        ->enableDebug(FileLogUtility::createFileLog('api'))->get();
                    $dataP = json_decode($dataP, true);
                    $dataP = $dataP['data'];
                }

                $dataP = array_slice($dataP, 0, $perPage);
                $products = ProductBusiness::getListProductByIds($dataP);
            }
            return $products;
        } catch (\Exception $e) {
            return array();
        }
    }

    public static function getProductDetailAPI($productId)
    {
        $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_DETAIL . $productId;
        $dataP = Curl::to($url)->get();
        $dataP = json_decode($dataP, true);
        $result = [];
        if (isset($dataP['data']) && count($dataP['data'])) {
            if (isset($dataP['data']['Status']) && $dataP['data']['Status'] != 'disabled') {
                $result = array(
                    'Id' => $dataP['data']['Id'],
                    'url_detail' => url('/san-pham/' . $dataP['data']['SeoId'] . '-' . $dataP['data']['Id'] . '.html'),
                    'Sku' => isset($dataP['data']['ProductSkus'][0]['Sku']) ? $dataP['data']['ProductSkus'][0]['Sku'] : '',
                    'WeightGram' => isset($dataP['data']['ProductSkus'][0]['WeightGram']) ? $dataP['data']['ProductSkus'][0]['WeightGram'] : '',
                    'ConvertedWeightGram' => isset($dataP['data']['ProductSkus'][0]['ConvertedWeightGram']) ? $dataP['data']['ProductSkus'][0]['ConvertedWeightGram'] : '',
                    'DimensionXCm' => isset($dataP['data']['ProductSkus'][0]['DimensionXCm']) ? $dataP['data']['ProductSkus'][0]['DimensionXCm'] : '',
                    'DimensionYCm' => isset($dataP['data']['ProductSkus'][0]['DimensionYCm']) ? $dataP['data']['ProductSkus'][0]['DimensionYCm'] : '',
                    'DimensionZCm' => isset($dataP['data']['ProductSkus'][0]['DimensionZCm']) ? $dataP['data']['ProductSkus'][0]['DimensionZCm'] : '',
                    'Name' => $dataP['data']['Name'],
                    'Status' => $dataP['data']['Status'],
                    'ShortDescription1' => $dataP['data']['ShortDescription1'],
                    'ThumbnailUrl' => isset($dataP['data']['ThumbnailUrl']) ? $dataP['data']['ThumbnailUrl'] : '',
                    'SalePrice' => isset($dataP['data']['ProductSkus'][0]['SalePrice']) ? $dataP['data']['ProductSkus'][0]['SalePrice'] : ''
                );
            }
        }

        return $result;
    }

    public static function getCategoryBySlug($catesandsub, $slug)
    {
        $category = [];
        if (!empty($catesandsub) && count((array)$catesandsub) > 0) {
            foreach ($catesandsub as $v) {
                if (isset($v['SeoId']) && $v['SeoId'] == $slug) {
                    $category = array('Id' => $v['Id'], 'Name' => $v['Name'], 'SeoId' => $v['SeoId'], 'ParentId' => $v['ParentId']);
                    break;
                } else {
                    if (isset($v['Child']) && count($v['Child']) > 0) {
                        foreach ($v['Child'] as $sv) {
                            if (isset($sv['SeoId']) && $sv['SeoId'] == $slug) {
                                $category = array('Id' => $sv['Id'], 'Name' => $sv['Name'], 'SeoId' => $sv['SeoId'], 'ParentId' => $sv['ParentId']);
                                break;
                            }
                        }
                    }
                }
            }
        }

        return $category;
    }

    public function GetListProductsByCategoryId($category, $curPage = 1, $perPage = 9, $sortby = '')
    {
        $start = ($curPage - 1) * $perPage;
        $products = [];
        $result = [];
        $key = $order = $orderBy = '';
        $totalProduct = 0;
        switch ($sortby) {
            case "p-asc":
                $order = 'ASC';
                $orderBy = 'price';
                $key = RedisEnum::GET_PRODUCTS_BY_CATEGORY_ORDERBY_PRICE . $category['Id'];
                break;
            case "p-desc":
                $order = 'DESC';
                $orderBy = 'price';
                $key = RedisEnum::GET_PRODUCTS_BY_CATEGORY_ORDERBY_PRICE . $category['Id'];
                break;
            case "d-asc":
                $order = 'ASC';
                $orderBy = 'date';
                $key = RedisEnum::GET_PRODUCTS_BY_CATEGORY_ORDERBY_DATE . $category['Id'];
                break;
            case "d-asc":
                $order = 'DESC';
                $orderBy = 'date';
                $key = RedisEnum::GET_PRODUCTS_BY_CATEGORY_ORDERBY_DATE . $category['Id'];
                break;
            default:
                $order = 'ASC';
                $orderBy = 'display';
                if ((int)$category['ParentId'] == 0) {
                    $key = RedisEnum::GET_PRODUCTS_BY_CATEGORY_lEVEL1 . $category['Id'];
                } else {
                    $key = RedisEnum::GET_PRODUCTS_BY_CATEGORY_ORDERBY_PRICE . $category['Id'];
                }

                break;
        }

        $redis = RedisServer::getOtherConnection(config()->get('constants.REDIS_PRODUCT_DB'));
        $totalP = $redis->zCard($key);
        if ($totalP > 0) {
            $end = (($start + $perPage) >= $totalP) ? $totalP : $start + $perPage;
            if ($order == 'DESC') {
                $idsP = $redis->zRevRange($key, $start, $end - 1);
            } else {
                $idsP = $redis->zRange($key, $start, $end - 1);
            }
        } else {
            $idsP = $this->GetProductsApiByCategoryId($category, $order, $orderBy, $start, $perPage, $totalP);
        }

        if (count($idsP) > 0) {
            $products = ProductBusiness::getListProductByIds($idsP);
        }

        return array('total' => $totalP, 'products' => $products);
    }

    public function GetProductsApiByCategoryId($category, $order, $orderBy, $start, $perPage, &$totalP)
    {
        if ((int)$category['ParentId'] == 0) {
            $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCTS_BY_CATEGORY_LEVEL1 . $category['Id'];
        } else {
            $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCTS_BY_CATEGORY_ID . $category['Id'];
        }

        $url .= "&skip=$start&take=$perPage";
        if ($orderBy != '') {
            $url .= "&orderBy=$orderBy";
        }

        if ($order != '') {
            $url .= "&order=$order";
        }

        $data = Curl::to($url)->get();
        $data = json_decode($data, true);
        $ids = isset($data['data']['Products']) ? $data['data']['Products'] : [];
        $totalP = isset($data['data']['Total']) ? (int)$data['data']['Total'] : 0;

        return $ids;
    }

    public function searchProducts($t_s, $c_id, $start, $per_page, &$TotalRow)
    {
        $dataSearch = $query = [];
        try {
            $parameters['index'] = CommonEnum::ELASTIC_PRODUCT_INDEX;
            $parameters['type'] = CommonEnum::ELASTICPOSTS_TYPE;
            $sort = [['_score' => ['order' => 'desc']], 'Id'];
            if (!empty($t_s)) {
                $query["function_score"]["query"]["bool"]["must"][] = ["multi_match" => ["query" => $t_s,
                    "fields" => ["Name", "Tags", "ShortDescription1", "ShortDescription2", "NameKhongDau", "ShortDescription1KhongDau"]]];
            }

            if ($c_id) {
                $query["function_score"]["query"]["bool"]["must"][] = ["match" => ['CategoryId' => $c_id]];
            }

            $query["function_score"]["functions"] = [
                ["weight" => 10000, "filter" => ["match_phrase" => ["Name" => $t_s]]],
                ["weight" => 10000, "filter" => ["match_phrase" => ["Tags" => $t_s]]],
                ["weight" => 1000, "filter" => ["match_phrase" => ["ShortDescription1" => $t_s]]],
                ["weight" => 100, "filter" => ["match_phrase" => ["ShortDescription2" => $t_s]]],
                ["weight" => 10000, "filter" => ["match_phrase" => ["NameKhongDau" => $t_s]]],
                ["weight" => 1000, "filter" => ["match_phrase" => ["ShortDescription1KhongDau" => $t_s]]],
            ];

            $query["function_score"]["boost"] = 1;
            $query["function_score"]["boost_mode"] = "multiply";
            $query["function_score"]["score_mode"] = "sum";
            $parameters['body'] = ["sort" => $sort, "query" => $query, "from" => $start, "size" => $per_page];
            $client = ElasticsearchServer::getConnection();
            $response = $client->search($parameters);
            $TotalRow = $response['hits']['total']['value'];
            if (count($response['hits']['hits']) > 0) {
                foreach ($response['hits']['hits'] as $row) {
                    $data = $row['_source'];
                    $data['url_detail'] = url('/san-pham/' . $data['SeoId'] . '-' . $data['Id'] . '.html');
                    $data['tag_name'] = [];
//                    if (!empty($data['Tags'])) {
//                        $dataT = explode(',', $data['Tags']);
//                        $dataTags = [];
//                        foreach ($dataT as $i => $t) {
//                            if ($i == 4) break;
//                            $dataTags[] = array('name' => $t, 'url' => url('/tag/' . HtmlFormatUtility::get_slug_alias($t)));
//                        }
//
//                        $data['tag_name'] = $dataTags;
//                    } else {
//                        $data['tag_name'] = [];
//                    }

                    $dataSearch[] = $data;
                }
            }
        } catch (\Exception $exception) {
            $dataSearch = [];
            $TotalRow = 0;
        }

        return $dataSearch;
    }

    public static function getPromotionByProducts($ids)
    {
        try {
            $start_time = microtime(true);
            $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_CHECK_PRODUCT;
            $dataP = Curl::to($url)->withData($ids)->asJson()->post();
            $end_time = microtime(true);
            try {
                if (config()->get('constants.CUSTOM_LOG_PROMOTION') == "true") {
                    file_put_contents(storage_path() . '/logs/logPromotion_' . date('m-d-Y') . '.txt', print_r('=========[' . date('m-d-Y_hi') . ']', true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotion_' . date('m-d-Y') . '.txt', print_r($url, true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotion_' . date('m-d-Y') . '.txt', print_r(json_encode($ids), true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotion_' . date('m-d-Y') . '.txt', print_r(json_encode($dataP), true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotion_' . date('m-d-Y') . '.txt', print_r('Request elapsed: ' . ($end_time - $start_time), true) . PHP_EOL, FILE_APPEND);
                }
            } catch (\Exception $e) {
                // Ignore
            }

            if ($dataP->statusCode == 200 && count($dataP->data) > 0) {
                $products = [];
                foreach ($dataP->data as $product) {
                    if ($product->rewardType == 0 || $product->rewardType == 3) {
                        $productD = ProductBusiness::get_product_detail($product->rewardProductId);
                        if ($productD) {
                            $products[$product->productId] = [
                                'productId' => $product->rewardProductId,
                                'productName' => $productD['Name'],
                                'productSku' => isset($productD['ProductSkus'][0]['Sku']) ? $productD['ProductSkus'][0]['Sku'] : '',
                                'productWeight' => isset($productD['ProductSkus'][0]['WeightGram']) ? $productD['ProductSkus'][0]['WeightGram'] : '',
                                'image' => isset($productD['ThumbnailUrl']) ? $productD['ThumbnailUrl'] : '',
                                'description' => $productD['ShortDescription1'],
                                'promotionId' => $product->promotionId,
                                'coupon' => $product->rewardCoupon,
                                'quantity' => $product->rewardQuantity,
                                'discount' => 0,
                                'type' => $product->rewardType,
                                'price' => isset($productD['ProductSkus'][0]['SalePrice']) ? $productD['ProductSkus'][0]['SalePrice'] : ''
                            ];
                        }
                    } else {
                        $products[$product->productId] = [
                            'productId' => $product->productId,
                            'promotionId' => $product->promotionId,
                            'coupon' => $product->rewardCoupon,
                            'quantity' => $product->rewardQuantity,
                            'discount' => $product->rewardDiscount,
                            'type' => $product->rewardType,
                        ];
                    }

                }

                return $products;
            } else {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
    }

    public static function getPromotionCheckouByProducts($ids)
    {
        try {
            $start_time = microtime(true);
            $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_CHECKOUT_PRODUCT;
            $dataP = Curl::to($url)->withData($ids)->asJson()->post();
            $end_time = microtime(true);
            try {
                if (config()->get('constants.CUSTOM_LOG_PROMOTION') == "true") {
                    file_put_contents(storage_path() . '/logs/logPromotionCheckout_' . date('m-d-Y') . '.txt', print_r('=========[' . date('m-d-Y_hi') . ']', true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotionCheckout_' . date('m-d-Y') . '.txt', print_r($url, true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotionCheckout_' . date('m-d-Y') . '.txt', print_r(json_encode($ids), true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotionCheckout_' . date('m-d-Y') . '.txt', print_r(json_encode($dataP), true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logPromotionCheckout_' . date('m-d-Y') . '.txt', print_r('Request elapsed: ' . ($end_time - $start_time), true) . PHP_EOL, FILE_APPEND);
                }
            } catch (\Exception $e) {
                // Ignore
            }
            if ($dataP->statusCode == 200 && count($dataP->data) > 0) {
                $products = [];
                foreach ($dataP->data as $product) {
                    if ($product->rewardType == 0 || $product->rewardType == 3) {
                        $productD = ProductBusiness::get_product_detail($product->rewardProductId);
                        if ($productD) {
                            $products[$product->productId] = [
                                'productId' => $product->rewardProductId,
                                'productName' => $productD['Name'],
                                'productSku' => isset($productD['ProductSkus'][0]['Sku']) ? $productD['ProductSkus'][0]['Sku'] : '',
                                'productWeight' => isset($productD['ProductSkus'][0]['WeightGram']) ? $productD['ProductSkus'][0]['WeightGram'] : '',
                                'image' => isset($productD['ThumbnailUrl']) ? $productD['ThumbnailUrl'] : '',
                                'description' => $productD['ShortDescription1'],
                                'promotionId' => $product->promotionId,
                                'coupon' => $product->rewardCoupon,
                                'quantityCondition' => $product->productConditionQuantity,
                                'quantity' => $product->rewardQuantity,
                                'discount' => 0,
                                'type' => $product->rewardType,
                                'price' => isset($productD['ProductSkus'][0]['SalePrice']) ? $productD['ProductSkus'][0]['SalePrice'] : ''
                            ];
                        }
                    } else {
                        $products[$product->productId] = [
                            'productId' => $product->productId,
                            'promotionId' => $product->promotionId,
                            'coupon' => $product->rewardCoupon,
                            'quantity' => $product->rewardQuantity,
                            'discount' => $product->rewardDiscount,
                            'type' => $product->rewardType,
                        ];
                    }

                }

                return $products;
            } else {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
    }

    public static function getPromotionByProductId($productId)
    {
        try {
            $promotions = [];
            $locations = [];
            $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_BY_PRODUCT . '?productId=' . $productId;
            $dataPr = Curl::to($url)->get();
            $dataPr = json_decode($dataPr, true);
            if ($dataPr['statusCode'] == 200 && count($dataPr['data']) > 0) {
                $url = config()->get('constants.API_FC_SHIPMENT') . ApiEnum::MYACCOUNT_GET_PROVINCES;
                $dataP = Curl::to($url)->get();
                $dataP = json_decode($dataP, true);
                if (isset($dataP['data']) && count($dataP['data']) > 0) {
                    foreach ($dataP['data'] as $location) {
                        $locations[$location['provinceCode']] = ['provinceCode' => $location['provinceCode'], 'provinceName' => $location['provinceName']];
                    }
                }

                foreach ($dataPr['data'] as $promotion) {
                    if (isset($promotion['promotionCondition']) && count($promotion['promotionCondition']) > 0) {
                        foreach ($promotion['promotionCondition'] as $k => $condition) {
                            if ($condition['conditionType'] == 4) {
                                $con = json_decode($condition['condition'], true);
                                if (isset($con['LocationList']) && count($con['LocationList']) > 0) {
                                    $loc = [];
                                    foreach ($con['LocationList'] as $lc) {
                                        $loc[] = $locations[$lc]['provinceName'];
                                    }
                                    $promotion['promotionCondition'][$k]['locations'] = join(', ', $loc);
                                }
                            }

                            if ($condition['conditionType'] == 2) {
                                $con = json_decode($condition['condition'], true);
                                $productD = ProductBusiness::get_product_detail($con['ProductId']);
                                if ($productD) {
                                    $promotion['promotionCondition'][$k]['product'] = [
                                        'ProductId' => $con['ProductId'],
                                        'ProductName' => $productD['Name'],
                                        'Image' => isset($productD['ThumbnailUrl']) ? $productD['ThumbnailUrl'] : '',
                                        'Quantity' => $con['Quantity'],
                                    ];
                                }
                            }
                        }
                    }

                    $promotions[] = $promotion;
                }
            }

            return $promotions;
        } catch (\Exception $e) {
            return [];
        }
    }

    function getProductPending($products) {
        $product_data = [];
        $product_pending = [];
        if (!empty($products)) {
            foreach ($products as $product) {
                if(isset($product['Status']) && $product['Status'] == 'normal') {
                    $product_data[] = $product;
                } elseif(isset($product['Status']) && $product['Status'] == 'coming_soon') {
                    $product_pending[] = $product;
                }
            }
        }

        return ['products' => $product_data, 'product_pending' => $product_pending];
    }
}
