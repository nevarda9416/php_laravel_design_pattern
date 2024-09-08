@extends('layouts.default')
@section('content')
    <div class="container">
        <div id="breadcrumb">
            <div itemscope itemtype="">
                <a href="/" itemprop="url" class="nopad-l">
                    <span itemprop="title">Trang chủ</span>
                </a>
            </div>
            <div itemscope itemtype="">
                &nbsp;/&nbsp;<a href="/thiet-bi-mang" itemprop="url">
                    <span itemprop="title">Thiết bị mạng</span>
                </a>
            </div>
            <div itemscope itemtype="">
                &nbsp;/&nbsp;<a href="/bo-phat-wifi" itemprop="url">
                    <span itemprop="title"><b class="red">Bộ phát wifi</b></span>
                </a>
            </div>
        </div><!--breadcrumb-->
        <h1 style="float: left;overflow: hidden;font-size: 20px;color: #333;line-height: 30px;">{{$productDetailData['name']}}</h1>
        <div class="clear"></div>
        <div id="list-image_fancybox">
            <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_1.jpg" class='fancybox fancybox-item'
               data-fancybox='gallery'></a>
            <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_2.jpg" class='fancybox fancybox-item'
               data-fancybox='gallery'></a>
            <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_3.jpg" class='fancybox fancybox-item'
               data-fancybox='gallery'></a>
            <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_4.jpg" class='fancybox fancybox-item'
               data-fancybox='gallery'></a>
        </div>
        <div id="product-image" class="" style="position:relative;">
            <div id="sync1" class="owl-carousel">
                <div class="item">
                    <a class="MagicZoom" id="Zoomer" href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_4.jpg"
                       title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)">
                        <img src="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_4.jpg"
                             title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"
                             alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </a>
                </div>
                <div class="item">
                    <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_1.jpg" class="MagicZoom" id="Zoomer"
                       title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)">
                        <img src="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_1.jpg"
                             alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </a>
                </div>
                <div class="item">
                    <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_2.jpg" class="MagicZoom" id="Zoomer"
                       title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)">
                        <img src="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_2.jpg"
                             alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </a>
                </div>
                <div class="item">
                    <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_3.jpg" class="MagicZoom" id="Zoomer"
                       title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)">
                        <img src="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_3.jpg"
                             alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </a>
                </div>
                <div class="item">
                    <a href="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_4.jpg" class="MagicZoom" id="Zoomer"
                       title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)">
                        <img src="https://phucanhcdn.com/media/product/46807_rt_ax1800hp_4.jpg"
                             alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </a>
                </div>
            </div>
            <div>
                <div id="sync2" class="owl-carousel" style="padding:0 40px">
                    <div class="item current" style="cursor:pointer"><img
                                src="https://phucanhcdn.com/media/product/75_46807_rt_ax1800hp_4.jpg"
                                alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </div>
                    <div class="item" style="cursor:pointer"><img
                                src="https://phucanhcdn.com/media/product/75_46807_rt_ax1800hp_1.jpg"
                                alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </div>
                    <div class="item" style="cursor:pointer"><img
                                src="https://phucanhcdn.com/media/product/75_46807_rt_ax1800hp_2.jpg"
                                alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </div>
                    <div class="item" style="cursor:pointer"><img
                                src="https://phucanhcdn.com/media/product/75_46807_rt_ax1800hp_3.jpg"
                                alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </div>
                    <div class="item" style="cursor:pointer"><img
                                src="https://phucanhcdn.com/media/product/75_46807_rt_ax1800hp_4.jpg"
                                alt="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                    </div>
                </div>
            </div>
            <div class="pro-summary">
                <?php echo html_entity_decode($productDetailData['summary']) ?>
            </div>
            <div class="clear"></div>
        </div>
        <div id="overview">
            <div id="overview-left">
                <div class="rowtop"></div>
                <div class="clear"></div>
                <!--VNPAY-->
                <div id="js-copy-html-to-bottom">
                    <div id="deal-detail-info" style="display:none;">
                        <p class="mb-1">Giá Deal:
                            <b class="fs-24 red"><span class="js-price-deal"></span> đ</b>
                            <del class="fs-18 grey value-off"><span class="js-price-normal"></span> đ</del>
                        </p>
                        <p class="value-off">Tiết kiệm: <span class="red"><span class="js-discount-deal"></span>%</span>
                            <span class="grey">(<span class="js-priceoff-deal"></span> đ)</span></p>
                        <div id="product-deal-info">
                            <div class="title"><i class="d-icons icon-deal-yellow"></i> Giá sốc</div>
                            <div class="p-order-status" data-left="1" data-total="1">
                                <span class="icons icon-order-status icon-order-status-deal"></span>
                                <span class="text">Đã bán: <span class="js-quantity-left">5</span></span>
                            </div><!--p-order-status-->
                            <div class="time">
                                <span class="title">Kết thúc sau </span>
                                <div class="count-down" id="time-deal-detail"><span class="hour">11</span>:<span
                                            class="min">12</span>:<span class="sec">24</span></div>
                            </div>
                        </div><!--product-deal-info-->
                    </div><!--deal-detail-info-->
                    <div id="product-info-price">
                        <script>
                            dataLayer.push({ecommerce: null});  // Clear the previous ecommerce object.
                            dataLayer.push({
                                event: "view_item",
                                ecommerce: {
                                    currency: "VND",
                                    value: 1350000,
                                    items: [
                                        {
                                            item_id: "ROW.ASU.RT-AX1800HP",
                                            item_name: "Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)",
                                            affiliation: "Asus",
                                            coupon: "",
                                            discount: 0,
                                            index: 0,
                                            item_brand: "Asus",
                                            item_category: "",
                                            item_category2: "",
                                            item_category3: "",
                                            item_category4: "",
                                            item_category5: "",
                                            item_list_id: "",
                                            item_list_name: "",
                                            item_variant: "",
                                            location_id: "",
                                            price: 1350000,
                                            quantity: 1
                                        }
                                    ]
                                }
                            });
                        </script>
                        <table style="width: 100%; background: #f0f0f0; border-radius: 5px; padding: 0 20px;">
                            <tr>
                                <td>Giá niêm yết:</td>
                                <td style="position: relative;">
                                    <span class="detail-product-old-price">{{ number_format($productDetailData['original_price'], 0, '.', '.') }} ₫</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 145px; font-weight: bold;">Giá ưu đãi:</td>
                                <td>
                                    <span class="detail-product-best-price">{{ number_format($productDetailData['sale_price'], 0, '.', '.') }} ₫</span>
                                    <span style="font-size: 12px; color: #888;">[Giá đã có VAT]</span>
                                </td>
                            </tr>
                        </table>
                    </div><!--product-info-price-->
                </div><!--js-copy-html-to-bottom-->
                <p>
                <div class="bao-hanh">
                    <strong>Bảo hành:</strong> 36 Tháng. Bảo hành tại NIIT.
                    <br>
                    <br>
                </div>
                <a><span style=color:red>Giao hàng tận nơi miễn phí theo chính sách vận chuyển</span> <a
                            style="color:blue" ; href="{{url('trang/van-chuyen-giao-nhan-hang-hoa')}}"
                            target="_blank"><i>(Xem chi tiết)</i></a></a>
                </p>
                <p style="margin: 0 0 10px 0;display: none"><strong>Lượt xem:</strong> 13.415</p>
                <div class="button-buy-detail">
                    <a href="javascript:void(0)" onclick="addProductToCart('46807',0,'/cart');"
                       class="btn-buy btn-buy-red1 btn-buynow"><span>Mua ngay</span>Giao hàng tận nơi nhanh chóng</a>
                    <a href="javascript:void(0)" onclick="addProductToCart('46807',0,'');"
                       class="btn-buy btn-buy-blue1 btn-buynow"><span>Cho vào giỏ</span>Mua tiếp sản phẩm khác</a>
                </div>
                <div class="clear"></div>
            </div><!--overview-left-->
            <div id="overview-right">
                <div class="clear"></div>
                <div style="display:none;" id="skupro" data-sku="46807"></div>
                <!-- sale A,D,F hết hàng-->
                <div class="stock-info" id="showroom-info1" style="display:block;">
                    <span id="ktstocksr">Đang còn hàng tại:<br> (Bấm xem dẫn đường)</span>
                    <div id="stock-list">
                        <label>- <a rel="nofollow" target="_blank" href="https://www.google.com/maps/place/Ph%C3%BAc+Anh+SmartWorld-+15+X%C3%A3+%C4%90%C3%A0n/@21.011203,105.8344263,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab871916eb05:0x696fde03613dd134!8m2!3d21.011078!4d105.8367192">Số 15 Xã Đàn, Q.Đống Đa, HN</a></label><label>- <a rel="nofollow" target="_blank" href="https://www.google.com/maps/place/Ph%C3%BAc+Anh+SmartWorld-+134+Th%C3%A1i+H%C3%A0/@21.012089,105.8189362,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab534a6c9bc1:0x4ab60470210947cc!8m2!3d21.012089!4d105.8211249?hl=vi-VN">Số 134 Thái Hà, Q.Đống Đa, HN</a></label><label>- <a rel="nofollow" target="_blank" href="https://www.google.com/maps/place/Ph%C3%BAc+Anh+Computer+World/@21.009269,105.797419,17z/data=!4m13!1m7!3m6!1s0x3135aca6fca51e57:0xa59725fa094ada5a!2zMTUyIFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!3b1!8m2!3d21.009269!4d105.797419!3m4!1s0x3135aca7247ba4db:0x7b8299b80fc526b5!8m2!3d21.0100184!4d105.7986354">Số 152 Trần Duy Hưng, Q.Cầu Giấy, HN</a></label><label>- <a rel="nofollow" target="_blank" href="https://www.google.com/maps/place/Ph%C3%BAc+Anh+Smart+World/@21.0451484,105.7811318,15z/data=!4m5!3m4!1s0x31345561b67bebbb:0xbdf01afb8f719353!8m2!3d21.0455522!4d105.7808813">Số 141 Phạm Văn Đồng, Q.Cầu Giấy, HN</a></label><label>- <a rel="nofollow" target="_blank" href="https://goo.gl/maps/Moz2UmRJ6NDUNTqcA">Số 89 Lê Duẩn, Q. Hoàn Kiếm, HN</a></label>
                    </div>
                </div><!--showroom-->
                <!-- ./. sale E-->
                <div id="uudai">
                    <h4 class="title h-title">NIIT-ICT Hà Nội cam kết</h4>
                    <ul class="ul">
                        <li><i class="icon-star-list"></i> <span>100% sản phẩm chính hãng</span></li>
                        <li><i class="icon-star-list"></i> <span>100% giá cạnh tranh so với thị trường</span></li>
                        <li style="display: flex;"><span> </span></li>
                    </ul>
                    <h4 class="title h-title">Chính sách bán hàng và bảo hành</h4>
                    <ul class="ul">
                        <li><i class="icon-star-list"></i> <span><a>Mua hàng trả góp lãi suất 0% <a style="color:blue" href="{{url('/trang/chinh-sach-mua-tra-gop')}}"><i>Chi tiết</i></a></a></span>
                        </li>
                        <li><i class="icon-star-list"></i> <span><a>Giao hàng nhanh 2h và miễn phí giao hàng từ 500.000đ <a
                                            style="color:blue" href="{{url('/trang/van-chuyen-giao-nhan-hang-hoa')}}"><i>Chi tiết</i></a></a></span>
                        </li>
                        <li><i class="icon-star-list"></i> <span><a>Ưu đãi vàng dành cho khách hàng doanh nghiệp <a
                                            style="color:blue" href="{{url('/trang/chinh-sach-cho-khach-hang-doanh-nghiep')}}"><i>Chi tiết</i></a></a></span>
                        </li>
                        <li><i class="icon-star-list"></i> <span><a>Đổi mới sản phẩm đến 30 ngày &nbsp; &nbsp; &nbsp; &nbsp;    <a
                                            style="color:blue" href="{{url('/trang/chinh-sach-doi-tra-san-pham')}}"><i>Chi tiết</i></a></a></span>
                        </li>
                        <li><i class="icon-star-list"></i> <span><a>Dịch vụ bảo hành chuyên nghiệp, uy tín <a
                                            style="color:blue" href="{{url('/trang/chinh-sach-bao-hanh')}}"><i>Chi tiết</i></a></a></span>
                        </li>
                    </ul>
                </div><!--uudai btn-buy btn-buy-yellow -->
                <div class="button-buy-detail" style="padding: 20px;font-weight: bold;">
                    <a href="javascript:void(0)" onclick="showPopup('popup-tuvan');" class="btn-contact-shop"
                       style="padding:18px 0;">
                    </a>
                </div><!--button-buy-detail-->
            </div><!--overview-right-->
        </div><!--overview-->
        <div class="clear"></div>
        <div class="space20"></div>
        <div id="pro-info-tab" class="font14">
            <div class="title-tab">
                <!--<a href="#tab1" class="active">Thông số kỹ thuật</a>-->
                <a href="#tab2">Đặc điểm nổi bật</a>
                <a href="#tab3">Video</a>
                <!--<a href="#tab4">Sản phẩm bán chạy nhất</a>-->
                <!--<a href="#tab6">Sản phẩm liên quan</a>-->
                <a href="#tab7">Bình luận người dùng</a>
                <a href="#review-statistic" id="gotoReview">Đánh giá sản phẩm</a>
            </div><!--title-tab-->
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="content-tab-left">
                <div id="tab2">
                    <h2 class="h-title">Đặc điểm nổi bật</h2>
                    <div class="nd" style="width: 100%;height:450px;overflow: hidden;">
                        <?php echo html_entity_decode($productDetailData['long_description']) ?>
                    </div>
                    <p class="show-more" style="display: block;" onclick="showArticle();">
                        <a id="xem-them-bai-viet" href="javascript:" class="readmore">Đọc thêm</a>
                    </p>
                    <div class="clear"></div>
                </div><!--tab2-->
                <div id="tab3">
                    <h2 class="h-title">Video</h2>
                    <div style="text-align:center;">
                        <a href="https://www.youtube.com/watch?v=41RidUeotRo&t=2s" title="NIIT-ICT Hà Nội" rel="nofollow"
                           target="_blank">
                            <img width="560" height="315" src="https://www.phucanh.vn/media/banner/sddefault.jpg"
                                 alt="Videos"/>
                        </a>
                    </div>
                </div><!--tab3-->
                @include('box.product_related')
                @include('box.product_seen')
            </div><!--content-tab-left-->
            <div class="content-tab-right">
                <div class="pd-specSummary-group">
                    <p class="title">Cấu hình {{$productDetailData['name']}}</p>
                    <div class="pd-specSummary-holder js-spec-holder">
                        <?php echo html_entity_decode($productDetailData['short_description']) ?>
                    </div>
                    <a href="javascript:void(0)" class="box-btn-spec"
                       onclick="$('#fancybox-spec').fadeIn();$('body').css('overflow','hidden')"><span>Xem thêm cấu hình chi tiết</span></a>
                    <div id="fancybox-spec" class="js-spec-holder" style="display: none">
                        <div style="padding: 24px;margin: 0;max-height: calc(100vh - 40px);max-width: 1000px;position: fixed;top: 50%;left: 50%;transform: translate(-50%,-50%);background: #fff;z-index: 100000;overflow: auto;">
                            <table class="tb-product-spec">
                                <tr>
                                    <td class="spec-key">Tốc độ LAN</td>
                                    <td class="spec-value">: 10/100/1000Mbps</td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Tốc độ WIFI</td>
                                    <td class="spec-value">: AX1800Mbps</td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Angten</td>
                                    <td class="spec-value">: 4 Ăng-ten ngoài</td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Cổng giao tiếp</td>
                                    <td class="spec-value">: RJ45 for Gigabits BaseT for WAN x 1, RJ45 for Gigabits
                                        BaseT for LAN x 4
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Công nghệ Mesh</td>
                                    <td class="spec-value">: Wifi Mesh</td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Chuẩn kết nối</td>
                                    <td class="spec-value">: <a
                                                href="https://www.phucanh.vn/cong-nghe-wifi-6-la-gi.html">Chuẩn AX (Wifi
                                            6)</a></td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Số thiết bị truy cập</td>
                                    <td class="spec-value">: 30-40 User</td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Mô tả khác</td>
                                    <td class="spec-value">: Hỗ trợ công nghệ MU-MIMO và OFDMA, với bảo mật mạng
                                        AiProtection Classic do Trend MicroTM cung cấp, tương thích với hệ thống WiFi
                                        AiMesh của ASUS
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-key">Nhu cầu sử dụng</td>
                                    <td class="spec-value">: Gaming, Gia đình</td>
                                </tr>
                            </table>
                        </div>
                        <div style="position: fixed;inset: 0;background: rgba(0,0,0,0.4);z-index: 99999;cursor: pointer;"
                             onclick="$('#fancybox-spec').fadeOut();$('body').css('overflow','unset')"></div>
                    </div>
                </div>
            </div><!--content-tab-right-->
            <div class="clear"></div>
            <div id="tab7">
                <div id="comment">
                    <h2 class="h-title">Bình luận về sản phẩm
                        <span style="background:#e00;color:#fff;font-size:12px;padding: 2px 10px;border-radius: 3px;-moz-border-radius: 3px;margin-top: -5px;display: inline-block;position: absolute;">0</span>
                    </h2>
                    <div class="comment-action-list">
                        <div class="sort">
                            Sắp xếp bình luận: <a href="javascript:get_comment('','content','new');" class="current">Mới
                                nhất</a>
                            &nbsp;|&nbsp;<a href="javascript:get_comment('','content','like');">Thích nhất</a>
                        </div>
                        <div class="search-comment">
                            <input type="text" id="comment_keyword" class="inputText"
                                   placeholder="Tìm kiếm bình luận..."/>
                            <select>
                                <option value="">Tất cả</option>
                                <option value="content">Theo nội dung</option>
                                <option value="user">Theo người gửi</option>
                            </select>
                        </div><!--search-comment-->
                    </div><!--comment-action-list-->
                    <div class="comment-form">
                        <img src="https://www.phucanh.vn/template/2019/images/noavatar.jpg" alt="avatar"
                             class="img-avatar"/>
                        <form action="" method="post" enctype="multipart/form-data" class="form-post">
                            <input type="hidden" name="user_post[item_type]" value="product"/>
                            <input type="hidden" name="user_post[item_id]" value="46807"/>
                            <input type="hidden" name="user_post[item_title]"
                                   value="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                            <input type="hidden" name="user_post[rate]" value="0"/>
                            <input type="hidden" name="user_post[title]"
                                   value="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)"/>
                            <input type="hidden" name="user_post[user_email]" value=""/>
                            <input type="hidden" name="user_post[user_name]" value=""/>
                            <input type="hidden" name="user_post[user_avatar]" value="0"/>
                            <input id="js-file-upload-id" type="hidden" value=""/>
                            <div class="relative">
                                <textarea name="user_post[content]"
                                          placeholder="Mời bạn thảo luận, vui lòng nhập chữ có dấu"
                                          id="content0"></textarea>
                                <div class="form-input" id="js-preview-file-upload-comment-0">
                                    <a href="javascript:closeFormCommentInput();" class="close">x</a>
                                    <table style="width: 100%;" class="tbl-common">
                                        <tr class="font14">
                                            <td colspan="2">Nhập thông tin để bình luận</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" id="name0" name="user_post[user_name]"
                                                       class="inputText" placeholder="Họ tên (bắt buộc)" value=""/>
                                            </td>
                                            <td><input type="text" id="email0" name="user_post[user_email]"
                                                       class="inputText" placeholder="Email (bắt buộc)" value=""/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="imageUpload" id="js-upload-images">
                                                    <a href="javascript:void(0);"
                                                       class="uploadImage js-test-upload-image" data-id="0"
                                                       data-actions="review" id="js-upload-image-comment"><i
                                                                class="fa fa-camera" style="margin-right: 5px"></i>Đính
                                                        kèm ảnh
                                                        <input class="js-preview-upload-ids" type="hidden" size="40"
                                                               value="" accept="image/*;capture=camera"/>
                                                    </a>
                                                    <label style="margin-left: 10px"><input type="checkbox"
                                                                                            id="js-buyed"
                                                                                            style="vertical-align: top;margin-bottom: 0;margin-right: 0;"/>
                                                        Đã mua hàng tại Phucanh</label>
                                                    <div class="js-preview-upload"
                                                         id="js-preview-file-upload-comment"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="button" onclick="postComment('0','')" value="Gửi bình luận"
                                                       class="btn btn-red"/></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <!--form-input-->
                                <div class="space10"></div>
                            </div>
                            <!--relative-->
                        </form>
                    </div>
                    <!--comment-form-->
                    <div id="comment-list"></div>
                </div><!--comment-->
                <div id="review-statistic">
                    <h4 class="h-title">Chi tiết đánh giá</h4>
                    <p id="ratingOveriew"><i class="icons icon-star star5"></i>&nbsp;&nbsp;<a href="javascript:void(0)" class="blue">(<b class="reviewCount">0</b>
                            người đánh giá)</a></p>
                    <div class="rating-form">
                        <p>Mời bạn gửi đánh giá về sản phẩm</p>
                        <table>
                            <tr>
                                <td style="text-align: right;vertical-align: top;padding-right: 5px;"><img
                                            src="https://www.phucanh.vn/template/2019/images/noavatar.jpg"
                                            alt="avatar"/></td>
                                <td><textarea id="rating-content" placeholder="Đánh giá của bạn"></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Đánh giá:</label></td>
                                <td>
                                    <div class="rating" style="float:left" id="select-rate-pro">
                                        <input type="radio" class="rating-input" id="rating-input-review-0-5" value="5"
                                               name="user_post[rate]" checked=""/>
                                        <label for="rating-input-review-0-5" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="rating-input-review-0-4" value="4"
                                               name="user_post[rate]"/>
                                        <label for="rating-input-review-0-4" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="rating-input-review-0-3" value="3"
                                               name="user_post[rate]"/>
                                        <label for="rating-input-review-0-3" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="rating-input-review-0-2" value="2"
                                               name="user_post[rate]"/>
                                        <label for="rating-input-review-0-2" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="rating-input-review-0-1" value="1"
                                               name="user_post[rate]"/>
                                        <label for="rating-input-review-0-1" class="rating-star"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tên bạn</label></td>
                                <td><input type="text" id="rating-name" class="inputText"/></td>
                            </tr>
                            <tr>
                                <td><label>Email</label></td>
                                <td><input type="text" id="rating-email" class="inputText"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="javascript:void(0);" onclick="send_vote()" class="btn btn-red">Gửi đánh
                                        giá</a></td>
                            </tr>
                        </table>
                    </div><!--rating-form-->
                    <div class="clear"></div>
                    <p class="font14" style="padding-left:5px;"><b class="totalRating">5</b>/5 sao</p>
                </div>
            </div>
        </div>
    </div><!--container-->
@endsection
