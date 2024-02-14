@extends('layouts.mobile.default')
@section('content')
    <div id="body_content"> <style>
            #cart_page table { border-collapse: collapse; }
            #cart_page table td { border: solid 1px #ddd; }
            #cart_page table td a { color: #0062ac; }
            #cart_page table td table td { border: none; }
            .tbl_nobdr td { border: none !important; }
            table tbody { display: table-row-group; vertical-align: middle; border-color: inherit; }
            #cart_page table td { padding: 5px; }
            input[type="submit"] { background: #6e6566; border: none; padding: 5px 8px; color: #fff; cursor: pointer; }
            input[type="submit"]:hover { background-color: #eb1c24; }
            input[type="button"] { background: #6e6566; border: none; padding: 5px 8px; color: #fff; cursor: pointer; }
            input[type="button"]:hover { background-color: #eb1c24; }
            .frm_submit td input[type="text"] {width: 200px;}
            .frm_submit td textarea {width: 202px;}
        </style>

        <div class="page_path"> Giỏ hàng </div>
        <div class="clear_fix">
            <div id="cart_page" style="padding: 10px;">
                <div style="font-weight:bold;font-family:Tahoma; font-size:12px"> Hướng dẫn: </div>
                <ul style="font-family:Tahoma; font-size:12px; line-height:18px;padding-left: 15px;margin: 10px 0;">
                    <li>Để cập nhật số lượng sản phẩm cần mua, vui lòng điền số lượng vào ô tương ứng rồi, trang web sẽ tự động cập nhật lại tổng giá trị mới nhất cho quý khách.</li>
                    <li>Nếu quý khách không muốn đặt mua sản phẩm nữa, click Xóa để loại bỏ sản phẩm</li>
                    <li>Khi quý khách thỏa mãn với đơn hàng của mình, vui lòng click nút <b>Gửi đơn hàng</b>.</li>
                </ul>
                <!---->

                <form method="post" enctype="multipart/form-data" action="/send-cart" onsubmit="return check_field()">
                    <table id="table-shopping-cart" cellpadding="5" border="1" bordercolor="#CCCCCC" width="100%">
                        <tbody><tr id="shopping-cart-first-row">
                            <td>Sản phẩm</td>
                            <td id="shopping-cart-sum-col">Tổng giá</td>
                            <td id="shopping-cart-del-col">Xóa</td>
                        </tr>

                        <!-- -->




                        <!-- 15490000-->
                        <tr class="itemCart js-item-row" data-variant_id="0" data-item_id="53481" data-item_type="product" data-sku="LAP.ACE.A715.53PJ.NH.QGESV.007" data-name="Laptop Acer Aspire A715 76 53PJ NH.QGESV.007 (Core i5 12450H/ 16GB/ 512GB SSD/ Intel UHD Graphics/ 15.6inch Full HD/ Windows 11 Home/ Black/ 1 Year)" data-id="53481">
                            <td>
                                <table>
                                    <tbody><tr>
                                        <td><img src="https://phucanhcdn.com/media/product/120_53481_laptop_acer_aspire_a715_76_53pj_nh_qgesv_007_8.jpg"></td>
                                        <td> <a href="/laptop-acer-aspire-a715-76-53pj-nh-qgesv-007.html"><b>Laptop Acer Aspire A715 76 53PJ NH.QGESV.007 (Core i5 12450H/ 16GB/ 512GB SSD/ Intel UHD Graphics/ 15.6inch Full HD/ Windows 11 Home/ Black/ 1 Year)</b></a>
                                            <input type="hidden" class="bulk_price_config" value="[]">
                                            <input type="hidden" class="buy-price" value="15490000">
                                            <p><span class="js-show-buy-price">15.490.000</span>VNĐ</p>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>

                            <td>
                                <div class="unit-detail-amount-control">
                                    <a href="javascript:;" class="quantity-change amount-down" data-value="-1">-</a>
                                    <input type="text" size="3" value="1" class="buy-quantity quantity-change" data-stock="7">
                                    <a href="javascript:;" class="quantity-change amount-up" data-value="1">+</a>
                                </div>

                                <p style="font-weight:bold; margin-top:10px; color:#e00;">
                                    <span class="total-item-price">15.490.000</span>
                                </p>
                            </td>
                            <td style="width: 20px;"><a href="javascript:void(0)" class="delete-from-cart">Xóa</a></td>
                        </tr>




                        <!-- 16629000-->
                        <tr class="itemCart js-item-row" data-variant_id="0" data-item_id="44679" data-item_type="product" data-sku="ROW.ASU.RT-AX53U" data-name="Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)" data-id="44679">
                            <td>
                                <table>
                                    <tbody><tr>
                                        <td><img src="https://phucanhcdn.com/media/product/120_44679_rt_ax53u_4.jpg"></td>
                                        <td> <a href="/bo-phat-wifi-6-asus-rt-ax53u-mimo-ax1800mbps.html"><b>Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)</b></a>
                                            <input type="hidden" class="bulk_price_config" value="[]">
                                            <input type="hidden" class="buy-price" value="1139000">
                                            <p><span class="js-show-buy-price">1.139.000</span>VNĐ</p>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>

                            <td>
                                <div class="unit-detail-amount-control">
                                    <a href="javascript:;" class="quantity-change amount-down" data-value="-1">-</a>
                                    <input type="text" size="3" value="1" class="buy-quantity quantity-change" data-stock="45">
                                    <a href="javascript:;" class="quantity-change amount-up" data-value="1">+</a>
                                </div>

                                <p style="font-weight:bold; margin-top:10px; color:#e00;">
                                    <span class="total-item-price">1.139.000</span>
                                </p>
                            </td>
                            <td style="width: 20px;"><a href="javascript:void(0)" class="delete-from-cart">Xóa</a></td>
                        </tr>

                        <!--DEAL
                        -->


                        <tr class="itemCart">
                            <td colspan="3" class="red"><b>Tổng cộng: <span class="total-cart-price" style="color: #e00;">16.629.000</span>&nbsp;<span>VNĐ
            </span></b></td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <p style="margin:8px 0;">Mã giảm giả / Quà tặng</p>
                                <div class="voucher space10px">
                                    <input type="text" placeholder="Nhập mã giảm giá" class="txt" id="js_voucher_input" name="coupon_code">

                                    <a href="javascript:void(0);" class="button button-check-discount js-voucher-submit" style="padding:7px 10px">Áp dụng</a>
                                    <div class="clear"></div>
                                    <span id="checking_discount_code js-voucher-message" style="margin: 5px 0px; display: block; color:#f00; font-size:13px;"></span>
                                    <div class="clear"></div>
                                </div>
                            </td>
                        </tr>
                        <tr class="itemCart">
                            <td colspan="3" class="red">Khuyến mãi khi sử dụng code: <span data-discount="0" id="price-discount">0</span> VNĐ</td>
                        </tr>
                        <tr class="itemCart">
                            <td colspan="3" class="red"><b>Thanh toán: <span class="total-cart-payment" style="color: #e00;">16.629.000</span>&nbsp;<span>VNĐ</span></b></td>
                        </tr>

                        </tbody></table>

                    <div class="b_shop chudam">
                        <!--<a href="#buy7">Đặt hàng</a>-->
                        <input type="button" onclick="location.href='/';" value="Tiếp tục mua hàng" style="cursor:pointer;">
                    </div>
                    <div class="spacer">
                    </div>
                    <br>

                    <br>
                    <br>
                    <div id="cart-form">
                        <h4>Để tiện cho việc xử lý đơn hàng, vui lòng điền đầy đủ thông tin.</h4>
                        <p>
                            <label>Họ và tên*</label>
                            <input type="text" name="user_info[name]" id="buyer_name" value="" placeholder="Họ tên người nhận hàng">
                        </p>
                        <p>
                            <label>Số điện thoại di động*</label>
                            <input type="text" name="user_info[tel]" id="buyer_tel" value="" placeholder="Dùng để liên lạc khi giao hàng">
                        </p>
                        <p>
                            <label>Email (Vui lòng điền chính xác)*</label>
                            <input type="text" name="user_info[email]" id="buyer_email" value="" placeholder="Để nhận thông báo đơn hàng">
                        </p>
                        <p>
                            <label style="display:inline-block;" class="rd-shipping-method active" data-id="address-info">
                                <input type="radio" name="shipping-method" id="enter-address" checked=""> Địa chỉ giao hàng
                            </label>
                            <label style="display:inline-block;" class="rd-shipping-method" data-id="showroom-info">
                                <input type="radio" name="shipping-method" id="select-store" onclick="getListShowroom('')"> Nhận tại siêu thị
                            </label>
                        </p>
                        <div class="ship-info" id="address-info">
                            <p>
                                <!--<label>Địa chỉ*</label>-->
                                <input type="text" name="user_info[address]" id="buyer_address" value="" placeholder="Địa chỉ nhận hàng">
                            </p>
                        </div><!--address-->
                        <div class="ship-info" id="showroom-info" style="display:none;">
                            <select id="province" onchange="getListDistrict(this.value)"><option value="0">Chọn Tỉnh/TP</option><option value="Hà Nội">Hà Nội</option></select>
                            <select id="district" onchange="getListShowroom(this.value)"><option value="0">Chọn Quận/Huyện</option></select>
                            <div id="store-list"></div>
                        </div><!--showroom-->
                        <!--<p>
                          <label>Ghi chú</label>
                          <textarea name="user_info[note]" id="buyer_note" placeholder="Ghi chú khách hàng"></textarea>
                        </p>-->
                        <p>
                            <label>Ghi chú</label>
                            <textarea name="user_info[note]" onkeyup="change(this);" id="buyer_note" placeholder="Yêu cầu lắp đặt hoặc ghi chú thêm..."></textarea>
                            <span style="float:right;font-style:italic;">Bạn đã nhập <span id="char_cnt" style="color:red;">0</span> ký tự. Bạn còn <span id="chars_left" style="color:red;">155</span> ký tự nữa.</span>
                        </p>
                        <div class="clear" style="clear:both;"></div>
                        <div class="cart-info-box">
                            <label id="js-box-company" class="m-0">
                                <input type="checkbox">
                                <span class="text-14">Xuất hóa đơn công ty</span>
                            </label>

                            <div class="info-box-group mt-3" style="display: none;">
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
                            <div class="item-pay">
                                <input type="radio" name="pay_method" value="1" onchange="paymentShow('pay0')" checked="checked">
                                <span>Thanh toán khi nhận hàng</span>
                                <div class="detail" id="pay0" style="display: none;">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item-pay">
                                <input type="radio" name="pay_method" value="2" onchange="paymentShow('pay1')">
                                <span>Thanh toán chuyển khoản qua tài khoản ngân hàng</span>
                                <div class="detail" id="pay1" style="display: none;">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item-pay">
                                <input type="radio" name="pay_method" value="3" onchange="paymentShow('pay2')">
                                <span>Thanh toán trực tuyến (bằng thẻ ATM, VISA, MASTER)</span>
                                <div class="detail" id="pay2" style="display: none;">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item-pay">
                                <input type="radio" name="pay_method" value="4" onchange="paymentShow('pay3')">
                                <span>Trả góp qua thẻ tín dụng</span>
                                <div class="detail" id="pay3" style="display: none;">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item-pay">
                                <input type="radio" name="pay_method" value="5" onchange="paymentShow('pay4')">
                                <span>Thanh toán Online qua VNpay (bằng thẻ ATM, VISA, MASTER, quét mã QR VNpay)</span>
                                <div class="detail" id="pay4" style="display: none;">
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" id="js-total-before-fee-discount" value="16629000">
                        <!---mot so bien khac chi de front-end-->
                        <input type="hidden" id="js-discount-voucher" value="0">
                        <input type="hidden" id="js-discount-membership" value="0">
                        <input type="hidden" id="js-fee-shipping" value="0">
                        <input type="hidden" id="js-fee-cod" value="0">
                        <input type="hidden" name="send_order" value="yes">
                        <input type="hidden" name="email_route" value="default" id="email_route">
                        <input type="submit" id="btn-submit" value="Gửi đơn hàng >>" style="cursor:pointer; height:30px;">

                    </div><!--cart-form-->



                </form>

                <!---->
                <div class="clear_fix"></div>
            </div>
        </div>
        <div class="nd thanhtoan">
            <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">
                - Quý khách hàng thực hiện việc chuyển khoản qua ngân hàng tổng số tiền mua hàng, cước vận chuyển&nbsp;(nếu có) vào tài khoản của Phúc Anh (ghi rõ nội dung nộp tiền là thanh toán tiền mua ..… cho công ty Phúc Anh).
            </p>
            <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">- Quý khách chuyển tiền cho chúng tôi vào tài khoản sau đây:</p>

            <p style="font-family: 'times new roman', times; font-size: 13pt; text-align: justify;">Tên tài khoản: <strong>CÔNG TY TNHH KỸ NGHỆ PHÚC ANH</strong></p>

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
                            <strong><strong></strong></strong>Phúc Anh sẽ thực hiện giao dịch ngay sau khi nhận được tiền chuyển khoản từ Quý khách.
                        </span>
            </p>
        </div>
        <!--thanhtoan-->
        <!--category_product_list-->
        <script type="text/javascript">
            function change (el) {
                //alert('nhập thông tin ghi chú')
                var max_len = 155;
                if (el.value.length > max_len) {
                    el.value = el.value.substr(0, max_len);
                }
                document.getElementById('char_cnt').innerHTML = el.value.length;
                document.getElementById('chars_left').innerHTML = max_len - el.value.length;
                return true;
            }
        </script>

    </div>
@endsection
