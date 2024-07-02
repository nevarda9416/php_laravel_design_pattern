<?php

namespace App\Http\Controllers;

use App\Core\Business\CaptchaBusiness;
use App\Core\Business\LoginBusiness;
use App\Core\Business\MyAccountBusiness;
use App\Core\Business\OrderLogsBusiness;
use App\Core\Business\ProductBusiness;
use App\Core\Business\ShoppingCartBusiness;
use App\Core\Business\UserBusiness;
use App\Core\Enums\ApiEnum;
use App\Core\Enums\CommonEnum;
use App\Core\Utilities\GenerateUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;
use Jenssegers\Agent\Agent;

class ShoppingCartController extends Controller
{
    /**
     * hien thi gio hang
     */
    public function index()
    {
        $shipping_fee = CommonEnum::SHIPPING_FEE;
        $list_products = [];
        $promotions = [];
        $promotionL = [];
        $discounts = [];
        $user_cookie = [];
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $user_cookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
        }

        $cart_data = ShoppingCartBusiness::getDataCart($list_products);
        if ($cart_data) {
            //  $promotions = $cart_data->getPromotion($list_products);
            //  $discounts = $cart_data->getDiscounts($list_products);
            //  $promotionL = $cart_data->getPromotionLocation($list_products);
        }

        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('cart/mobile/index', compact('cart_data', 'list_products', 'promotions', 'discounts', 'user_cookie', 'promotionL', 'shipping_fee'));
        } else {
            return view('cart/index', compact('cart_data', 'list_products', 'promotions', 'discounts', 'user_cookie', 'promotionL', 'shipping_fee'));
        }
    }

    /**
     * Ajax hien thi danh sach san pham trong gio hang
     */
    public function listProducts()
    {
        $totalItem = 0;
        $content = '';
        $shoppingCart = ShoppingCartBusiness::getCart();
        if (! empty($shoppingCart)) {
            if (! is_array($shoppingCart->content)) {
                $list_products = json_decode($shoppingCart->content, true);
            } else {
                $list_products = $shoppingCart->content;
            }

            $d = [];
            foreach ($list_products as $v) {
                if (isset($v['item_id']) && $v['item_id'] > 0) {
                    $totalItem++;
                    $d[$v['item_id']] = ['item_id' => $v['item_id'], 'item_quantity' => $v['item_quantity']];
                }

            }

            $content = json_encode($d);
        }

        return response()->json(['success' => true, 'totalItem' => $totalItem, 'content' => $content]);
    }

    /**
     * Them ma giam gia
     */
    public function discount(Request $request)
    {
        $discountCode = $request->get('discount_code');
        $currentUrl = $request->get('current_url');
        if ($request->get('shipping_fee')) {
            $shipping_fee = $request->get('shipping_fee');
        } else {
            $shipping_fee = CommonEnum::SHIPPING_FEE;
        }
        if ($discountCode != '') {
            try {
                $list_products = [];
                $user_cookie = [];
                if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                    $user_cookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
                }

                $shoppingCart = ShoppingCartBusiness::getDataCart($list_products);
                $discounts = is_array($shoppingCart->discounts) ? $shoppingCart->discounts : json_decode($shoppingCart->discounts, true);
                $dataCP = $shoppingCart->createDataPromotion($list_products, $discounts);
                $dataCP['coupon'] = $discountCode;
                $dataCP['CouponOnly'] = true;
                unset($dataCP['promotionType']);
                $url = config()->get('constants.API_FC_PROMOTION').ApiEnum::PROMOTION_BY_CHECKOUT;
                $dataP = Curl::to($url)->withData($dataCP)->asJson()->post();
                if ($dataP->statusCode == 200 && count($dataP->data) > 0) {
                    $promotions = $shoppingCart->getPromotion($list_products);
                    $promotionL = $shoppingCart->getPromotionLocation($list_products);
                    if (count($discounts) > 0) {
                        foreach ($discounts as $k => $d) {
                            if ($dataP->data[0]->promotionType == 1) {
                                if ($d['promotionType'] == 1) {
                                    unset($discounts[$k]);
                                } elseif ($d['id'] == $dataP->data[0]->id) {
                                    unset($discounts[$k]);
                                }
                            }
                        }
                    }

                    $discounts[strtoupper($discountCode)] = json_decode(json_encode($dataP->data[0], JSON_UNESCAPED_UNICODE), true);
                    $discounts[strtoupper($discountCode)]['id'] = $dataP->data[0]->id;
                    $discounts[strtoupper($discountCode)]['coupon_code'] = $discountCode;
                    $discounts[strtoupper($discountCode)]['promotionType'] = $dataP->data[0]->promotionType;
                    $shoppingCart->discounts = json_encode($discounts, JSON_UNESCAPED_UNICODE);
                    $shoppingCart->save();
                    $discounts = $shoppingCart->getDiscounts($list_products);
                    if (strpos($currentUrl, 'gio-hang') !== false) {
                        $prductHtml = view('cart.box.promotion')->with([
                            'cart_data' => $shoppingCart, 'list_products' => $list_products, 'shipping_fee' => $shipping_fee,
                            'promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts, 'user_cookie' => $user_cookie,
                        ])->render();
                    } else {
                        $prductHtml = view('cart.box.receipt')->with([
                            'cart_data' => $shoppingCart, 'list_products' => $list_products, 'shipping_fee' => $shipping_fee,
                            'promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts,
                        ])->render();
                    }

                    $promotionHtml = view('cart.list_promotion')->with([
                        'promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts, 'user_cookie' => $user_cookie])->render();

                    return response()->json(['status' => 200, 'html' => $prductHtml, 'promotionHtml' => $promotionHtml]);
                } else {
                    return response()->json(['status' => 404, 'message' => 'Mã code không phù hợp']);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 404, 'message' => $e->getMessage()]);
            }

        } else {
            return response()->json(['status' => 404]);
        }
    }

    public function deleteCoupon(Request $request)
    {
        $discountCode = $request->get('discount_code');
        if ($discountCode != '') {
            $user_cookie = [];
            if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                $user_cookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
            }
            $list_products = [];
            $shoppingCart = ShoppingCartBusiness::getDataCart($list_products);
            if (count($shoppingCart->discounts) > 0) {
                $discounts = $shoppingCart->discounts;
                unset($discounts[$discountCode]);
                if (count($discounts) > 0) {
                    $shoppingCart->discounts = json_encode($discounts, JSON_UNESCAPED_UNICODE);
                    $shoppingCart->save();
                    $shoppingCart->discounts = $discounts;
                } else {
                    $shoppingCart->discounts = '';
                    $shoppingCart->save();
                }
            }

            $promotions = $shoppingCart->getPromotion($list_products);
            $promotionL = $shoppingCart->getPromotionLocation($list_products);
            $discounts = $shoppingCart->getDiscounts($list_products);
            $prductHtml = view('cart.box.promotion')->with([
                'cart_data' => $shoppingCart, 'list_products' => $list_products,
                'promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts, 'user_cookie' => $user_cookie,
            ])->render();
            $promotionHtml = view('cart.list_promotion')->with(['promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts])->render();

            return response()->json(['status' => 200, 'html' => $prductHtml, 'promotionHtml' => $promotionHtml]);
        } else {
            return response()->json(['status' => 404]);
        }
    }

    public function applyPromotion(Request $request)
    {
        $coefficientPoint = CommonEnum::COEFFICIENT_POINT;
        $point = 0;
        $promotionId = (int) $request->get('promotion_id');
        $currentUrl = $request->get('current_url');
        if ($request->get('shipping_fee')) {
            $shipping_fee = $request->get('shipping_fee');
        } else {
            $shipping_fee = CommonEnum::SHIPPING_FEE;
        }

        if ($promotionId > 0) {
            try {
                $user_cookie = [];
                if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                    $user_cookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
                }
                $url = config()->get('constants.API_FC_PROMOTION').ApiEnum::PROMOTION_CHECK_ID.'?id='.$promotionId;
                $dataP = Curl::to($url)->get();
                $dataP = json_decode($dataP, true);
                if ($dataP['statusCode'] == 200 && count($dataP['data']) > 0) {
                    $checkNew = false;
                    $list_products = [];
                    $shoppingCart = ShoppingCartBusiness::getDataCart($list_products);
                    $discounts = $shoppingCart->discounts;
                    $promotions = $shoppingCart->getPromotion($list_products);
                    $promotionL = $shoppingCart->getPromotionLocation($list_products);
                    $point = $shoppingCart->identifier;
                    foreach ($discounts as $key => $v) {
                        if ($v['promotionType'] == 1 && $v['id'] != $promotionId) {
                            unset($discounts[$key]);
                            $checkNew = true;
                        }
                    }

                    if ($checkNew) {
                        foreach ($promotions as $promotion) {
                            if ($promotion->id == $promotionId) {
                                $discounts[$promotionId] = ['id' => $promotion->id, 'coupon_code' => '', 'promotionType' => $promotion->promotionType];
                            }
                        }

                        $shoppingCart->discounts = json_encode($discounts, JSON_UNESCAPED_UNICODE);
                        $shoppingCart->save();
                    }

                    $infoPoint = MyAccountBusiness::getPointByCustomer($user_cookie[0]['customer_id']);
                    if (empty($infoPoint)) {
                        $point = 0;
                    }
                    $discounts = $shoppingCart->getDiscounts($list_products);
                    if (strpos($currentUrl, 'gio-hang') !== false) {
                        $prductHtml = view('cart.box.promotion')->with([
                            'cart_data' => $shoppingCart, 'list_products' => $list_products, 'shipping_fee' => $shipping_fee,
                            'promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts, 'user_cookie' => $user_cookie,
                        ])->render();
                    } else {
                        $prductHtml = view('cart.box.receipt')->with([
                            'cart_data' => $shoppingCart, 'list_products' => $list_products, 'shipping_fee' => $shipping_fee, 'promotions' => $promotions,
                            'promotionL' => $promotionL, 'discounts' => $discounts, 'point' => $point, 'coefficientPoint' => $coefficientPoint, 'infoPoint' => $infoPoint,
                        ])->render();
                    }

                    $promotionHtml = view('cart.list_promotion')->with(['promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts])->render();

                    return response()->json(['status' => 200, 'html' => $prductHtml, 'promotionHtml' => $promotionHtml]);
                } else {
                    return response()->json(['status' => 404]);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 404, 'message' => $e->getMessage()]);
            }

        } else {
            return response()->json(['status' => 404]);
        }
    }

    /**
     * Hien thi thong tin gio hang va dia chi nhan hang
     */
    public function info()
    {
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $coefficientPoint = CommonEnum::COEFFICIENT_POINT;
            $minPoint = CommonEnum::MIN_POINT;
            $point = 0;
            $shippingType = true;
            $shipping_fee = CommonEnum::SHIPPING_FEE;
            $list_products = [];
            $discounts = [];
            $promotionL = [];
            $promotions = [];
            $cart_data = ShoppingCartBusiness::getDataCart($list_products);
            if ($cart_data) {
                $point = (int) $cart_data->identifier;
                $promotions = $cart_data->getPromotion($list_products);
                $promotionL = $cart_data->getPromotionLocation($list_products);
                $discounts = $cart_data->getDiscounts($list_products);
            }

            if (count($list_products) == 0) {
                return redirect('/gio-hang');
            }

            $user_cookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
            $url = config()->get('constants.API_FC_LOGIN_REGISTER').ApiEnum::MYACCOUNT_GET_LIST_SHIPPING_ADDRESS.$user_cookie[0]['customer_id'].'/0/10';
            $server_output = Curl::to($url)->get();
            $server_output = json_decode($server_output, true);
            $list_address = $server_output['data'];
            $infoPoint = MyAccountBusiness::getPointByCustomer($user_cookie[0]['customer_id']);
            if (empty($infoPoint)) {
                $point = 0;
            }

            return view('cart.info', compact('cart_data', 'list_products', 'user_cookie', 'list_address', 'promotions', 'promotionL',
                'discounts', 'shipping_fee', 'shippingType', 'infoPoint', 'coefficientPoint', 'minPoint', 'point'));
        } else {
            return redirect('/gio-hang');
        }
    }

    /**
     * Chọn hinh thuc van chuyen
     */
    public function delivery(Request $request)
    {
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $user_cookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
        } else {
            return redirect('/gio-hang');
        }

        $shippingType = false;
        $coefficientPoint = CommonEnum::COEFFICIENT_POINT;
        $minPoint = CommonEnum::MIN_POINT;
        $point = 0;
        $totalPrice = 0;
        $totalDiscount = 0;
        $list_products = [];
        $itemService = [];
        $itemDiscount = [];
        $cart_data = ShoppingCartBusiness::getDataCart($list_products);
        $url = config()->get('constants.API_FC_LOGIN_REGISTER').ApiEnum::MYACCOUNT_GET_LIST_SHIPPING_ADDRESS.$user_cookie[0]['customer_id'].'/0/10';
        $server_output = Curl::to($url)->get();
        $server_output = json_decode($server_output, true);
        $list_address = $server_output['data'];
        if ($list_address['total'] == 0 && $user_cookie[0]['telephone'] == null) {
            // Check OTP
            $s = OTPController::checkOTP($request->get('telephone'), $request->get('telephone_code'));
            $s = json_decode($s, true);
            if ($s['responseCode'] != '00') { // Mã xác thực không chính xác
                return redirect('/thong-tin')->with('error', $s['message']);
            }
        }

        if (count($list_products) == 0) {
            return redirect('/gio-hang');
        }

        $shippingAddress = $cart_data->createDataOrder($user_cookie, $request);
        if (isset($shippingAddress['post_address']) && $shippingAddress['post_address'] == true) {
            return redirect('/dat-hang');
        }

        if (! empty($shippingAddress)) {
            $point = (int) $cart_data->identifier;
            $promotions = $cart_data->getPromotion($list_products);
            $promotionL = $cart_data->getPromotionLocation($list_products);
            $discounts = $cart_data->getDiscounts($list_products);
            $myBag = $cart_data->createmyBag($list_products, $discounts, $itemService, $itemDiscount, $totalPrice, $totalDiscount);
            $cart_data->order_value = $totalPrice - $totalDiscount;
            $cart_data->save();
            $data = [
                'shipProvinceCode' => $cart_data->province_id,
                'shipProvinceName' => $cart_data->province_name,
                'shipDistrictCode' => $cart_data->district_id,
                'shipDistrictName' => $cart_data->district_name,
                'shipSubDistrictCode' => $cart_data->sub_district_id,
                'shipSubDistrictName' => $cart_data->sub_district_name,
                'lineItems' => $myBag,
                'orderValue' => $cart_data->order_value,
            ];

            $url = config()->get('constants.API_FC_SHIPMENT').ApiEnum::CUSTOMER_CALCULATOR_SHIPMENT_FEE;
            $server_output = Curl::to($url)->withData($data)->asJson()->post();
            $server_output = json_decode(json_encode($server_output, JSON_UNESCAPED_UNICODE), true);
            if (! empty($server_output['data'])) {
                $shipping_fee = 0;
                $dataShip = [];
                foreach ($server_output['data'] as $row) {
                    if (isset($row['statusCode']) && $row['statusCode'] == 200) {
                        $dataShip[] = $row;
                        if (isset($_COOKIE['shipping_method']) && $_COOKIE['shipping_method'] == $row['shipmentMethodId'].'-'.$row['shipmentVendorId']) {
                            $shipping_fee = $row['fee'];
                        }
                    }
                }

                $shipment_method_output = $dataShip;
                if ($shipping_fee == 0 && count($dataShip) > 0) {
                    $shipping_fee = $dataShip[0]['fee'];
                }
            } else {
                return redirect('/thong-tin')->with('message', 'Hệ thống không thể tính phí vận chuyển');
            }
            $infoPoint = MyAccountBusiness::getPointByCustomer($user_cookie[0]['customer_id']);
            if (empty($infoPoint)) {
                $point = 0;
            }

            return view('cart.payment', compact('cart_data', 'list_products', 'shipping_fee', 'shipment_method_output', 'promotions',
                'promotionL', 'discounts', 'shippingType', 'coefficientPoint', 'minPoint', 'point', 'infoPoint'));
        } else {
            return redirect('/thong-tin');
        }
    }

    /**
     * Tao don hang
     */
    public function solve(Request $request)
    {
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $totalPrice = 0;
            $list_products = [];
            $cart_data = ShoppingCartBusiness::getDataCart($list_products);
            if (count($list_products) == 0) {
                return redirect('/gio-hang');
            }

            $shipping_fee = ! empty($request->get('shipping_fee')) ? $request->get('shipping_fee') : 0;
            $cart_data->content = json_encode($list_products, JSON_UNESCAPED_UNICODE);
            $cart_data->order_code = date('ymd').'-2'.substr(time(), -4).rand(100, 999); //$cart_data->id;
            $cart_data->payment_method = ! empty($request->get('payment_method')) ? $request->get('payment_method') : 0;
            $cart_data->shipping_method_id = ! empty($request->get('shipping_method')) ? $request->get('shipping_method') : 0;
            $cart_data->shipment_method_code = ! empty($request->get('shipmentMethodCode')) ? $request->get('shipmentMethodCode') : '';
            $cart_data->shipping_method_name = ! empty($request->get('shipmentMethodName')) ? $request->get('shipmentMethodName') : '';
            $cart_data->shipment_vendor_id = ! empty($request->get('shipmentVendorId')) ? $request->get('shipmentVendorId') : '';
            $cart_data->shipment_vendor_code = ! empty($request->get('shipmentVendorCode')) ? $request->get('shipmentVendorCode') : '';
            $cart_data->shipment_vendor_name = ! empty($request->get('shipmentVendorName')) ? $request->get('shipmentVendorName') : '';
            $cart_data->shipping_fee = (int) $shipping_fee;
            $cart_data->updated_at = date('Y-m-d H:i:s');
            if ($request->get('payment_method') == 'PaymentGateway') {
                $cart_data->save();

                return redirect('/chuyen-huong/'.$cart_data->order_code);
            } else {
                $cart_data->result = 'create_new_order';
                $cart_data->save();
                $cart_data->createOrder();
                ShoppingCartBusiness::deleteShoppingCart();

                return redirect('/hoan-tat/'.$cart_data->order_code);
            }
        } else {
            return redirect('/gio-hang');
        }
    }

    /**
     * Chuyen thanh toan qua cong cong thanh toan
     */
    public function redirect($orderCode)
    {
        $coefficientPoint = CommonEnum::COEFFICIENT_POINT;
        $point = 0;
        $customerId = 0;
        $list_products = [];
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $user_data = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
            $customerId = $user_data[0]['customer_id'];
        } else {
            return redirect('/gio-hang');
        }

        $cart_data = ShoppingCartBusiness::getDataCartByOrderCode($orderCode, $list_products, $customerId);
        if (! empty($cart_data)) {
            $point = (int) $cart_data->identifier;
            $totalPrice = 0;
            $totalDiscount = 0;
            $itemService = [];
            $itemDiscount = [];
            $discounts = $cart_data->getDiscounts($list_products);
            $myBag = $cart_data->createmyBag($list_products, $discounts, $itemService, $itemDiscount, $totalPrice, $totalDiscount);
            if ($point * $coefficientPoint > $totalPrice) {
                $point = 0;
                $cart_data->identifier = 0;
            }

            $cart_data->order_value = $totalPrice + $cart_data->shipping_fee - $totalDiscount - ($point * $coefficientPoint);
            $vnp_Url = config()->get('constants.VNP_URL');
            $vnp_Returnurl = config()->get('constants.FRONTEND_URL').'/hoan-tat/'.$orderCode;
            $vnp_TmnCode = config()->get('constants.VNP_TMN_CODE');
            $vnp_HashSecret = config()->get('constants.VNP_HASH_SECRET');
            $vnp_TxnRef = $cart_data->order_code;
            $vnp_OrderInfo = $cart_data->customer_id.' thanh toan so tien '.$cart_data->order_value.' VND';
            $vnp_OrderType = 'other';
            $vnp_Amount = $cart_data->order_value;
            $vnp_Locale = 'vi';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = [
                'vnp_Version' => '2.0.0',
                'vnp_Command' => 'pay',
                'vnp_TmnCode' => $vnp_TmnCode,
                'vnp_Amount' => $vnp_Amount * 100,
                'vnp_CreateDate' => date('YmdHis'),
                'vnp_CurrCode' => 'VND',
                'vnp_IpAddr' => $vnp_IpAddr,
                'vnp_Locale' => $vnp_Locale,
                'vnp_OrderInfo' => $vnp_OrderInfo,
                'vnp_OrderType' => $vnp_OrderType,
                'vnp_ReturnUrl' => $vnp_Returnurl,
                'vnp_TxnRef' => $vnp_TxnRef,
            ];

            $orderLogs = new OrderLogsBusiness();
            $orderLogs->order_code = $inputData['vnp_TxnRef'];
            $orderLogs->order_value = $inputData['vnp_Amount'];
            $orderLogs->payment_method = 'PaymentGateway';
            $orderLogs->customer_id = $cart_data->customer_id;
            $orderLogs->status = 0;
            $orderLogs->save();

            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&'.$key.'='.$value;
                } else {
                    $hashdata .= $key.'='.$value;
                    $i = 1;
                }

                $query .= urlencode($key).'='.urlencode($value).'&';
            }

            $vnp_Url = $vnp_Url.'?'.$query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash('sha256', $vnp_HashSecret.$hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash='.$vnpSecureHash;
            }

            return redirect($vnp_Url);
        } else {
            return redirect('/gio-hang');
        }
    }

    /**
     * thanh toan thanh cong
     */
    public function complete(Request $request, $orderCode)
    {
        $coefficientPoint = CommonEnum::COEFFICIENT_POINT;
        $point = 0;
        $shippingType = false;
        $list_products = [];
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $user_data = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
            $customerId = $user_data[0]['customer_id'];
        } else {
            return redirect('/gio-hang');
        }

        try {
            $completeView = 1;
            $cart_data = ShoppingCartBusiness::getDataCartByOrderCode($orderCode, $list_products, $customerId);
            if (! empty($cart_data)) {
                $point = (int) $cart_data->identifier;
                $shipping_fee = $cart_data->shipping_fee;
                $setting = DB::table('settings')->where('key', '=', 'footer_info')->first();
                if (! empty((array) $setting)) {
                    $setting = json_decode($setting->value, true);
                } else {
                    $setting = ['telephone_contact' => ''];
                }

                if ($cart_data->payment_method == 'COD') {
                    $discounts = $cart_data->discounts;

                    return view('cart.complete', compact('cart_data', 'list_products', 'shipping_fee', 'setting', 'discounts', 'completeView', 'shippingType', 'coefficientPoint', 'point'));
                } else {
                    $orderLog = OrderLogsBusiness::getDataByOrderCode($orderCode);
                    $inputData = [];
                    foreach ($request->all() as $key => $value) {
                        if (substr($key, 0, 4) == 'vnp_') {
                            $inputData[$key] = $value;
                        }
                    }

                    file_put_contents(storage_path().'/logs/logVNP_'.date('m-d-Y').'.txt', print_r('===['.date('m-d-Y_hi').']', true).PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path().'/logs/logVNP_'.date('m-d-Y').'.txt', print_r(ShoppingCartBusiness::get_client_ip(), true).PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path().'/logs/logVNP_'.date('m-d-Y').'.txt', print_r(json_encode($inputData), true).PHP_EOL, FILE_APPEND);
                    $vnp_SecureHash = $inputData['vnp_SecureHash'];
                    if (! empty($inputData['vnp_SecureHash'])) {
                        unset($inputData['vnp_SecureHashType']);
                        unset($inputData['vnp_SecureHash']);
                        ksort($inputData);
                        $hashData = '';
                        foreach ($inputData as $key => $value) {
                            if ($hashData == '') {
                                $hashData = $hashData.$key.'='.$value;
                            } else {
                                $hashData = $hashData.'&'.$key.'='.$value;
                            }
                        }

                        $vnp_HashSecret = config()->get('constants.VNP_HASH_SECRET');
                        $secureHash = hash('sha256', $vnp_HashSecret.$hashData);
                        $orderCode = $inputData['vnp_TxnRef'];
                        if ($secureHash == $vnp_SecureHash) {
                            if (isset($inputData['vnp_Amount']) && $inputData['vnp_Amount'] != ($orderLog->order_value)) {
                                $cart_data->createTicket($cart_data, $list_products);

                                return redirect('/dat-hang')->with('error', 'Số tiền không hợp lệ');
                            } elseif (isset($inputData['vnp_ResponseCode']) && $inputData['vnp_ResponseCode'] == '00' && isset($inputData['vnp_TransactionNo']) && $inputData['vnp_TransactionNo'] != '0') {
                                $cart_data->payment_transaction = $inputData['vnp_TransactionNo'];
                                $cart_data->payment_date = $inputData['vnp_PayDate'];
                                $cart_data->payment_bank_code = $inputData['vnp_BankCode'];
                                $cart_data->result = 'create_new_order';
                                $cart_data->save();
                                ShoppingCartBusiness::deleteShoppingCart();
                                $discounts = $cart_data->discounts;

                                return view('cart.complete', compact('cart_data', 'list_products', 'shipping_fee', 'orderCode', 'setting', 'discounts', 'completeView', 'shippingType', 'coefficientPoint', 'point'));
                            } else {
                                $cart_data->createTicket($cart_data, $list_products);

                                return redirect('/dat-hang')->with('error', 'Giao dịch lỗi');
                            }
                        } else {
                            return redirect('/gio-hang')->with('error', 'Giao dịch lỗi, sai chữ ký');
                        }
                    } else {
                        return redirect('/gio-hang')->with('error', 'Giao dịch lỗi, sai chữ ký');
                    }
                }
            } else {
                return redirect('/gio-hang')->with('error', 'Mã đơn hàng không tồn tại');
            }
        } catch (\Exception $e) {
            return redirect('/gio-hang')->with('error', 'Giao dịch không tồn tại để cập nhật trạng thái thanh toán');
        }
    }

    /**
     * VNP Call API Đối soát giao dịch
     */
    public function approve(Request $request)
    {
        $returnData = [];
        $list_products = [];
        $inputData = [];
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == 'vnp_') {
                $inputData[$key] = $value;
            }
        }

        file_put_contents(storage_path().'/logs/logVNP_'.date('m-d-Y').'.txt', print_r('===['.date('m-d-Y_hi').']', true).PHP_EOL, FILE_APPEND);
        file_put_contents(storage_path().'/logs/logVNP_'.date('m-d-Y').'.txt', print_r(ShoppingCartBusiness::get_client_ip(), true).PHP_EOL, FILE_APPEND);
        file_put_contents(storage_path().'/logs/logVNP_'.date('m-d-Y').'.txt', print_r(json_encode($inputData), true).PHP_EOL, FILE_APPEND);
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        if (! empty($inputData['vnp_SecureHash'])) {
            unset($inputData['vnp_SecureHashType']);
            unset($inputData['vnp_SecureHash']);
            ksort($inputData);
            $hashData = '';
            foreach ($inputData as $key => $value) {
                if ($hashData == '') {
                    $hashData = $hashData.$key.'='.$value;
                } else {
                    $hashData = $hashData.'&'.$key.'='.$value;
                }
            }

            $vnp_HashSecret = config()->get('constants.VNP_HASH_SECRET');
            $secureHash = hash('sha256', $vnp_HashSecret.$hashData);
            $orderCode = $inputData['vnp_TxnRef'];
            try {
                if ($secureHash == $vnp_SecureHash) {
                    $orderLog = OrderLogsBusiness::getDataByOrderCode($orderCode);
                    $cart_data = ShoppingCartBusiness::getDataCartByOrderCode($orderCode, $list_products);
                    if ($orderLog) {
                        if (isset($inputData['vnp_Amount']) && $inputData['vnp_Amount'] != ($orderLog->order_value)) {
                            $cart_data->createTicket($cart_data, $list_products);
                            $returnData['RspCode'] = '04';
                            $returnData['Message'] = 'Invalid amount';
                        } elseif ((int) $orderLog->status != 0) {
                            $returnData['RspCode'] = '02';
                            $returnData['Message'] = 'Order already confirmed';
                        } elseif (isset($inputData['vnp_ResponseCode']) && $inputData['vnp_ResponseCode'] == '00'
                            && ($cart_data->result == 'start_order' || $cart_data->result == 'create_new_order')
                            && isset($inputData['vnp_TransactionNo']) && $inputData['vnp_TransactionNo'] != '0'
                        ) {
                            $cart_data->result = 'create_new_order';
                            $cart_data->response_code = $inputData['vnp_TransactionNo'];
                            $cart_data->payment_transaction = $inputData['vnp_TransactionNo'];
                            $cart_data->payment_date = $inputData['vnp_PayDate'];
                            $cart_data->payment_bank_code = $inputData['vnp_BankCode'];
                            $cart_data->message = $inputData['vnp_ResponseCode'];
                            $cart_data->save();
                            $cart_data->createOrder();
                            $orderLog->status = 1;
                            $orderLog->save();
                            $query = '';
                            foreach ($request->all() as $key => $value) {
                                $query .= urlencode($key).'='.urlencode($value);
                                if ($key < count($request->all()) - 1) {
                                    $query .= '&';
                                }
                            }

                            $url = config()->get('constants.API_FC_PAYMENT').ApiEnum::APPROVE_PAYMENT_GATEWAY_VNPAY.$query;
                            Curl::to($url)->get();
                            $returnData['RspCode'] = '00';
                            $returnData['Message'] = 'Confirm Success';
                        } else {
                            $cart_data->createTicket($cart_data, $list_products);
                            $orderLog->status = 2;
                            $orderLog->save();
                            $returnData['RspCode'] = '00';
                            $returnData['Message'] = 'Confirm Success';
                        }
                    } else {
                        $returnData['RspCode'] = '01';
                        $returnData['Message'] = 'Order not found';
                    }
                } else {
                    $returnData['RspCode'] = '97';
                    $returnData['Message'] = 'Chu ky khong hop le';
                }
            } catch (\Exception $e) {
                $returnData['RspCode'] = '99';
                $returnData['Message'] = 'Unknow error';
            }
        } else {
            $returnData['RspCode'] = '97';
            $returnData['Message'] = 'Chu ky khong hop le';
        }

        return json_encode($returnData);
    }

    /**
     * Them dia chi giao hang moi
     */
    public function addAddress(Request $request)
    {
        $server_output['responseCode'] = '404';
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $data = [
                'fullName' => $request->get('fullname_delivery'),
                'provinceId' => $request->get('province_id_delivery'),
                'provinceName' => $request->get('province_name_delivery'),
                'districtId' => $request->get('district_id_delivery'),
                'districtName' => $request->get('district_name_delivery'),
                'subDistrictId' => $request->get('sub_district_id_delivery'),
                'subDistrictName' => $request->get('sub_district_name_delivery'),
                'address' => $request->get('address_delivery'),
                'phone' => $request->get('telephone_delivery'),
                'isDefault' => 1,
                'customerId' => $request->get('customer_id'),
            ];

            $url = config()->get('constants.API_FC_LOGIN_REGISTER').ApiEnum::MYACCOUNT_CREATE_SHIPPING_ADDRESS;
            $server_output = Curl::to($url)->withData($data)->asJson()->post();
        }

        return response()->json($server_output);
    }

    public function defaultAddress(Request $request)
    {
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $user_data = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
            $data = [
                'shippingAddressId' => $request->get('shipping_address_id'),
                'isDefault' => 1,
                'customerId' => $user_data[0]['customer_id'],
            ];

            $url = config()->get('constants.API_FC_LOGIN_REGISTER').ApiEnum::MYACCOUNT_UPDATE_SHIPPING_ADDRESS;
            $serverOutput = Curl::to($url)->withData($data)->asJson()->put();
            if ($serverOutput->responseCode == '00') {
                $dataA = json_decode($serverOutput->data, true);
                $list_products = [];
                $cart_data = ShoppingCartBusiness::getDataCart($list_products);
                if ($cart_data) {
                    $cart_data->province_id = $dataA['ProvinceId'];
                    $cart_data->save();
                    $promotions = $cart_data->getPromotion($list_products);
                    $discounts = $cart_data->getDiscounts($list_products);
                    $promotionL = $cart_data->getPromotionLocation($list_products);
                    $prductHtml = view('cart.box.receipt')->with([
                        'cart_data' => $cart_data, 'list_products' => $list_products, 'promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts,
                    ])->render();
                    $promotionHtml = view('cart.list_promotion')->with(['promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts])->render();

                    return response()->json(['status' => 200, 'html' => $prductHtml, 'promotionHtml' => $promotionHtml]);
                } else {
                    return response()->json(['status' => 404, 'message' => 'Chưa tồn tại giỏ hàng']);
                }
            } else {
                return response()->json(['status' => 404, 'message' => 'Lỗi  không tồn tại địa chỉ']);
            }
        } else {
            return response()->json(['status' => 404, 'message' => 'Hãy đăng nhập hệ thống']);
        }
    }

    public function applyShipping(Request $request)
    {
        $list_products = [];
        $shipping_fee = $request->get('shipping_fee');
        $cart_data = ShoppingCartBusiness::getDataCart($list_products);
        if ($cart_data) {
            $promotions = $cart_data->getPromotion($list_products);
            $discounts = $cart_data->getDiscounts($list_products);
            $promotionL = $cart_data->getPromotionLocation($list_products);
            $html = view('cart.box.receipt')->with([
                'cart_data' => $cart_data, 'list_products' => $list_products, 'shipping_fee' => $shipping_fee,
                'promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts,
            ])->render();
            $promotionHtml = view('cart.list_promotion')->with(['promotions' => $promotions, 'promotionL' => $promotionL, 'discounts' => $discounts])->render();

            return json_encode(['status' => 200, 'html' => $html, 'promotionHtml' => $promotionHtml]);
        } else {
            return json_encode(['status' => 404, 'message' => 'Giỏ hàng không tồn tại']);
        }

    }

    /**
     * @return false|string
     */
    public function mergeAccount($customerId, $telephone, $otp)
    {
        $s = OTPController::checkOTP($telephone, $otp);
        $s = json_decode($s, true);
        if ($s['responseCode'] == '00') {
            $s0 = UserBusiness::checkTelephoneExist($telephone, $customerId);
            if ($s0['responseCode'] == '00') { // Số điện thoại đã tồn tại
                $d0 = ['customerId' => (int) $s0['data']['customerId'], 'phone' => null];
                MyAccountBusiness::update_profile_save($d0);
                $d1 = ['customerId' => (int) $customerId, 'phone' => $telephone];
                MyAccountBusiness::update_profile_save($d1);
                switch ($s0['data']['primaryRegister']) {
                    case 'Facebook':
                        $re = json_encode(['error' => 0, 'exist' => 1, 'message' => 'Số điện thoại đã được chuyển từ tài khoản Facebook '.$s0['data']['fullName'].' sang tài khoản hiện tại.']);
                        break;
                    case 'Google':
                    case 'Email':
                        $re = json_encode(['error' => 0, 'exist' => 1, 'message' => 'Số điện thoại đã được chuyển từ tài khoản '.$s0['data']['primaryRegister'].' '.$s0['data']['email'].' sang tài khoản hiện tại.']);
                        break;
                    default: // Source chính là Phone
                        $re = json_encode(['error' => 0, 'exist' => 1, 'message' => 'Số điện thoại đã được chuyển từ tài khoản '.$s0['data']['fullName'].' sang tài khoản hiện tại.']);
                        break;
                }
            } else { // Số điện thoại chưa tồn tại
                $d0 = ['customerId' => (int) $customerId, 'phone' => $telephone];
                MyAccountBusiness::update_profile_save($d0);
                $re = json_encode(['error' => 0, 'exist' => 0, 'message' => 'Đã gán số điện thoại này vào account đang đăng nhập hiện tại']);
            }

            if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                $user_data = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
                $user_info = [
                    'customer_id' => isset($user_data[0]['customer_id']) ? $user_data[0]['customer_id'] : null,
                    'email' => isset($user_data[0]['email']) ? $user_data[0]['email'] : null,
                    'fullname' => isset($user_data[0]['fullname']) ? $user_data[0]['fullname'] : null,
                    'telephone' => $telephone,
                    'isGoogleLogin' => isset($user_data[0]['isGoogleLogin']) ? $user_data[0]['isGoogleLogin'] : null,
                    'isFacebookLogin' => isset($user_data[0]['isFacebookLogin']) ? $user_data[0]['isFacebookLogin'] : null,
                ];
                $user_cookie[] = $user_info;
                $cookie_data = json_encode($user_cookie, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
                setcookie(CommonEnum::COOKIE_USER_DATA, $cookie_data, time() + CommonEnum::COOKIE_USER_TIME, CommonEnum::COOKIE_USER_PATH);
                LoginBusiness::setTokenUser($user_info);
            }
        } else {
            $re = json_encode(['error' => 1, 'message' => 'Mã xác thực không chính xác']);
        }

        return $re;
    }

    public function getOrderContact()
    {
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_DATA])) {
            $user_data = json_decode(MyAccountBusiness::getUserInfoById(json_decode(stripslashes($_COOKIE[CommonEnum::COOKIE_USER_DATA]), true)[0]['customer_id']), true)['data'];
        } else {
            $user_data = ['phone' => '', 'email' => '', 'fullName' => '', 'dateOfBirth' => '', 'gender' => ''];
        }

        $ProductBusiness = new ProductBusiness();
        $all_products = $ProductBusiness->get_all_products()[0]['Products'];

        return view('cart.order_contact', compact('user_data', 'all_products'));
    }

    public function postOrderContact(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required',
                'fullname' => 'required',
                'age' => 'required',
                'email' => 'required',
                'content' => 'required',
            ]);

            $return = true;
            if (config()->get('app.env') !== 'dev') {
                $return = CaptchaBusiness::checkReCaptchaV2($request->get('g-recaptcha-response'));
            }

            if ($return == false) {
                return back()->with(['message' => 'Captcha lỗi. Vui lòng refresh trang để thử lại.']);
            }

            if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                $user_cookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
                $customer_id = $user_cookie[0]['customer_id'];
            } else {
                $customer_id = 0;
            }

            // get the data from the form
            $content = $request->get('content');
            $slug = GenerateUtility::sanitize($content);
            $data = [
                'userId' => 0,
                'customerId' => $customer_id,
                'customerName' => $request->get('fullname'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone') !== null ? $request->get('phone') : '',
                'question' => 'Liên hệ đặt hàng sản phẩm ID = '.$request->get('product_id').' .Nội dung đặt hàng: '.$content,
                'slug' => $slug,
                'publishedAt' => date('Y-m-d H:i:s'),
                'status' => 0, // Đầu api quy định 1 là publish, 0 là pending
                'diseaseId' => $request->get('product_id'),
                'age' => $request->get('age'),
                'highlight' => 0,
            ];
            $url = config()->get('constants.API_FC_LOGIN_REGISTER').ApiEnum::CUSTOMER_POST_QUESTION;
            Curl::to($url)->withData($data)->asJson()->post();
            $view = view('cart.message_contact')->render();

            return back()->with('message', $view);
        } catch (\Exception $exception) {
            return back()->with(['message' => 'Có lỗi xảy ra: '.$exception->getMessage()]);
        }
    }

    public function updateContent(Request $request)
    {
        $content = $request->get('content');
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $shoppingCart = ShoppingCartBusiness::getCartByCustomer();
            if ($shoppingCart) {
                $shoppingCart->content = $content;
                $shoppingCart->result = 'start_order';
            } else {
                $userData = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
                $shoppingCart = new ShoppingCartBusiness();
                $shoppingCart->result = 'start_order';
                $shoppingCart->created_at = date('Y-m-d H:i:s');
                $shoppingCart->customer_id = $userData[0]['customer_id'];
                $shoppingCart->content = $content;
            }

            $shoppingCart->save();
        } else {
            setcookie(CommonEnum::COOKIE_CART_ITEM, $content, time() + CommonEnum::COOKIE_USER_TIME);
        }

        return response()->json(['status' => 200, 'message' => 'OK']);
    }

    public function updatePoint(Request $request)
    {
        $point = $request->get('point');
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $shoppingCart = ShoppingCartBusiness::getCartByCustomer();
            if ($shoppingCart) {
                $shoppingCart->identifier = $point;
                $shoppingCart->save();
            }

        }

        return response()->json(['status' => 200, 'message' => 'OK']);
    }

    public function createTicket(Request $request)
    {
        $fullName = $request->get('fullName');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $dataTicket = [
            'customerId' => 0,
            'source' => 13,
            'description' => 'Mua hàng trên web 5nhatnhat.com',
            'items' => [],
        ];

        if ($fullName != '' && $phone != '') {
            $dataTicket['fullName'] = $fullName;
            $dataTicket['phone'] = $phone;
            $dataTicket['address'] = $address;
            if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                $userCookie = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
                if (isset($userCookie[0]['customer_id'])) {
                    $dataTicket['customerId'] = $userCookie[0]['customer_id'];
                }
            }

            $shoppingCart = ShoppingCartBusiness::getCart();
            if (! empty($shoppingCart)) {
                $listProducts = (array) json_decode($shoppingCart->content, true);
                $d = [];
                foreach ($listProducts as $v) {
                    if (isset($v['item_id']) && $v['item_id'] > 0) {
                        $d[] = ['productId' => $v['item_id'], 'quantity' => $v['item_quantity']];
                    }
                }

                $dataTicket['items'] = $d;
            }

            if (! empty($dataTicket['items'])) {
                $spb = new ShoppingCartBusiness();
                $spb->createTicket($dataTicket, $listProducts);
                if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                    $shoppingCart->delete();
                } else {
                    unset($_COOKIE[CommonEnum::COOKIE_CART_ITEM]);
                    setcookie(CommonEnum::COOKIE_CART_ITEM, null, -1);
                }

                $message = "Cảm ơn <span style=\"color:red\">$fullName</span> đã gửi thông tin.</br> Chúng tôi sẽ liên hệ lại với bạn theo số <span style=\"color:red\">0818122122</span>.";

                return response()->json(['status' => 200, 'message' => $message]);
            } else {
                return response()->json(['status' => 404, 'message' => 'Không có sản phẩm']);
            }
        } else {
            return response()->json(['status' => 404, 'message' => 'Số điện thoại không đúng']);
        }
    }

    public function createOrderLDP(Request $request)
    {
        $messageSuccess = 'Cảm ơn quý khách đã gửi yêu cầu tư vấn. Dược sĩ Nhất Nhất sẽ liên hệ tư vấn trong thời gian sớm nhất.';
        $messageError = 'Gửi thông tin đặt hàng thất bại. Vui lòng thử lại sau ít phút nữa!';
        $items = [];
        $data = [
            'customerId' => null,
            'fullName' => $request->get('fullname_order') ? $request->get('fullname_order') : '',
            'phone' => $request->get('telephone_order') ? $request->get('telephone_order') : '',
            'source' => $request->get('source_id') ? (int) $request->get('source_id') : '',
            'advertisingSource' => $request->get('advertising_source'),
            'oppSource' => $request->get('opp_source') ? $request->get('opp_source') : '',
            'address' => $request->get('address_order') ? $request->get('address_order') : '',
            'description' => $request->get('description') ? $request->get('description') : '',
        ];

        if ($request->get('product_id')) {
            if (strpos($request->get('product_id'), ',') === false) {
                $items[] = [
                    'productId' => (int) $request->get('product_id'),
                    'quantity' => $request->get('quantity') ? (int) $request->get('quantity') : 1,
                ];
            } else {
                $productIds = explode(',', $request->get('product_id'));
                foreach ($productIds as $p) {
                    $items[] = ['productId' => $p, 'quantity' => 1];
                }
            }
        }

        $data['items'] = $items;
        if ($request->get('tags')) {
            $listTags = [];
            foreach ($request->get('tags') as $tag) {
                array_push($listTags, ['tagId' => (int) $tag]);
            }
            $data['tags'] = $listTags;
        }

        try {
            $url = config()->get('constants.API_FC_APP').ApiEnum::CUSTOMER_POST_OPPORTUNITY;
            $response = Curl::to($url)->withData($data)->asJson()->post();
            if ($request->get('quantity')) {
                $messageSuccess = 'Cảm ơn quý khách đã đặt hàng. Dược sĩ Nhất Nhất sẽ liên hệ xác nhận đơn hàng trong thời gian sớm nhất.';
            }

            $result = json_encode(['error' => 0, 'message' => $messageSuccess, 'data' => $data]);

            return $result;
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), ['error' => 1, 'message' => $messageError, 'data' => $data]);

            return json_encode(['error' => 0, 'message' => $messageSuccess, 'data' => $data]);
        }
    }
}
