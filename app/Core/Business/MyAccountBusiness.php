<?php

namespace App\Core\Business;

use App\Core\Enums\ApiEnum;
use App\Core\Enums\CommonEnum;
use App\Core\Utilities\FileLogUtility;
use App\Core\Utilities\GenerateUtility;
use App\Core\Utilities\PaginatorUtility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;
use Jenssegers\Agent\Agent as Agent;

class MyAccountBusiness
{
    /**
     * @return false|string
     */
    public static function getUserInfoById($userId)
    {
        $result = ['responseCode' => '02', 'message' => 'Không lấy được thông tin của người dùng', 'data' => ['customerId' => '', 'phone' => '', 'email' => '', 'fullName' => '', 'dateOfBirth' => '', 'gender' => '', 'isPhoneVerified' => '', 'isEmailVerified' => '', 'isGoogleLogin' => '', 'isFacebookLogin' => '', 'primaryRegister' => '', 'hasPassword' => 0, 'shippingAddress' => '']];
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $checkTokenUser = LoginBusiness::checkTokenUser($userId, $_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
            if ($checkTokenUser == true) {
                $url = config()->get('constants.API_FC_LOGIN_REGISTER').ApiEnum::CUSTOMER_GET_INFO_BY_ID.$userId;
                $response = Curl::to($url)->withTimeout(config()->get('constants.CURLOPT_TIMEOUT'))
                    ->enableDebug(FileLogUtility::createFileLog('api'))->get();
                $response = json_decode($response, true);
                if (! empty($response['responseCode'])) {
                    $result = ['responseCode' => $response['responseCode'], 'message' => $response['message'], 'data' => $response['data']];
                }
            }
        }

        return json_encode($result);
    }

    /**
     * @return bool|mixed|string
     */
    public static function getUserInfoByToken($token)
    {
        // Split the token
        $tokenParts = explode('.', $token);
        // Create token payload as a JSON string
        $payload = base64_decode($tokenParts[1]);
        // Validate customer (user ID)
        $payload = json_decode($payload, true);
        $user_data[0] = $payload;

        return $user_data;
    }

    /**
     * @return bool|mixed|string
     */
    public static function get_list_provinces()
    {
        try {
            $url = config()->get('constants.API_FC_SHIPMENT').ApiEnum::MYACCOUNT_GET_PROVINCES;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return bool|mixed|string
     */
    public static function get_list_district($id)
    {
        try {
            $url = config()->get('constants.API_FC_SHIPMENT').ApiEnum::MYACCOUNT_GET_DISTRICTS.$id;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return bool|mixed|string
     */
    public static function get_list_sub_district($id)
    {
        try {
            $url = config()->get('constants.API_FC_SHIPMENT').ApiEnum::MYACCOUNT_GET_SUB_DISTRICTS.$id;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param  $id
     * @return bool|mixed|string
     */
    public static function getOrderDetail($orderId, $customerId)
    {
        try {
            $url = config()->get('constants.API_FC_ORDER').ApiEnum::MYACCOUNT_GET_ORDER_DETAIL.$orderId.'&customerId='.$customerId;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return mixed|string
     */
    public static function get_shipping_address_by_Id($id)
    {
        try {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_DETAIL_SHIPPING_ADDRESS.$id;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return bool|mixed|string
     */
    public static function update_profile_save($data)
    {
        try {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_UPDATE_PROFILE;
            $dataP = Curl::to($url)
                ->withData($data)
                ->asJson()
                ->put();

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    public static function saveShippingAddress($id, $data)
    {
        try {
            if ($id > 0) {
                $data['shippingAddressId'] = $id;
                $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_UPDATE_SHIPPING_ADDRESS;
                $dataP = Curl::to($url)->withData($data)->asJson()->put();
            } else {
                $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_CREATE_SHIPPING_ADDRESS;
                $dataP = Curl::to($url)->withData($data)->asJson()->post();
            }

            return json_decode(json_encode($dataP), true);
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return bool|mixed|string
     */
    public static function delete_shipping_address($id)
    {
        try {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_DELETE_SHIPPING_ADDRESS.$id;
            $dataP = Curl::to($url)->delete();
            $dataP = json_decode($dataP, true);

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return string
     */
    public static function addFavoritePost($data)
    {
        try {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_ADD_FAVORITE_POST.'?customerId='.$data['customerId'].'&postId='.$data['postId'];
            $dataM = Curl::to($url)->post();
            $dataM = json_decode($dataM, true);
            $result = ['responseCode' => $dataM['responseCode'], 'data' => $dataM['data']];
        } catch (\Exception  $e) {
            $result = ['responseCode' => '02', 'data' => []];
            Log::error($e->getMessage());
        }

        return json_encode($result);
    }

    /**
     * @return false|string
     */
    public static function deleteFavoritePost($data)
    {
        try {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_DELETE_FAVORITE_POST.'?customerId='.$data['customerId'].'&postId='.$data['postId'];
            $dataM = Curl::to($url)->withData($data)->asJson()->delete();
            $dataM = GenerateUtility::objectToArray($dataM);
            $result = ['responseCode' => $dataM['responseCode'], 'data' => $dataM['data']];
        } catch (\Exception  $e) {
            $result = ['responseCode' => '02', 'data' => []];
            Log::error($e->getMessage());
        }

        return json_encode($result);
    }

    public function getProfile()
    {
        $user_data = json_decode($_COOKIE[CommonEnum::COOKIE_USER_DATA], true);
        $server_output = $this::getUserInfoById($user_data[0]['customer_id']);
        $server_output = json_decode($server_output, true);
        $data = $server_output['data'];
        if (empty($data)) {
            $_COOKIE[CommonEnum::COOKIE_USER_DATA] = null;
        }

        return $data;
    }

    public function getMyOrders($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $page = $curPage - 1;
        $take = CommonEnum::LIMIT_DATA_PAGINATE;
        $start = $page * $take;
        $url = config()->get('constants.API_FC_ORDER').ApiEnum::MYACCOUNT_GET_LIST_ORDERS.$customerId.'&start='.$start.'&take='.$take;
        $dataP = Curl::to($url)->get();
        $orders = json_decode($dataP, true);
        $totalRow = $orders['data']['total'];
        $returnHTML = view('myaccount.orders')->with(['data' => $orders['data']])->render();
        $urlP = '/account/'.$slug.'?page=(:num)';
        $paginatorUtility = new PaginatorUtility($totalRow, $take, $curPage, $urlP);

        return $returnHTML.$paginatorUtility->toHtml();
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public function getMyOrdersV3($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $page = $curPage - 1;
        $take = CommonEnum::LIMIT_DATA_PAGINATE;
        $start = $page * $take;
        $url = config()->get('constants.API_FC_ORDER').ApiEnum::MYACCOUNT_GET_ORDER_INFOS.$customerId.'&start='.$start.'&take='.$take;
        $dataP = Curl::to($url)->get();
        $orders = json_decode($dataP, true);
        $totalRow = $orders['total'];
        $myAccountBusiness = new MyAccountBusiness;
        if (! empty($orders['data'])) {
            foreach ($orders['data'] as $key => $value) {
                $itemLines = [];
                foreach ($value['ItemLines'] as $item) {
                    $productInfoMyOrdersV3 = $myAccountBusiness->getProductInfoMyOrdersV3($item['ReferenceProductId']);
                    array_push($itemLines, [
                        'ItemName' => $item['ItemName'],
                        'SalePrice' => $item['SalePrice'],
                        'Quantity' => $item['Quantity'],
                        'ItemMedia' => $productInfoMyOrdersV3['ItemMedia'],
                        'ProductId' => $item['ReferenceProductId'],
                        'SeoId' => $productInfoMyOrdersV3['SeoId'],
                    ]);
                }
                $orders['data'][$key]['ItemLines'] = $itemLines;
            }
        } else {
            $orders['data'] = [];
        }
        $returnHTML = view(config()->get('constants.MY_ACCOUNT_VERSION').'.myaccount.orders')->with(['data' => $orders['data']])->render();
        $urlP = '/account/'.$slug.'?page=(:num)';
        $paginatorUtility = new PaginatorUtility($totalRow, $take, $curPage, $urlP);

        return $returnHTML.$paginatorUtility->toHtml();
    }

    public function getMyMedical($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $page = $curPage - 1;
        $take = CommonEnum::LIMIT_DATA_PAGINATE;
        $start = $page * $take;
        $keywordSearch = trim($request->get('pn'));
        $url = config()->get('constants.API_FC_ORDER').ApiEnum::MYACCOUNT_GET_HISTORY_ORDER_ITEMS.$customerId.'&productName='.urlencode($keywordSearch).'&start='.$start.'&take='.$take;
        $data = Curl::to($url)->get();
        $data = json_decode($data, true);
        $totalRow = $data['total'];
        $myAccountBusiness = new MyAccountBusiness;
        if (! empty($data['data'])) {
            foreach ($data['data'] as $key => $value) {
                $list_medias = $myAccountBusiness->getProductMedias($value['ProductId']);
                $itemLines = [
                    'ItemMedia' => ! empty($list_medias[0]['Url']) ? $list_medias[0]['Url'] : '',
                ];
                $data['data'][$key]['ItemLines'] = $itemLines;
            }
        } else {
            $data = [];
        }
        $agent = new Agent;
        if (config()->get('constants.MY_ACCOUNT_VERSION') == 'v3' && $agent->isMobile() && ! $agent->isTablet()) {
            $returnHTML = view('v3.myaccount.yba_online')->with(['lst_order_items' => $data])->render();
        } else {
            $returnHTML = view('myaccount.orders')->with(['lst_order_items' => $data])->render();
        }
        $urlP = '/account/'.$slug.'?page=(:num)';
        $paginatorUtility = new PaginatorUtility($totalRow, $take, $curPage, $urlP);

        return $returnHTML.$paginatorUtility->toHtml();
    }

    /**
     * @return array|string
     *
     * @throws \Throwable
     */
    public function myFavoritePosts($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $limit = CommonEnum::LIMIT_DATA_PAGINATE;
        if (config()->get('constants.FAVORITE_POSTS_VERSION') == 'v2') {
            $url = config()->get('constants.API_FC_ORDER').ApiEnum::MYACCOUNT_GET_HISTORY_ORDER_ITEMS.$customerId.'&start='. 0 .'&take='. 10;
            $data = Curl::to($url)->get();
            $data = json_decode($data, true);
            $dataP = [];
            if (! empty($data['data'])) {
                foreach ($data['data'] as $key => $value) {
                    $data['data'][$key]['ProductId'] = $value['ProductId'];
                    array_push($dataP, $value['ProductId']);
                }
            }
            $lst_posts = [];
            $totalRow = 0;
            if (! empty($dataP)) {
                $listPostIds = [];
                $posts = DB::table('posts_has_products')->select('post_id')->whereIn('product_id', $dataP)->orderBy('post_id', 'DESC')->skip($curPage)->take($limit)->get();
                foreach ($posts as $post) {
                    if (isset($post->post_id)) {
                        array_push($listPostIds, $post->post_id);
                    }
                }
                $post = new PostsBusiness;
                $lst_posts = $post->getPostsByIds(array_unique($listPostIds));
                $totalRow = count(DB::table('posts_has_products')->select('post_id')->whereIn('product_id', $dataP)->get());
            }
        } else {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_FAVORITE_POSTS.$customerId.'&page='.$curPage.'&limit='.$limit;
            $data = Curl::to($url)->get();
            $dataNews = json_decode($data, true);
            $lst_posts = [];
            if (! empty($dataNews['data'])) {
                $totalRow = $dataNews['data']['total'];
                if (! empty($dataNews['data']['postId'])) {
                    $postsBusiness = new PostsBusiness;
                    foreach ($dataNews['data']['postId'] as $postId) {
                        $lst_posts[] = $postsBusiness->getPostsById($postId);
                    }
                }

            } else {
                $totalRow = 0;
            }
        }
        $urlP = '/account/'.$slug.'?page=(:num)';
        $paginatorUtility = new PaginatorUtility($totalRow, $limit, $curPage, $urlP);
        $agent = new Agent;
        if (config()->get('constants.MY_ACCOUNT_VERSION') == 'v3' && $agent->isMobile() && ! $agent->isTablet()) {
            return view('v3.myaccount.news')->with([
                'paginatorUtility' => $paginatorUtility, 'lst_posts' => $lst_posts,
            ])->render();
        } else {
            return view('myaccount.news')->with([
                'paginatorUtility' => $paginatorUtility, 'lst_posts' => $lst_posts,
            ])->render();
        }
    }

    public function getMyQuestions($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $page = $curPage - 1;
        $take = CommonEnum::LIMIT_DATA_PAGINATE;
        $start = $page * $take;
        $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_LIST_QUESTIONS.$customerId.'&skip='.$start.'&take='.$take.'&hasAnswer=1&notified=1';
        $data = Curl::to($url)->get();
        $data = json_decode($data, true);
        $totalRow = $data['total'];
        $urlP = '/account/'.$slug.'?page=(:num)';
        $paginatorUtility = new PaginatorUtility($totalRow, $take, $curPage, $urlP);
        $agent = new Agent;
        if (config()->get('constants.MY_ACCOUNT_VERSION') == 'v3' && $agent->isMobile() && ! $agent->isTablet()) {
            return view('v3.myaccount.questions')->with([
                'paginatorUtility' => $paginatorUtility, 'lst_questions' => $data['data'],
            ])->render();
        } else {
            return view('myaccount.questions')->with([
                'paginatorUtility' => $paginatorUtility, 'lst_questions' => $data['data'],
            ])->render();
        }
    }

    public function getMyAddress($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $page = $curPage - 1;
        $take = CommonEnum::LIMIT_DATA_PAGINATE;
        $start = $page * $take;
        $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_LIST_SHIPPING_ADDRESS.$customerId.'/'.$start.'/'.$take;
        $dataP = Curl::to($url)->get();
        $dataP = json_decode($dataP, true);
        $totalRow = $dataP['data']['total'];
        $urlP = '/account/'.$slug.'?page=(:num)';
        $paginatorUtility = new PaginatorUtility($totalRow, $take, $curPage, $urlP);
        $agent = new Agent;
        if (config()->get('constants.MY_ACCOUNT_VERSION') == 'v3' && $agent->isMobile() && ! $agent->isTablet()) {
            return view('v3.myaccount.address')->with([
                'paginatorUtility' => $paginatorUtility, 'data' => $dataP['data'],
            ])->render();
        } else {
            return view('myaccount.address')->with([
                'paginatorUtility' => $paginatorUtility, 'data' => $dataP['data'],
            ])->render();
        }
    }

    /**
     * @param  $customer_id
     * @return mixed|string
     */
    public static function getFavoritePost($customerId, $page = 1, $limit = 10)
    {
        try {
            if (isset($page) && isset($limit)) {
                $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_FAVORITE_POSTS.$customerId.'&page='.$page.'&limit='.$limit;
            } else {
                $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_FAVORITE_POSTS.$customerId;
            }
            $data = Curl::to($url)->get();
            $data = json_decode($data, true);

            return $data;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [];
        }
    }

    /**
     * @return array|mixed
     */
    public static function getAllHookLogs($orderCode)
    {
        try {
            $url = config()->get('constants.API_FC_SHIPMENT').ApiEnum::MYACCOUNT_GET_ALL_HOOK_LOGS.$orderCode;
            $data = Curl::to($url)->get();
            $data = json_decode($data, true);

            return $data;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [];
        }
    }

    /**
     * @return array
     */
    public static function getProductMedias($productId)
    {
        try {
            $url = config()->get('constants.API_FC_PRODUCT').ApiEnum::PRODUCT_GET_MEDIA.$productId;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);
            if (isset($dataP['data']['ProductSkus'][0]['Medias'])) {
                return $dataP['data']['ProductSkus'][0]['Medias'];
            } else {
                return [];
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [];
        }
    }

    /**
     * @return array
     */
    public static function getProductInfoMyOrdersV3($productId)
    {
        $productInfoMyOrdersV3 = [];
        try {
            $url = config()->get('constants.API_FC_PRODUCT').ApiEnum::PRODUCT_GET_MEDIA.$productId;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);
            if (isset($dataP['data']['ProductSkus'][0]['Medias'])) {
                $productInfoMyOrdersV3['ItemMedia'] = $dataP['data']['ProductSkus'][0]['Medias'][0]['Url'];
            } else {
                $productInfoMyOrdersV3['ItemMedia'] = '';
            }
            if (isset($dataP['data']['SeoId'])) {
                $productInfoMyOrdersV3['SeoId'] = $dataP['data']['SeoId'];
            } else {
                $productInfoMyOrdersV3['SeoId'] = '';
            }

            return $productInfoMyOrdersV3;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return $productInfoMyOrdersV3;
        }
    }

    /**
     * @return array|mixed
     */
    public static function searchOrder($orderCode, $phone)
    {
        try {
            $url = config()->get('constants.API_FC_ORDER').ApiEnum::MYACCOUNT_GET_ORDER_INFOS_BY_CODE.'?orderCode='.$orderCode.'&phone='.$phone;
            $data = Curl::to($url)->get();
            $data = json_decode($data, true);

            return $data;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [];
        }
    }

    public static function searchOrderByCode($code)
    {
        try {
            $url = config()->get('constants.API_FC_ORDER').ApiEnum::MYACCOUNT_GET_ORDER_BYCODE.'?orderCode='.$code;
            $data = Curl::to($url)->get();
            $data = json_decode($data, true);

            return $data;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [];
        }
    }

    public static function getPointByCustomer($customerId)
    {
        try {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_POINT_CUSTOMER.'?customerId='.$customerId;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);
            if ($dataP['responseCode'] == '00') {
                return $dataP['data'];
            } else {
                return null;
            }
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    public function getDetailPointByOrderCode($orderCode)
    {
        try {
            $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_POINT_DETAILS_BY_ORDERCODE.'?orderCode='.$orderCode;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);

            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    public function getMyPointsV3($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $page = $curPage - 1;
        $take = CommonEnum::LIMIT_DATA_PAGINATE;
        $start = $page * $take;
        $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_POINT_DETAIL_BY_CUSTOMER.'?customerId='.$customerId.'&start='.$start.'&take='.$take;
        $dataP = Curl::to($url)->get();
        $points = json_decode($dataP, true);
        $infoPoint = myAccountBusiness::getPointByCustomer($customerId);
        $returnHTML = view(config()->get('constants.MY_ACCOUNT_VERSION').'.myaccount.points')->with(['data' => $points['data'], 'infoPoint' => $infoPoint])->render();

        return $returnHTML;
    }

    public function getMyPoints($request, $customerId, $slug)
    {
        $curPage = (int) $request->get('page') ? (int) $request->get('page') : 1;
        $page = $curPage - 1;
        $take = CommonEnum::LIMIT_DATA_PAGINATE;
        $start = $page * $take;
        $url = config()->get('constants.API_FC_MYACCOUNT').ApiEnum::MYACCOUNT_GET_POINT_DETAIL_BY_CUSTOMER.'?customerId='.$customerId.'&start='.$start.'&take='.$take;
        $dataP = Curl::to($url)->get();
        $points = json_decode($dataP, true);
        $infoPoint = myAccountBusiness::getPointByCustomer($customerId);
        $returnHTML = view('myaccount.points')->with(['data' => $points['data'], 'infoPoint' => $infoPoint])->render();

        return $returnHTML;
    }
}
