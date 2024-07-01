@extends('layouts.default')
@section('content')
    <div class="container">
        <div id="breadcrumb">
            <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/" itemprop="url" class="nopad-l">
                    <span itemprop="title">Trang chủ</span>
                </a>
            </div>
            <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                &nbsp;/&nbsp;
                <a href="" itemprop="url">
                    <span itemprop="title">Giỏ hàng</span>
                </a>
            </div>
        </div>
        <!--breadcrumb-->
        <div class="clear"></div>
        <h1 style="font-size: 18px; display: inline; font-weight: 500;">Giỏ hàng của tôi</h1>
        <a href="/" class="btn" style="background: #24aa98; color: #fff; font-size: 15px; padding: 5px 10px; border-radius: 3px; -moz-border-radius: 3px; margin-left: 10px;">Tiếp tục mua hàng</a>
        <div class="space20"></div>
        <div id="cart-page">
            <form method="post" enctype="multipart/form-data" action="/thanh-toan" onsubmit="return check_field()">
                @csrf
                <div class="cart-left">
                    <table class="tbl-cart">
                        <tbody>
                        <tr class="itemCart js-item-row product_1" data-variant_id="0" data-item_id="46807" data-item_type="product" data-sku="ROW.ASU.RT-AX1800HP" data-name="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)" data-id="46807">
                            <td style="width: 100px;">
                                <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax1800hp-mu-mimo-aimesh.html" class="itemCart-img"><img src="https://phucanhcdn.com/media/product/120_46807_rt_ax1800hp_4.jpg" alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"></a>
                            </td>
                            <td style="border-right: solid 1px #eee; padding-right: 15px;">
                                <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax1800hp-mu-mimo-aimesh.html" class="itemCart-name">
                                    Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)
                                </a>
                                <p class="itemCart-stock">
                                    <span style="color: #eaaa00;"><img src="https://phucanh.vn/template/2019/images/icon_list_stock.png" alt="còn hàng">&nbsp;Còn hàng</span>
                                </p>
                            </td>
                            <td style="width: 210px;">
                                <p class="itemCart-price" style="font-size: 16px;">
                                    <input type="hidden" class="bulk_price_config" value="[]">
                                    <input type="hidden" class="buy-price" value="1350000">
                                    <span class="js-show-buy-price">1.350.000</span> VNĐ
                                </p>
                                <p class="itemCartOldPrice">1.599.000 VNĐ<br></p>
                                <p class="itemCart-price">
                                    Thành tiền: <span class="total-item-price">1.350.000</span>
                                </p>
                            </td>
                            <td>
                                <div class="unit-detail-amount-control">
                                    <a href="javascript:;" class="quantity-change amount-down" data-price="" data-product="1" onclick="cart_minus_item(this)">-</a>
                                    <input type="text" size="3" value="1" class="buy-quantity quantity-change quantity" data-stock="40">
                                    <a href="javascript:;" class="quantity-change amount-up" data-price="" data-product="1" onclick="cart_plus_item(this)">+</a>
                                </div>
                            </td>
                            <td width="45px">
                                <a class="itemCart-del delete-from-cart" href="javascript:void(0)" onclick="cart_delete_item(1)" style="padding: 0;"><img src="https://phucanh.vn/template/2019/images/icon_cart_del.png" alt=""></a>
                            </td>
                        </tr>
                        <tr class="itemCart js-item-row product_2" data-variant_id="0" data-item_id="44679" data-item_type="product" data-sku="ROW.ASU.RT-AX53U" data-name="Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)" data-id="44679">
                            <td style="width: 100px;">
                                <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax53u-mimo-ax1800mbps.html" class="itemCart-img"><img src="https://phucanhcdn.com/media/product/120_44679_rt_ax53u_4.jpg" alt="Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"></a>
                            </td>
                            <td style="border-right: solid 1px #eee; padding-right: 15px;">
                                <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax53u-mimo-ax1800mbps.html" class="itemCart-name">
                                    Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)
                                </a>
                                <p class="itemCart-stock">
                                    <span style="color: #eaaa00;"><img src="https://phucanh.vn/template/2019/images/icon_list_stock.png" alt="còn hàng">&nbsp;Còn hàng</span>
                                </p>
                            </td>
                            <td style="width: 210px;">
                                <p class="itemCart-price" style="font-size: 16px;">
                                    <input type="hidden" class="bulk_price_config" value="[]">
                                    <input type="hidden" class="buy-price" value="1099000">
                                    <span class="js-show-buy-price">1.099.000</span> VNĐ
                                </p>
                                <p class="itemCartOldPrice">1.390.000 VNĐ<br></p>
                                <p class="itemCart-price">
                                    Thành tiền: <span class="total-item-price">1.099.000</span>
                                </p>
                            </td>
                            <td>
                                <div class="unit-detail-amount-control">
                                    <a href="javascript:;" class="quantity-change amount-down" data-price="" data-product="2" onclick="cart_minus_item(this)">-</a>
                                    <input type="text" size="3" value="1" class="buy-quantity quantity-change quantity" data-stock="61">
                                    <a href="javascript:;" class="quantity-change amount-up" data-price="" data-product="2" onclick="cart_plus_item(this)">+</a>
                                </div>
                            </td>
                            <td width="45px">
                                <a class="itemCart-del delete-from-cart" href="javascript:void(0)" onclick="cart_delete_item(2)" style="padding: 0;"><img src="https://phucanh.vn/template/2019/images/icon_cart_del.png" alt=""></a>
                            </td>
                        </tr>
                        <!--DEAL-->
                        <tr class="itemCart">
                            <td colspan="2" align="right" style="vertical-align: middle;">Tổng cộng:</td>
                            <td colspan="3" class="red">
                                <b> <span class="total-cart-price" style="color: #e00; font-size: 25px;">2.449.000</span>&nbsp; <span>VNĐ</span></b>
                            </td>
                        </tr>
                        <tr class="itemCart">
                            <td colspan="2" align="right" style="vertical-align: middle;">Mã giảm giả / Quà tặng</td>
                            <td colspan="3">
                                <div class="voucher space10px">
                                    <input type="text" placeholder="Nhập mã giảm giá" class="txt" id="js_voucher_input" name="coupon_code">
                                    <a href="javascript:void(0);" class="button button-check-discount js-voucher-submit js-apply-discount-code" style="padding: 7px 10px;">Áp dụng</a>
                                    <div class="clear"></div>
                                    <span id="js-voucher-message" style="margin: 5px 0px; display: block; color: #f00; font-size: 13px;"></span>
                                    <div class="clear"></div>
                                </div>
                            </td>
                        </tr>
                        <tr class="itemCart">
                            <td colspan="2" align="right" style="vertical-align: middle;">Khuyến mãi khi sử dụng code:</td>
                            <td colspan="3" class="red"><span data-discount="0" id="price-discount">0</span> VNĐ</td>
                        </tr>
                        <tr class="itemCart">
                            <td colspan="2" align="right" style="vertical-align: middle;">Tổng giá trị đơn hàng:</td>
                            <td colspan="3" class="red">
                                <b><span class="total-cart-payment" style="color: #e00; font-size: 25px;">2.449.000</span>&nbsp;<span>VNĐ</span></b>
                            </td>
                        </tr>
                        <tr class="itemCart">
                            <td colspan="2" align="right" style="vertical-align: middle;"></td>
                            <td colspan="3" class="red">
                                <a href="/print/user.php?view=cart-new" class="txt_b"><i class="fa fa-print"></i> In báo giá</a>
                                <a href="/ajax/export_download.php?file_type=xls&amp;content_type=shopping-cart-new" class="txt_b" style="padding-left: 10px;"> <i class="fa fa-download"></i> Tải file excel</a>
                            </td>
                        </tr>
                        </tbody></table>
                    <div class="nd thanhtoan">
                        <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">
                            - Quý khách hàng thực hiện việc chuyển khoản qua ngân hàng tổng số tiền mua hàng, cước vận chuyển&nbsp;(nếu có) vào tài khoản của NIIT-ICT Hà Nội (ghi rõ nội dung nộp tiền là thanh toán tiền mua ..… cho công ty NIIT-ICT Hà Nội).
                        </p>
                        <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">- Quý khách chuyển tiền cho chúng tôi vào tài khoản sau đây:</p>
                        <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">Tên tài khoản: <strong>CÔNG TY TNHH KỸ NGHỆ NIIT-ICT Hà Nội</strong></p>
                        <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">Địa chỉ: số 15 Xã Đàn, phường Phương Liên, quận Đống Đa, Thành phố Hà Nội</p>
                        <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">Điện thoại: (024) 35737383 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Fax: (024) 35737347</p>
                        <div class="pay-qrcode-bank">
                            <ul>
                                <li>
                                    <img src="https://phucanh.vn/template/2019/images/ma-vietqr-BIDV.png" alt="BIDV">
                                    <h3>Ngân hàng TMCP Đầu tư và Phát triển Việt Nam(BIDV)</h3>
                                </li>
                                <li>
                                    <img src="https://phucanh.vn/template/2019/images/ma-vietqr-techcombank.png" alt="TECHCOMBANK">
                                    <h3>Ngân hàng TMCP Kỹ thương Việt Nam(TECHCOMBANK)</h3>
                                </li>
                                <li>
                                    <img src="https://phucanh.vn/template/2019/images/ma-vietqr-VCB.png" alt="VCB">
                                    <h3>Ngân hàng TMCP Ngoại thương Việt Nam(VCB)</h3>
                                </li>
                                <li>
                                    <img src="https://phucanh.vn/template/2019/images/ma-vietqr-MB.png" alt="BIDV">
                                    <h3>Ngân hàng TMCP Quân đội(MB)</h3>
                                </li>
                            </ul>
                        </div>
                        <p>
                        <span style="font-size: 12pt; font-family: 'times new roman', times;">
                            <strong><strong></strong></strong>NIIT-ICT Hà Nội sẽ thực hiện giao dịch ngay sau khi nhận được tiền chuyển khoản từ Quý khách.
                        </span>
                        </p>
                    </div>
                    <!--thanhtoan-->
                </div>
                <!--cart-left-->
                <div class="cart-right">
                    <div class="title">2. Thông tin thanh toán</div>
                    <p>
                        Để tiếp tục đặt hàng, quý khách xin vui lòng <a style="color: #185ede;" href="/dang-nhap?return_url={{url('cart')}}"><b>đăng nhập</b></a> hoặc nhập thông tin bên dưới.
                    </p>
                    <p>
                        Bằng cách đặt hàng, bạn đồng ý với <a style="color: #185ede;" href="/trang/dieu-khoan-giao-dich" target="_blank"><b>Điều khoản giao dịch</b></a> của NIIT-ICT Hà Nội.
                    </p>
                    <p>
                        <label>Họ và tên *</label>
                        <input type="text" name="user_info[name]" id="buyer_name" value="" placeholder="Họ tên người nhận hàng" required>
                    </p>
                    <p>
                        <label>Số điện thoại di động *</label>
                        <input type="text" name="user_info[tel]" id="buyer_tel" value="" placeholder="Dùng để liên lạc khi giao hàng" required>
                    </p>
                    <p>
                        <label>Email (Vui lòng điền chính xác) *</label>
                        <input type="text" name="user_info[email]" id="buyer_email" value="" placeholder="Để nhận thông báo đơn hàng" required>
                    </p>
                    <p>
                        <label style="display: inline-block;" class="rd-shipping-method active" data-id="address-info"> <input type="radio" name="shipping-method" id="enter-address" checked=""> Địa chỉ giao nhận hàng *</label>
                        <label style="display: inline-block;" class="rd-shipping-method" data-id="showroom-info"> <input type="radio" name="shipping-method" id="select-store" onclick="getListShowroom('')"> Giao nhận tại siêu thị </label>
                    </p>
                    <div class="ship-info" id="address-info">
                        <p>
                            <input type="text" name="user_info[address]" id="buyer_address" value="" placeholder="Địa chỉ nhận hàng." required>
                        </p>
                    </div>
                    <!--address-->
                    <div class="ship-info" id="showroom-info">
                        <select id="province" name="user_info[province]" onchange="getListDistrict(this.value)"><option value="0">Chọn Tỉnh/TP</option><option value="Hà Nội">Hà Nội</option></select>
                        <select id="district" name="user_info[district]" onchange="getListShowroom(this.value)">
                            <option value="0">Chọn Quận/Huyện</option>
                        </select>
                        <div id="store-list" style="display: none;"></div>
                    </div>
                    <!--showroom-->
                    <p>
                        <label>Ghi chú</label>
                        <textarea name="user_info[note]" onkeyup="change(this);" id="buyer_note" placeholder="Yêu cầu lắp đặt hoặc ghi chú thêm..."></textarea>
                        <span style="float:right; font-style:italic;">Bạn đã nhập <span id="char_cnt" style="color:red;">0</span> ký tự. Bạn còn <span id="chars_left" style="color:red;">155</span> ký tự nữa.</span>
                    </p>
                    <div class="clear" style="clear:both;"></div>
                    <div class="cart-info-box" style="margin: 5px;padding: 5px 10px;">
                        <label id="js-box-company" class="m-0">
{{--                            <input type="checkbox">--}}
                            <span class="text-14">Xuất hóa đơn công ty</span>
                        </label>
                        <div class="info-box-group mt-3">
                            <div class="customer-item" style="margin-bottom: 10px;">
                                <input type="text" placeholder="Tên công ty" name="user_info[tax_company]">
                            </div>
                            <div class="customer-item" style="margin-bottom: 10px;">
                                <input type="text" placeholder="Địa chỉ công ty" name="user_info[tax_address]">
                            </div>
                            <div class="customer-item" style="margin-bottom: 10px;">
                                <input type="text" placeholder="Mã số thuế" name="user_info[tax_code]">
                            </div>
                        </div>
                    </div>
                    <div class="payment_method">
                        <div class="item-pay" style="padding: 3px 10px;">
                            <input type="radio" name="pay_method" value="1" onchange="paymentShow('pay0')" checked="checked">
                            <span>Thanh toán khi nhận hàng.</span>
                            <em>
                                <div class="detail" id="pay0" style="display: none;"></div>
                            </em>
                            <div class="clear"></div>
                        </div>
                        <div class="item-pay" style="padding: 3px 10px;">
                            <input type="radio" name="pay_method" value="2" onchange="paymentShow('pay1')">
                            <span>Thanh toán chuyển khoản qua tài khoản ngân hàng.</span>
                            <em>
                                <div class="detail" id="pay1" style="display: none;"></div>
                            </em>
                            <div class="clear"></div>
                        </div>
                        <div class="item-pay" style="padding: 3px 10px;">
                            <input type="radio" name="pay_method" value="3" onchange="paymentShow('pay2')">
                            <span>Thanh toán trực tuyến (bằng thẻ ATM, VISA, MASTER).</span>
                            <em>
                                <div class="detail" id="pay2" style="display: none;"></div>
                            </em>
                            <div class="clear"></div>
                        </div>
                        <div class="item-pay" style="padding: 3px 10px;">
                            <input type="radio" name="pay_method" value="5" onchange="paymentShow('pay4')">
                            <span>Thanh toán Online qua VNpay (bằng thẻ ATM, VISA, MASTER, quét mã QR VNpay).</span>
                            <em>
                                <div class="detail" id="pay4" style="display: none;"></div>
                            </em>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="btn-buy-order js-btn-buy-order-container">
                        <input type="submit" value="Đặt hàng" class="submit" id="btn-submit">
                        <span>Tư vấn viên sẽ gọi điện thoại xác nhận</span>
                    </div>
                </div>
                <!--cart-right-->
                <input type="hidden" id="js-total-before-fee-discount" value="2449000">
                <!---mot so bien khac chi de front-end-->
                <input type="hidden" id="js-discount-voucher" value="0">
                <input type="hidden" id="js-discount-membership" value="0">
                <input type="hidden" id="js-fee-shipping" value="0">
                <input type="hidden" id="js-fee-cod" value="0">
                <input type="hidden" name="send_order" value="yes">
                <input type="hidden" name="email_route" value="default" id="email_route">
            </form>
            <div class="space20"></div>
        </div>
        <!--cart-page-->
    </div>
@endsection
