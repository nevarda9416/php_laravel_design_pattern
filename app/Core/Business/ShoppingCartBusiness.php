<?php

namespace App\Core\Business;

use App\Core\Enums\ApiEnum;
use App\Core\Enums\CommonEnum;
use App\Core\Models\ShoppingCart;
use Ixudra\Curl\Facades\Curl;

class ShoppingCartBusiness extends ShoppingCart
{
    public static function getCart()
    {
        $shoppingCart = null;
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $shoppingCart = ShoppingCartBusiness::getCartByCustomer();
        } else if (isset($_COOKIE[CommonEnum::COOKIE_CART_ITEM])) {
            $shoppingCart = new ShoppingCartBusiness();
            $shoppingCart->content = $_COOKIE[CommonEnum::COOKIE_CART_ITEM];
        }

        return $shoppingCart;
    }

    public static function getCartByCustomer()
    {
        $userData = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
        return ShoppingCartBusiness::where([['customer_id', '=', $userData[0]['customer_id']], ['result', '=', 'start_order']])->orderBy('id', 'DESC')->first();
    }

    public static function getDataCart(&$list_products)
    {
        $shoppingCart = null;
        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
            $user_data = MyAccountBusiness::getUserInfoByToken($_COOKIE[CommonEnum::COOKIE_USER_TOKEN]);
            $customerId = $user_data[0]['customer_id'];
            $shoppingCart = ShoppingCartBusiness::where([['customer_id', '=', $customerId], ['order_id', '=', 0], ['result', '=', 'start_order']])->orderBy('id', 'DESC')->first();
        } else if (isset($_COOKIE[CommonEnum::COOKIE_CART_ITEM])) {
            $shoppingCart = new ShoppingCartBusiness();
            $shoppingCart->content = $_COOKIE[CommonEnum::COOKIE_CART_ITEM];
        }

        if ($shoppingCart && !empty($shoppingCart->content)) {
            $shoppingCart->discounts = (array)json_decode($shoppingCart->discounts, true);
            $list_products = (array)json_decode($shoppingCart->content, true);
            ShoppingCartBusiness::getListCartInfo($list_products);
        }

        return $shoppingCart;
    }

    public static function getDataCartPromotion(&$listProducts, &$discounts, &$promotions)
    {
        $check = false;
        $shoppingCart = ShoppingCartBusiness::getDataCart($listProducts);
        if ($shoppingCart) {
            $promotions = $shoppingCart->getPromotion($listProducts);
            $discounts = is_array($shoppingCart->discounts) ? $shoppingCart->discounts : json_decode($shoppingCart->discounts, true);
            if (count($discounts) > 0) {
                foreach ($discounts as $key => $discount) {
                    if ($discount['promotionType'] == 1) {
                        if (isset($promotions[$discount['id']])) {
                            $discounts[$key] = json_decode(json_encode($promotions[$discount['id']], JSON_UNESCAPED_UNICODE), true);
                            $discounts[$key]['coupon_code'] = isset($discount['coupon_code']) ? $discount['coupon_code'] : '';
                        } else {
                            unset($discounts[$key]);
                            $check = true;
                        }
                    } else {
                        if (isset($discount['coupon_code']) && $discount['coupon_code'] != '') {
                            $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_VALIDATE_COUPON . '?coupon=' . $discount['coupon_code'];
                            $dataP = Curl::to($url)->get();
                            $dataP = json_decode($dataP, true);
                            if ($dataP['statusCode'] == 200 && count((array)$dataP['data'])) {
                                $discounts[$key] = $dataP['data'];
                                if ($dataP['data']['typeId'] == 3) {
                                    foreach ($dataP['data']['promotionReward'] as $k => $rew) {
                                        $rw = json_decode($rew['rewards'], true);
                                        $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_DETAIL . $rw['ProductId'];
                                        $dataPro = Curl::to($url)->get();
                                        $dataPro = json_decode($dataPro, true);
                                        $productM = array(
                                            'item_id' => $rw['ProductId'],
                                            'item_sku' => isset($dataPro['data']['ProductSkus'][0]['Sku']) ? $dataPro['data']['ProductSkus'][0]['Sku'] : '',
                                            'item_name' => $dataPro['data']['Name'],
                                            'item_image' => isset($dataPro['data']['ThumbnailUrl']) ? $dataPro['data']['ThumbnailUrl'] : '',
                                            'item_price' => 0,
                                            'item_url' => '#',
                                            'item_description' => $dataPro['data']['ShortDescription1'],
                                            'item_quantity' => $rw['Quantity'],
                                            'weight' => isset($dataPro['data']['ProductSkus'][0]['WeightGram']) ? $dataPro['data']['ProductSkus'][0]['WeightGram'] : '',
                                        );

                                        $discounts[$key]['promotionReward'][$k]['product'] = $productM;
                                    }
                                }
                                $discounts[$key]['coupon_code'] = isset($discount['coupon_code']) ? $discount['coupon_code'] : '';
                            } else {
                                unset($discounts[$key]);
                                $check = true;
                            }
                        }
                    }
                }

                if ($check) {
                    $shoppingCart->discounts = json_encode($discounts, JSON_UNESCAPED_UNICODE);
                    if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                        $shoppingCart->save();
                    }
                }
            }
        }

        return $shoppingCart;
    }

    public static function getDataCartByOrderId($orderId, $customerId, &$list_products)
    {
        $shoppingCart = ShoppingCartBusiness::where([['order_id', '=', $orderId], ['customer_id', '=', $customerId]])->first();
        if ($shoppingCart) {
            $list_products = json_decode($shoppingCart->content, true);
        }

        return $shoppingCart;
    }

    public static function getDataCartByOrderCode($orderCode, &$list_products, $customerId = 0)
    {
        if ($customerId) {
            $shoppingCart = ShoppingCartBusiness::where([['order_code', '=', $orderCode], ['customer_id', '=', $customerId]])->first();
        } else {
            $shoppingCart = ShoppingCartBusiness::where([['order_code', '=', $orderCode]])->first();
        }

        if ($shoppingCart) {
            $list_products = json_decode($shoppingCart->content, true);
            $shoppingCart->discounts = json_decode($shoppingCart->discounts, true);
        }

        return $shoppingCart;
    }

    public static function getListCartInfo($list_products)
    {
        $ids = [];
        if (count($list_products) > 0) {
            foreach ($list_products as $key => $v) {
                $ids[] = ['productId' => $v['item_id'], 'quantity' => $v['item_quantity']];
                unset($list_products[$key]['promotion']);
            }
        }

        $products = [];//ProductBusiness::getListProductCheckoutByIds($ids);
        $listP = [];
        if (count($products) > 0) {
            foreach ($products as $v) {
                if (isset($v['Id'])) {
                    $listP[$v['Id']] = $v['Id'];
                    $list_products[$v['Id']]['item_weightgram'] = $v['WeightGram'];
                    $list_products[$v['Id']]['item_convertedweightgram'] = $v['ConvertedWeightGram'];
                    $list_products[$v['Id']]['item_dimensionxcm'] = $v['DimensionXCm'];
                    $list_products[$v['Id']]['item_dimensionycm'] = $v['DimensionYCm'];
                    $list_products[$v['Id']]['item_dimensionzcm'] = $v['DimensionZCm'];
                    $list_products[$v['Id']]['item_name'] = $v['Name'];
                    $list_products[$v['Id']]['item_url'] = $v['url_detail'];
                    $list_products[$v['Id']]['item_image'] = $v['ThumbnailUrl'];
                    $list_products[$v['Id']]['item_description'] = $v['ShortDescription1'];
                    $list_products[$v['Id']]['item_price'] = $v['SalePrice'];
                    $list_products[$v['Id']]['item_sku'] = $v['Sku'];
                    if (isset($v['promotion'])) {
                        $list_products[$v['Id']]['promotion'] = $v['promotion'];
                    }
                }
            }
        }

        foreach ($list_products as $key => $product) {
            if (!isset($listP[$key])) {
                unset($list_products[$key]);
            }
        }
    }

    public function createDataOrder($user_cookie, $request)
    {
        $shippingAddress = [];
        if (!empty($request->get('fullname_delivery'))) {
            $data = array(
                'fullName' => $request->get('fullname_delivery'),
                'provinceId' => $request->get('province_id_delivery'),
                'provinceName' => $request->get('province_name_delivery'),
                'districtId' => $request->get('district_id_delivery'),
                'districtName' => $request->get('district_name_delivery'),
                'subDistrictId' => $request->get('sub_district_id_delivery'),
                'subDistrictName' => $request->get('sub_district_name_delivery'),
                'address' => $request->get('address_delivery'),
                'phone' => !empty($request->get('telephone_delivery')) ? $request->get('telephone_delivery') : $user_cookie[0]['telephone'],
                'isDefault' => 1,
                'customerId' => $user_cookie[0]['customer_id']
            );

            $url = config()->get('constants.API_FC_LOGIN_REGISTER') . ApiEnum::MYACCOUNT_CREATE_SHIPPING_ADDRESS;
            $server_output = Curl::to($url)->withData($data)->asJson()->post();
            $server_output = json_decode(json_encode($server_output), true);
            if (!empty($server_output['data'])) {
                $shippingAddress = $server_output['data'];
                $shippingAddress['post_address'] = true;
            }
        } elseif (!empty($request->get('shippingAddressId'))) {
            $shippingAddress = ShoppingCartBusiness::getShippingAddressById($request->get('shippingAddressId'));
        } else {
            $url = config()->get('constants.API_FC_LOGIN_REGISTER') . ApiEnum::MYACCOUNT_GET_LIST_SHIPPING_ADDRESS . $user_cookie[0]['customer_id'] . '/0/1';
            $server_output = Curl::to($url)->get();
            $server_output = json_decode($server_output, true);
            if (!empty($server_output['data']['data'][0])) {
                $shippingAddress = $server_output['data']['data'][0];
            }
        }

        if (!empty($shippingAddress)) {
            if (!empty($request->get('customer_note'))) {
                $this->customer_note = $request->get('customer_note');
            }

            $this->customer_id = $user_cookie[0]['customer_id'];
            $this->shipping_fullname = $shippingAddress['fullName'];
            $this->shipping_address = $shippingAddress['address'];
            $this->province_id = $shippingAddress['provinceId'];
            $this->province_name = $shippingAddress['provinceName'];
            $this->district_id = $shippingAddress['districtId'];
            $this->district_name = $shippingAddress['districtName'];
            $this->sub_district_id = $shippingAddress['subDistrictId'];
            $this->sub_district_name = $shippingAddress['subDistrictName'];
            $this->shipping_phone = $shippingAddress['phone'] ? $shippingAddress['phone'] : $user_cookie[0]['telephone'];
            $this->customer_name = $user_cookie[0]['fullname'];
            $this->customer_phone = $user_cookie[0]['telephone'];
            $this->shipping_email = $user_cookie[0]['email'];
            $this->save();
        }

        return $shippingAddress;
    }

    public function createOrder()
    {
        $check = false;
        if ($this->result == 'create_new_order') {
            try {
                $coefficientPoint = CommonEnum::COEFFICIENT_POINT;
                $point = (int)$this->identifier;
                $totalPrice = 0;
                $totalDiscount = 0;
                $itemService = [];
                $itemDiscount = [];
                $list_products = is_array($this->content) ? $this->content : json_decode($this->content, true);
                $discounts = $this->getDiscounts($list_products);
                $myBag = $this->createmyBag($list_products, $discounts, $itemService, $itemDiscount, $totalPrice, $totalDiscount);
                if ($point * $coefficientPoint > $totalPrice) {
                    $point = 0;
                    $this->identifier = 0;
                }
                $data = array(
                    'orderCode' => $this->order_code,
                    'customerId' => $this->customer_id,
                    'customerName' => $this->customer_name,
                    'customerPhone' => $this->customer_phone,
                    'customerNote' => $this->customer_note,
                    'shipCustomerFullname' => $this->shipping_fullname,
                    'shipProvinceCode' => $this->province_id,
                    'shipProvinceName' => $this->province_name,
                    'shipDistrictCode' => $this->district_id,
                    'shipDistrictName' => $this->district_name,
                    'shipSubDistrictCode' => $this->sub_district_id,
                    'shipSubDistrictName' => $this->sub_district_name,
                    'shipAddressLine1' => $this->shipping_address,
                    'shipCustomerEmail' => $this->shipping_email,
                    'shipPhone1' => $this->shipping_phone,
                    'amount' => $totalPrice,
                    'shipFee' => (int)$this->shipping_fee,
                    'totalAmount' => $totalPrice + (int)$this->shipping_fee - (int)$totalDiscount - ($point * $coefficientPoint),
                    'paymentMethod' => $this->payment_method,
                    'paymentTransaction' => $this->payment_transaction,
                    'paymentDate' => $this->payment_date,
                    'paymentBankCode' => $this->payment_bank_code,
                    'shipMethodId' => $this->shipping_method_id,
                    'shipmentMethodName' => $this->shipping_method_name,
                    'shipmentMethodCode' => $this->shipment_method_code,
                    'shipmentVendorId' => $this->shipment_vendor_id,
                    'shipmentVendorCode' => $this->shipment_vendor_code,
                    'shipmentVendorName' => $this->shipment_vendor_name,
                    'createdSource' => 'web',
                    'createdBy' => '',
                    'pointLoyalty' => $point,
                    'deductionLoyalty' => $point * $coefficientPoint,
                    'lineItems' => $myBag,
                    'lineServices' => $itemService,
                    'LineDiscounts' => $itemDiscount
                );

                $start_time = microtime(true);
                $url = config()->get('constants.API_FC_ORDER') . ApiEnum::CUSTOMER_CREATE_NEW_ORDER;
                $server_output1 = Curl::to($url)->withData($data)->asJson()->post();
                $server_output1 = json_decode(json_encode($server_output1, JSON_UNESCAPED_UNICODE), true);
                $end_time = microtime(true);
                try {
                    if (config()->get('constants.CUSTOM_LOG_ORDER') == "true") {
                        //Log order
                        file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r('=========[' . date('m-d-Y_hi') . ']', true) . PHP_EOL, FILE_APPEND);
                        file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r('orderCode: ' . $this->order_code, true) . PHP_EOL, FILE_APPEND);
                        file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r(json_encode($data), true) . PHP_EOL, FILE_APPEND);
                        file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r(json_encode($server_output1), true) . PHP_EOL, FILE_APPEND);
                        file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r('Request elapsed: ' . ($end_time - $start_time), true) . PHP_EOL, FILE_APPEND);
                    }
                } catch (\Exception  $e) {
                    // Ignore
                }

                if ($server_output1['statusCode'] == '200') {
                    $this->result = 'complete';
                    $this->order_value = $totalPrice + $this->shipping_fee - $totalDiscount;
                    $this->order_id = $server_output1['data']['orderId'];
                    $check = $this->save();
                    $this->applyPromotion($itemDiscount);
                } else if ($server_output1['statusCode'] == '409') {
                    $check = true;
                }
            } catch (\Exception $ex) {
                if (config()->get('constants.CUSTOM_LOG_ORDER') == "true") {
                    //Log order
                    file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r('=========[' . date('m-d-Y_hi') . ']', true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r('orderCode: ' . $this->order_code, true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r(json_encode($data), true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r('Request exception: ', true) . PHP_EOL, FILE_APPEND);
                    file_put_contents(storage_path() . '/logs/logOrder_' . date('m-d-Y') . '.txt', print_r(json_encode($ex), true) . PHP_EOL, FILE_APPEND);
                }
            }
        }

        return $check;
    }

    public function createTicket($dataCart, $listProducts)
    {
        if (is_object($dataCart) && isset($dataCart->shipPhone1) && $dataCart->shipPhone1 !== '') {
            $dataTicket = [
                'customerId' => $dataCart->customerId,
                'fullName' => $dataCart->shipCustomerFullname,
                'phone' => $dataCart->shipPhone1,
                'address' => $dataCart->shipAddressLine1,
                'description' => 'Mua hàng trên web 5nhatnhat.com thất bại',
                'source' => 13,
            ];

            foreach ($listProducts as $dataI) {
                $dataTicket['items'][] = ['productId' => $dataI['item_id'], 'quantity' => $dataI['item_quantity']] ;
            }
        } else {
            $dataTicket = $dataCart;
        }

        $dataTicket['ipAddress'] = ShoppingCartBusiness::get_client_ip();
        $url = config()->get('constants.API_FC_APP') . ApiEnum::CUSTOMER_POST_OPPORTUNITY;
        $result = Curl::to($url)->withData($dataTicket)->asJson()->post();
    }

    public function applyPromotion($itemDiscount)
    {
        if (count($itemDiscount) > 0) {
            foreach ($itemDiscount as $key => $service) {
                $dataD = [
                    'PromotionId' => $service['promotionId']
                    , 'Coupon' => $service['DiscountName']
                    , 'CustomerId' => $this->customer_id
                    , 'Phone' => $this->customer_phone
                    , 'Email' => $this->shipping_email
                    , 'OrderCode' => $this->order_code
                    , 'Amount' => $service['DiscountAmount']
                ];

                $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_APPLY_COUPON;
                $p = Curl::to($url)->withData($dataD)->asJson()->post();
            }
        }
    }

    public static function getShippingAddressById($shippingAddressId)
    {
        $url = config()->get('constants.API_FC_LOGIN_REGISTER') . ApiEnum::MYACCOUNT_GET_DETAIL_SHIPPING_ADDRESS . $shippingAddressId;
        $server_output = Curl::to($url)->get();
        $server_output = json_decode($server_output, true);
        if (!empty($server_output['data'])) {
            return $server_output['data'];
        } else {
            return array();
        }
    }

    public static function deleteShoppingCart()
    {
        // Clear cookie shopping cart data
        LoginBusiness::clearCookieCartData();
        // Clear cookie shipping_method
        unset($_COOKIE['shipping_method']);
        setcookie('shipping_method', null, -1, '/');
        // Clear cookie shipping_fee
        unset($_COOKIE['shipping_fee']);
        setcookie('shipping_fee', null, -1, '/');
        // Clear cookie payment method
        unset($_COOKIE['payment_method']);
        setcookie('payment_method', null, -1, '/');
    }

    public function createmyBag($products, $discounts, &$service, &$itemDiscount, &$totalPrice, &$totalDiscount)
    {
        $myBag = [];
        $coupon = [];
        $checkIds = [];
        $discounts = json_decode(json_encode($discounts), true);
        $service[] = ["serviceId" => 0, "serviceCode" => '01', "serviceName" => "Phí vận chuyển", "price" => $this->shipping_fee, "notes" => "Phí vận chuyển"];
        foreach ($products as $key => $product) {
            if (isset($product['item_price'])) {
                $price = $product['item_price'];
                if (isset($product['promotion']['coupon']) && ($product['promotion']['coupon'] == ''
                        || ($product['promotion']['coupon'] != '' && isset($discounts[strtoupper($product['promotion']['coupon'])])))) {
                    $price = $product['item_price'] - $product['promotion']['discount'];
                    if (isset($product['promotion']['productName'])) {
                        $itemDiscount[] = [
                            'promotionId' => $product['promotion']['promotionId'],
                            'ServiceId' => $product['promotion']['productId'],
                            'DiscountName' => 'Tặng kèm sản phẩm',
                            'Discount' => $product['promotion']['price'],
                            'DiscountAmount' => $product['promotion']['price'] * round(($product['item_quantity'] * $product['promotion']['quantity']) / $product['promotion']['quantityCondition'], 0, PHP_ROUND_HALF_DOWN),
                            'SKU' => $product['promotion']['productSku'],
                            'ProductName' => $product['promotion']['productName'],
                            'Quantity' => round(($product['item_quantity'] * $product['promotion']['quantity']) / $product['promotion']['quantityCondition'], 0, PHP_ROUND_HALF_DOWN),
                            'DiscountCode' => '0606',
                            'Notes' => '',
                        ];
                    } else {
                        $itemDiscount[] = [
                            'promotionId' => $product['promotion']['promotionId'],
                            'ServiceId' => $product['item_id'],
                            'DiscountName' => 'Giảm giá sản phẩm',
                            'Discount' => $product['promotion']['discount'],
                            'DiscountAmount' => $product['promotion']['discount'] * $product['item_quantity'],
                            'SKU' => $product['item_sku'],
                            'ProductName' => $product['item_name'],
                            'Quantity' => $product['item_quantity'],
                            'DiscountCode' => '0601',
                            'Notes' => '',
                        ];
                    }
                }

                if (isset($product['promotion']['productName']) && $product['promotion']['productName'] != '' &&
                    (isset($product['promotion']['coupon']) && ($product['promotion']['coupon'] == '' || ($product['promotion']['coupon'] != '' && isset($discounts[strtoupper($product['promotion']['coupon'])]))))
                ) {
                    $checkIds[$product['promotion']['promotionId']] = $product['promotion']['promotionId'];
                    $myBag[] = array(
                        'itemId' => $product['promotion']['productId'],
                        'itemSku' => $product['promotion']['productSku'],
                        'itemName' => $product['promotion']['productName'],
                        'salePrice' => 0,
                        'customerPrice' => $product['promotion']['price'],
                        'originalPrice' => $product['promotion']['price'],
                        'quantity' => round(($product['item_quantity'] * $product['promotion']['quantity']) / $product['promotion']['quantityCondition'], 0, PHP_ROUND_HALF_DOWN),
                        'weight' => $product['promotion']['productWeight'],
                        'notes' => ''
                    );
                }

                $totalPrice += $price * $product['item_quantity'];
                $myBag[] = array(
                    'itemId' => $product['item_id'],
                    'itemSku' => $product['item_sku'],
                    'itemName' => $product['item_name'],
                    'salePrice' => $price,
                    'customerPrice' => $price,
                    'originalPrice' => $product['item_price'],
                    'quantity' => $product['item_quantity'],
                    'weight' => $product['item_weightgram'],
                    'notes' => ''
                );
            }
        }

        if (count((array)$discounts) > 0) {
            foreach ($discounts as $discount) {
                if ($discount['promotionType'] == 1) {
                    if ($discount['typeId'] == 3) {
                        if (!isset($checkIds[$discount['id']])) {
                            $pr = [];
                            foreach ($discount['promotionReward'] as $rew) {
                                $rw = json_decode($rew['rewards'], true);
                                if ($totalPrice >= $rw['StartPrice'] && isset($rew['product'])) {
                                    $pr = $rew['product'];
                                }
                            }

                            if (count($pr) > 0) {
                                $myBag[] = array(
                                    'itemId' => $pr['item_id'],
                                    'itemSku' => $pr['item_sku'],
                                    'itemName' => $pr['item_name'],
                                    'salePrice' => 0,
                                    'customerPrice' => $pr['item_price'],
                                    'originalPrice' => $pr['item_price'],
                                    'quantity' => $pr['item_quantity'],
                                    'weight' => $pr['weight'],
                                    'notes' => ''
                                );

                                $itemDiscount[] = [
                                    'promotionId' => $discount['id'],
                                    'ServiceId' => $pr['item_id'],
                                    'DiscountName' => 'Tặng kèm sản phẩm',
                                    'Discount' => $pr['item_price'],
                                    'DiscountAmount' => $pr['item_price'] * $pr['item_quantity'],
                                    'SKU' => $pr['item_sku'],
                                    'ProductName' => $pr['item_name'],
                                    'Quantity' => $pr['item_quantity'],
                                    'DiscountCode' => '0606',
                                    'Notes' => '',
                                ];
                            }
                        }
                    } else {
                        $tP = 0;
                        foreach ($discount['promotionReward'] as $rew) {
                            $rw = json_decode($rew['rewards'], true);
                            if ($rw['Type'] == 1) {
                                if ($totalPrice >= $rw['StartPrice']) {
                                    $tP = (int)$rw['Discount'];
                                }
                            } else {
                                if ($totalPrice >= $rw['StartPrice']) {
                                    $t = ($totalPrice / 100) * (int)$rw['Discount'];
                                    $tP = (isset($rw['Max']) && (int)$rw['Max'] > 0 && $t > $rw['Max']) ? (int)$rw['Max'] : $t;
                                }
                            }
                        }

                        if ($discount['typeId'] == 1) {
                            $tP = ($this->shipping_fee >= $tP) ? $tP : (int)$this->shipping_fee;
                            $totalDiscount += $tP;
                            $itemDiscount[] = [
                                'promotionId' => $discount['id'],
                                'ServiceId' => $discount['id'],
                                'DiscountName' => !empty($discount['coupon_code']) ? $discount['name'] . '(' . $discount['coupon_code'] . ')' : $discount['name'],
                                'Discount' => $tP,
                                'DiscountAmount' => $tP,
                                'SKU' => '',
                                'ProductName' => '',
                                'Quantity' => '',
                                'DiscountCode' => '0501',
                                'Notes' => '',
                            ];
                        } else {
                            $totalDiscount += $tP;
                            $itemDiscount[] = [
                                'promotionId' => $discount['id'],
                                'ServiceId' => $discount['id'],
                                'DiscountName' => !empty($discount['coupon_code']) ? $discount['name'] . '(' . $discount['coupon_code'] . ')' : $discount['name'],
                                'Discount' => $tP,
                                'DiscountAmount' => $tP,
                                'SKU' => '',
                                'ProductName' => '',
                                'Quantity' => 1,
                                'DiscountCode' => '0505',
                                'Notes' => '',
                            ];
                        }
                    }
                } else {
                    if (isset($coupon[$discount['coupon_code']])) {
                        $rw = json_decode($discount['promotionReward'][0]['rewards'], true);
                        $tP = $rw['Discount'] * $coupon[$discount['coupon_code']];
                        $totalDiscount += $tP;
                        $itemDiscount[] = [
                            'promotionId' => $discount['id'],
                            'ServiceId' => $discount['id'],
                            'DiscountName' => !empty($discount['coupon_code']) ? $discount['name'] . '(' . $discount['coupon_code'] . ')' : $discount['name'],
                            'Discount' => $tP,
                            'DiscountAmount' => $tP,
                            'SKU' => '',
                            'ProductName' => '',
                            'Quantity' => 1,
                            'DiscountCode' => '0505',
                            'Notes' => '',
                        ];
                    }
                }

            }
        }

        return $myBag;
    }

    /**
     * @param $customerId
     * @param $shoppingCartId
     */
    public static function addCustomerId($customerId, $content)
    {
        $shoppingCart = ShoppingCartBusiness::where([['customer_id', '=', $customerId], ['order_id', '=', 0], ['result', '=', 'start_order']])->orderBy('id', 'DESC')->first();
        if ($shoppingCart) {
            if (!is_array($shoppingCart->content)) {
                $dataO = json_decode($shoppingCart->content, true);
            } else {
                $dataO = $shoppingCart->content;
            }


            if (!is_array($content)) {
                $data = json_decode($content, true);
            } else {
                $data = $content;
            }

            foreach ($data as $k => $v) {
                $dataO[$k] = $v;
            }
            $shoppingCart->content = json_encode($dataO);
        } else {
            $shoppingCart = new ShoppingCartBusiness();
            $shoppingCart->result = 'start_order';
            $shoppingCart->created_at = date('Y-m-d H:i:s');
            $shoppingCart->content = $content;
            $shoppingCart->customer_id = $customerId;
        }

        $shoppingCart->save();
        unset($_COOKIE[CommonEnum::COOKIE_CART_ITEM]);
        setcookie(CommonEnum::COOKIE_CART_ITEM, null, -1);
    }

    public function getPromotion($products)
    {
        $result = [];
        try {
            $discounts = json_decode(json_encode($this->discounts), true);
            $data = $this->createDataPromotion($products, $discounts);
            $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_BY_CHECKOUT;
            $dataP = Curl::to($url)->withData($data)->asJson()->post();
            if ($dataP->statusCode == 200 && count($dataP->data) > 0) {
                $check = false;
                $idf = 0;
                foreach ($dataP->data as $d) {
                    if ($d->couponType == 1) {
                        if ($d->typeId == 3) {
                            foreach ($d->promotionReward as $k => $rew) {
                                $rw = json_decode($rew->rewards, true);
                                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_DETAIL . $rw['ProductId'];
                                $dataPro = Curl::to($url)->get();
                                $dataPro = json_decode($dataPro, true);
                                $productM = array(
                                    'item_id' => $rw['ProductId'],
                                    'item_sku' => isset($dataPro['data']['ProductSkus'][0]['Sku']) ? $dataPro['data']['ProductSkus'][0]['Sku'] : '',
                                    'item_name' => $dataPro['data']['Name'],
                                    'item_image' => isset($dataPro['data']['ThumbnailUrl']) ? $dataPro['data']['ThumbnailUrl'] : '',
                                    'item_price' => 0,
                                    'item_url' => '#',
                                    'item_description' => $dataPro['data']['ShortDescription1'],
                                    'item_quantity' => $rw['Quantity'],
                                    'weight' => isset($dataPro['data']['ProductSkus'][0]['WeightGram']) ? $dataPro['data']['ProductSkus'][0]['WeightGram'] : '',
                                );

                                $d->promotionReward[$k]->product = $productM;
                            }
                        }

                        $idf = ($idf == 0) ? $d->id : $idf;
                        $result[$d->id] = $d;
                        if (isset($discounts[$d->id])) {
                            $check = true;
                        }
                    }
                }

                if (count($result) > 0 && $check == false) {
                    if (!empty($discounts)) {
                        foreach ($discounts as $discount) {
                            if ($discount['promotionType'] == 1) {
                                $check = true;
                            }
                        }

                        if ($check == false) {
                            $discounts[$result[$idf]->id] = $result[$idf];
                            if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                                $this->discounts = json_encode($discounts, JSON_UNESCAPED_UNICODE);
                                $this->save();
                                $this->discounts = json_decode($this->discounts, true);
                            } else {
                                $this->discounts = $discounts;
                            }

                        }
                    } else {
                        $discounts[$result[$idf]->id] = $result[$idf];
                        if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                            $this->discounts = json_encode($discounts, JSON_UNESCAPED_UNICODE);
                            $this->save();
                            $this->discounts = json_decode($this->discounts, true);
                        } else {
                            $this->discounts = $discounts;
                        }
                    }
                }
            }

            return $result;
        } catch (\Exception $e) {
            return $result;
        }
    }

    public function getPromotionLocation($products)
    {
        $result = [];
        try {
            $data = $this->createDataPromotion($products, [], false);
            $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_BY_LOCATION;
            $dataP = Curl::to($url)->withData($data)->asJson()->post();
            if ($dataP->statusCode == 200 && count($dataP->data) > 0) {
                foreach ($dataP->data as $d) {
                    if ($d->couponType == 1) {
                        if ($d->typeId == 3) {
                            foreach ($d->promotionReward as $k => $rew) {
                                $rw = json_decode($rew->rewards, true);
                                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_DETAIL . $rw['ProductId'];
                                $dataPro = Curl::to($url)->get();
                                $dataPro = json_decode($dataPro, true);
                                $productM = array(
                                    'item_id' => $rw['ProductId'],
                                    'item_sku' => isset($dataPro['data']['ProductSkus'][0]['Sku']) ? $dataPro['data']['ProductSkus'][0]['Sku'] : '',
                                    'item_name' => $dataPro['data']['Name'],
                                    'item_image' => isset($dataPro['data']['ThumbnailUrl']) ? $dataPro['data']['ThumbnailUrl'] : '',
                                    'item_price' => 0,
                                    'item_url' => '#',
                                    'item_description' => $dataPro['data']['ShortDescription1'],
                                    'item_quantity' => $rw['Quantity'],
                                    'weight' => isset($dataPro['data']['ProductSkus'][0]['WeightGram']) ? $dataPro['data']['ProductSkus'][0]['WeightGram'] : '',
                                );

                                $d->promotionReward[$k]->product = $productM;
                            }
                        }

                        $result[$d->id] = $d;
                    }
                }
            }

            return $result;
        } catch (\Exception $e) {
            return $result;
        }
    }

    public function getDiscounts($listProducts)
    {
        $result = [];
        $check = false;
        $discounts = json_decode(json_encode($this->discounts), true);
        if (!empty($discounts)) {
            $dataPromotion = [];
            $data = $this->createDataPromotion($listProducts, $discounts);
            $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_BY_CHECKOUT;
            $dataP = Curl::to($url)->withData($data)->asJson()->post();
            if (property_exists($dataP, 'statusCode') && $dataP->statusCode == 200 && count($dataP->data) > 0) {
                foreach ($dataP->data as $pr) {
                    $dataPromotion[$pr->id] = $pr;
                }
            }

            foreach ($discounts as $key => $discount) {
                if ($discount['promotionType'] == 1) {
                    if (isset($dataPromotion[$discount['id']])) {
                        $result[$key] = json_decode(json_encode($dataPromotion[$discount['id']], JSON_UNESCAPED_UNICODE), true);
                        if ($result[$key]['typeId'] == 3) {
                            foreach ($result[$key]['promotionReward'] as $k => $rew) {
                                $rw = json_decode($rew['rewards'], true);
                                $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_DETAIL . $rw['ProductId'];
                                $dataPro = Curl::to($url)->get();
                                $dataPro = json_decode($dataPro, true);
                                if (isset($dataPro['data']['Name'])) {
                                    $productM = array(
                                        'item_id' => $rw['ProductId'],
                                        'item_sku' => isset($dataPro['data']['ProductSkus'][0]['Sku']) ? $dataPro['data']['ProductSkus'][0]['Sku'] : '',
                                        'item_name' => $dataPro['data']['Name'],
                                        'item_image' => isset($dataPro['data']['ThumbnailUrl']) ? $dataPro['data']['ThumbnailUrl'] : '',
                                        'item_price' => isset($dataPro['data']['ProductSkus'][0]['SalePrice']) ? $dataPro['data']['ProductSkus'][0]['SalePrice'] : '',
                                        'item_url' => '#',
                                        'item_description' => $dataPro['data']['ShortDescription1'],
                                        'item_quantity' => $rw['Quantity'],
                                        'weight' => isset($dataPro['data']['ProductSkus'][0]['WeightGram']) ? $dataPro['data']['ProductSkus'][0]['WeightGram'] : '',
                                    );

                                    $result[$key]['promotionReward'][$k]['product'] = $productM;
                                }
                            }
                        }

                        $result[$key]['coupon_code'] = isset($discount['coupon_code']) ? $discount['coupon_code'] : '';
                    } else {
                        unset($discounts[$key]);
                        $check = true;
                    }
                } else {
                    if (isset($discount['coupon_code']) && $discount['coupon_code'] != '') {
                        $url = config()->get('constants.API_FC_PROMOTION') . ApiEnum::PROMOTION_VALIDATE_COUPON . '?coupon=' . $discount['coupon_code'];
                        $dataP = Curl::to($url)->get();
                        $dataP = json_decode($dataP, true);
                        if ($dataP['statusCode'] == 200 && count((array)$dataP['data'])) {
                            $result[$key] = $dataP['data'];
                            if ($dataP['data']['typeId'] == 3) {
                                foreach ($dataP['data']['promotionReward'] as $k => $rew) {
                                    $rw = json_decode($rew['rewards'], true);
                                    $url = config()->get('constants.API_FC_PRODUCT') . ApiEnum::PRODUCT_GET_PRODUCT_DETAIL . $rw['ProductId'];
                                    $dataPro = Curl::to($url)->get();
                                    $dataPro = json_decode($dataPro, true);
                                    $productM = array(
                                        'item_id' => $rw['ProductId'],
                                        'item_sku' => isset($dataPro['data']['ProductSkus'][0]['Sku']) ? $dataPro['data']['ProductSkus'][0]['Sku'] : '',
                                        'item_name' => $dataPro['data']['Name'],
                                        'item_image' => isset($dataPro['data']['ThumbnailUrl']) ? $dataPro['data']['ThumbnailUrl'] : '',
                                        'item_price' => isset($dataPro['data']['ProductSkus'][0]['SalePrice']) ? $dataPro['data']['ProductSkus'][0]['SalePrice'] : '',
                                        'item_url' => '#',
                                        'item_description' => $dataPro['data']['ShortDescription1'],
                                        'item_quantity' => $rw['Quantity'],
                                        'weight' => isset($dataPro['data']['ProductSkus'][0]['WeightGram']) ? $dataPro['data']['ProductSkus'][0]['WeightGram'] : '',
                                    );

                                    $result[$key]['promotionReward'][$k]['product'] = $productM;
                                }
                            }
                            $result[$key]['coupon_code'] = isset($discount['coupon_code']) ? $discount['coupon_code'] : '';
                        } else {
                            unset($discounts[$key]);
                            $check = true;
                        }
                    }
                }
            }

            if ($check) {
                $this->discounts = json_encode($discounts, JSON_UNESCAPED_UNICODE);
                if (isset($_COOKIE[CommonEnum::COOKIE_USER_TOKEN])) {
                    $this->save();
                }
            }
        }

        return $result;
    }

    public function createDataPromotion($products, $discounts, $checkLocation = true)
    {
        $data['CouponOnly'] = false;
        $data['promotionType'] = 1;
        $total = 0;
        if (count($products) > 0) {
            foreach ($products as $product) {
                if (isset($product['item_quantity'])) {
                    $total += $product['item_price'] * (int)$product['item_quantity'];
                    $data['products'][] = array('productId' => $product['item_id'], 'quantity' => $product['item_quantity']);
                }
            }
        }

        if ($this->customer_id > 0) {
            $data['customerId'] = $this->customer_id;
        }

        if ($checkLocation) {
            if ((int)$this->province_id > 0) {
                $data['location'] = $this->province_id;
            } else if ($this->customer_id > 0) {
                $url = config()->get('constants.API_FC_LOGIN_REGISTER') . ApiEnum::MYACCOUNT_GET_LIST_SHIPPING_ADDRESS . $this->customer_id . '/0/1';
                $server_output = Curl::to($url)->get();
                $server_output = json_decode($server_output, true);
                $list_address = $server_output['data'];
                if (isset($list_address['data'][0]['provinceId']) && $list_address['data'][0]['provinceId'] > 0) {
                    $data['location'] = $list_address['data'][0]['provinceId'];
                    $this->province_id = $list_address['data'][0]['provinceId'];
                    $this->save();
                }
            }

            if (!empty($discounts) > 0) {
                $dt = json_decode(json_encode($discounts), true);
                $cp = '';
                foreach ($dt as $key => $v) {
                    if (isset($v['coupon_code']) && $v['coupon_code'] != '') {
                        $cp .= ',' . $v['coupon_code'];
                    }

                }

                if ($cp != '') {
                    $data['coupon'] = trim($cp, ',');
                }
            }
        }

        $data['totalAmount'] = $total;

        return $data;
    }

    public static function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
