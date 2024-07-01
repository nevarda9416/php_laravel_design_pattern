@extends('layouts.default')
@section('content')
    <div id="wrap" class="width_body isCenter">
        <div id="b_scroll_left" class="fload-menu">  </div>
        <div id="b_scroll_right" class="fload-menu">  </div>
        <script type="text/javascript">
            function checkSearch() {
                var _search = $('#autocomplete-ajax').val();
                if (_search == "") {
                    alert("Nhập vào từ khóa tìm kiếm");
                    $('#autocomplete-ajax').val("");
                    $('#autocomplete-ajax').focus();
                    return false;
                }
            }
        </script>
        <style>
            .absolute {position: absolute;}
            #NavChitietSP a {color: #6e6566;}
        </style>
        <div id="container">
            <script type="text/javascript">
                setInterval(function(){
                    $('blink').each(function(){
                        $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
                    });
                }, 250);
            </script>
            <script type="text/javascript">
                $(document).ready(function(e) {
                    $("#product_category_left ul h2").find("a").each(function(i) {
                        var url = location.href;
                        if (this.href == url) {
                            $(this).removeClass("last");
                            $(this).parent().parent().addClass("selected");
                        }
                    });
                });
            </script>
            <div class="clear_fix"></div>
            <div class="col_content isRight product_box 333">
                <div id="container_">
                    <div id="home123" style="margin-bottom: 10px;">
    <span xmlns:v="http://rdf.data-vocabulary.org/#" style="color: #6e6566;">
      <span typeof="v:Breadcrumb"> <a style="color: #6e6566;" rel="v:url" property="v:title" href="/" title="Trang chủ" class="submenuhome123">Trang chủ</a></span>

        &nbsp;&nbsp;/&nbsp;&nbsp;
       <span typeof="v:Breadcrumb">
          <a class="red" rel="v:url" property="v:title" alt="Khuyến mãi" title="Khuyến mãi">Khuyến mãi</a></span>


      </span>
                    </div>
                    <div class="saleoff-heading">
                        <a>Hãy thường xuyên theo dõi các chương trình khuyến mãi để có cơ hội mua HÀNG CHÍNH HÃNG GIÁ TỐT NHẤT</a>
                    </div>
                    <div id="container_KM">

                        <!-- product list quynh-->
                        <div class="data">

                            <div>
                                <ul class="product_list">


                                    <li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/mua-muc-tha-ga-chang-lo-ve-gia.html">
                                                <img src="https://phucanh.vn/includes/images/2458.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/mua-muc-tha-ga-chang-lo-ve-gia.html" title="[Khuyến mại] Mực In Chính Hãng - In Ấn Thả Ga - Không lo về giá">
                                                    [Khuyến mại] Mực In Chính Hãng - In Ấn Thả Ga - Không lo về giá									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-samsung-sale-mung-nam-moi-1.html">
                                                <img src="https://phucanh.vn/includes/images/2471.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-samsung-sale-mung-nam-moi-1.html" title="[Khuyến mãi] Samsung Sale mừng năm mới">
                                                    [Khuyến mãi] Samsung Sale mừng năm mới									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/uu-dai-dac-biet-danh-rieng-cho-hoc-sinh-sinh-vien.html">
                                                <img src="https://phucanh.vn/includes/images/2472.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/uu-dai-dac-biet-danh-rieng-cho-hoc-sinh-sinh-vien.html" title="Ưu đãi đặc biệt dành riêng cho học sinh - sinh viên của NIIT-ICT Hà Nội">
                                                    Ưu đãi đặc biệt dành riêng cho học sinh - sinh viên của NIIT-ICT Hà Nội									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-may-tinh-de-ban-hang-ngan-qua-tang.html">
                                                <img src="https://phucanh.vn/includes/images/2442.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-may-tinh-de-ban-hang-ngan-qua-tang.html" title="[Khuyến Mại] Máy tính để bàn đồng bộ chính hãng | Giá siêu sốc - Quà cực chất - Giảm đến 1.5 triệu đồng">
                                                    [Khuyến Mại] Máy tính để bàn đồng bộ chính hãng | Giá siêu sốc - Quà cực chất - Giảm đến 1.5 triệu đồng									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-mua-camera-luu-du-lieu-tha-ga-2022.html">
                                                <img src="https://phucanh.vn/includes/images/2444.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-mua-camera-luu-du-lieu-tha-ga-2022.html" title="[Khuyến mại] Đón Xuân sang - Giá sập sàn - Quà bạt ngàn - Cùng camera EZVIZ - Imou - TP Link - Hikvision">
                                                    [Khuyến mại] Đón Xuân sang - Giá sập sàn - Quà bạt ngàn - Cùng camera EZVIZ - Imou - TP Link - Hikvision									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/build-pc-chat-rinh-gap-qua-to.html">
                                                <img src="https://phucanh.vn/includes/images/2445.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/build-pc-chat-rinh-gap-qua-to.html" title="[Khuyến mại] Build PC ngay - Nhận quà liền tay">
                                                    [Khuyến mại] Build PC ngay - Nhận quà liền tay									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-thang-7-hieu-nang-vuot-troi-uu-dai-nhan-doi.html">
                                                <img src="https://phucanh.vn/includes/images/2446.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-thang-7-hieu-nang-vuot-troi-uu-dai-nhan-doi.html" title="[Khuyến Mại] PC đồ họa giá tốt - Cấu hình vượt trội">
                                                    [Khuyến Mại] PC đồ họa giá tốt - Cấu hình vượt trội									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-o-cung-di-dong-gia-cuc-soc-con-loc-qua-tang.html">
                                                <img src="https://phucanh.vn/includes/images/2448.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-o-cung-di-dong-gia-cuc-soc-con-loc-qua-tang.html" title="[Khuyến mại] Ổ cứng di động - Giá cực sốc - Cơn lốc quà tặng">
                                                    [Khuyến mại] Ổ cứng di động - Giá cực sốc - Cơn lốc quà tặng									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-luu-tru-toi-da-nhan-qua-tha-ga-voi-thiet-bi-nas.html">
                                                <img src="https://phucanh.vn/includes/images/2449.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-luu-tru-toi-da-nhan-qua-tha-ga-voi-thiet-bi-nas.html" title="[Khuyến mại] Mua Nas giá gốc - Hoàn tiền cực sốc">
                                                    [Khuyến mại] Mua Nas giá gốc - Hoàn tiền cực sốc									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-truc-tuyen-de-dang-nhan-qua-vang.html">
                                                <img src="https://phucanh.vn/includes/images/2450.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-truc-tuyen-de-dang-nhan-qua-vang.html" title="[Khuyến mại] Hội nghị dễ dàng - Nhận ngay quà vàng">
                                                    [Khuyến mại] Hội nghị dễ dàng - Nhận ngay quà vàng									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-o-cung-di-dong-du-lieu-trong-tam-tay.html?gidzl=uJo6Asg7CXxg98OjO94p6kSgXonxacPB_2dNVN_7OK-eUu1uAi5X6wr_qNnynMCR_os3V3IoZOK5O8Go7G">
                                                <img src="https://phucanh.vn/includes/images/2451.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-o-cung-di-dong-du-lieu-trong-tam-tay.html?gidzl=uJo6Asg7CXxg98OjO94p6kSgXonxacPB_2dNVN_7OK-eUu1uAi5X6wr_qNnynMCR_os3V3IoZOK5O8Go7G" title="[Khuyến Mại] Mua hàng online - Nhận ngàn ưu đãi">
                                                    [Khuyến Mại] Mua hàng online - Nhận ngàn ưu đãi									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/van-phong-thong-minh-gia-soc-qua-khung.html">
                                                <img src="https://phucanh.vn/includes/images/2452.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/van-phong-thong-minh-gia-soc-qua-khung.html" title="[Khuyến mại] Khuyến mãi tưng bừng - Ăn mừng năm mới | Máy photocopy chính hãng - Giá siêu khuyến mãi">
                                                    [Khuyến mại] Khuyến mãi tưng bừng - Ăn mừng năm mới | Máy photocopy chính hãng - Giá siêu khuyến mãi									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/du-lieu-an-toan-nhan-ngan-uu-dai-2022.html">
                                                <img src="https://phucanh.vn/includes/images/2454.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/du-lieu-an-toan-nhan-ngan-uu-dai-2022.html" title="[Khuyến mại] Microsoft tri ân – Nhận quà xuân">
                                                    [Khuyến mại] Microsoft tri ân – Nhận quà xuân									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-may-chieu-song-dong-uu-dai-chan-dong.html">
                                                <img src="https://phucanh.vn/includes/images/2455.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-may-chieu-song-dong-uu-dai-chan-dong.html" title="[Khuyến mại] Xuân sang đổi mới – Thành công sẽ tới - Thiết bị trình chiếu">
                                                    [Khuyến mại] Xuân sang đổi mới – Thành công sẽ tới - Thiết bị trình chiếu									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-may-scan-chinh-hang-gia-cuc-tot-khuyen-mai-cuc-nhieu.html">
                                                <img src="https://phucanh.vn/includes/images/2453.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-may-scan-chinh-hang-gia-cuc-tot-khuyen-mai-cuc-nhieu.html" title="[Khuyến mại] Giảm giá tưng bừng - Đón mừng xuân sang">
                                                    [Khuyến mại] Giảm giá tưng bừng - Đón mừng xuân sang									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-pc-sieu-chat-gia-luon-tot-nhat.html">
                                                <img src="https://phucanh.vn/includes/images/2447.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-pc-sieu-chat-gia-luon-tot-nhat.html" title="[Khuyến mại] PC siêu chất - Chiến tất mọi game">
                                                    [Khuyến mại] PC siêu chất - Chiến tất mọi game									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-bo-luu-dien-sieu-chat-gia-luon-tot-nhat.html">
                                                <img src="https://phucanh.vn/includes/images/2459.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-bo-luu-dien-sieu-chat-gia-luon-tot-nhat.html" title="[Khuyến mại] Bộ lưu điện siêu chất - Giá luôn tốt nhất">
                                                    [Khuyến mại] Bộ lưu điện siêu chất - Giá luôn tốt nhất									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-bao-mat-thong-tin-cua-ban-cung-may-huy-tai-lieu.html">
                                                <img src="https://phucanh.vn/includes/images/2460.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-bao-mat-thong-tin-cua-ban-cung-may-huy-tai-lieu.html" title="[Khuyến Mại] Cùng khám phá và trải nghiệm máy hủy tài liệu tại NIIT-ICT Hà Nội">
                                                    [Khuyến Mại] Cùng khám phá và trải nghiệm máy hủy tài liệu tại NIIT-ICT Hà Nội									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-may-tinh-sunpac-su-lua-chon-so-1-cho-doanh-nghiep-qua-tang-toi-800000d.html">
                                                <img src="https://phucanh.vn/includes/images/2461.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-may-tinh-sunpac-su-lua-chon-so-1-cho-doanh-nghiep-qua-tang-toi-800000d.html" title="[Khuyến mãi] Máy tính đồng bộ Sunpac - Sự lựa chọn số 1 cho doanh nghiệp">
                                                    [Khuyến mãi] Máy tính đồng bộ Sunpac - Sự lựa chọn số 1 cho doanh nghiệp									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-may-chu-chinh-hang-hieu-suat-tot-dinh.html">
                                                <img src="https://phucanh.vn/includes/images/2462.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-may-chu-chinh-hang-hieu-suat-tot-dinh.html" title="[Khuyến mại] Máy chủ chính hãng - Dịch vụ tận tâm">
                                                    [Khuyến mại] Máy chủ chính hãng - Dịch vụ tận tâm									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-toc-do-cuc-nhanh-chien-game-cuc-da-giam-den-40.html">
                                                <img src="https://phucanh.vn/includes/images/2463.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-toc-do-cuc-nhanh-chien-game-cuc-da-giam-den-40.html" title="[Khuyến mại] Wifi Đỉnh Cao - Nâng Tầm Trải Nghiệm - Giảm Tới 35%">
                                                    [Khuyến mại] Wifi Đỉnh Cao - Nâng Tầm Trải Nghiệm - Giảm Tới 35%									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-giam-gia-man-hinh-gia-tot.html">
                                                <img src="https://phucanh.vn/includes/images/2464.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-giam-gia-man-hinh-gia-tot.html" title="[Khuyến mại] SALE CHẠM ĐÁY - CHỐT LIỀN TAY - MÀN HÌNH GIẢM ĐẾN 6 TRIỆU ĐỒNG">
                                                    [Khuyến mại] SALE CHẠM ĐÁY - CHỐT LIỀN TAY - MÀN HÌNH GIẢM ĐẾN 6 TRIỆU ĐỒNG									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-chot-don-tu-xa-giam-gia-that-da.html">
                                                <img src="https://phucanh.vn/includes/images/2465.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-chot-don-tu-xa-giam-gia-that-da.html" title="[Khuyến Mại] Laptop hàng hiệu - Ưu đãi tiền triệu">
                                                    [Khuyến Mại] Laptop hàng hiệu - Ưu đãi tiền triệu									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-sinh-nhat-thang-2-ngap-tran-uu-dai.html">
                                                <img src="https://phucanh.vn/includes/images/2466.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-sinh-nhat-thang-2-ngap-tran-uu-dai.html" title="[Khuyến Mại] Sale Sốc Cuối Năm - Sắm Ngay Laptop">
                                                    [Khuyến Mại] Sale Sốc Cuối Năm - Sắm Ngay Laptop									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/choi-game-dinh-rung-rinh-qua-khi-mua-laptop-gaming.html">
                                                <img src="https://phucanh.vn/includes/images/2467.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/choi-game-dinh-rung-rinh-qua-khi-mua-laptop-gaming.html" title="[Khuyến mại] Đại Tiệc Gaming - Nhận Quà Siêu Chất">
                                                    [Khuyến mại] Đại Tiệc Gaming - Nhận Quà Siêu Chất									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-tuan-le-vang-laptop-lenovo-thinkpad-cao-cap.html">
                                                <img src="https://phucanh.vn/includes/images/2468.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-tuan-le-vang-laptop-lenovo-thinkpad-cao-cap.html" title="[Khuyến Mại] Laptop xịn - Quà xịn">
                                                    [Khuyến Mại] Laptop xịn - Quà xịn									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-uu-dai-gia-hoi-len-doi-macbook-2022.html">
                                                <img src="https://phucanh.vn/includes/images/2469.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-uu-dai-gia-hoi-len-doi-macbook-2022.html" title="[Khuyến mại] Ưu đãi giá hời - Lên đời Macbook - Giảm giá đến 37%">
                                                    [Khuyến mại] Ưu đãi giá hời - Lên đời Macbook - Giảm giá đến 37%									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-tablet-muot-ma-gia-giam-soc-2022.html">
                                                <img src="https://phucanh.vn/includes/images/2470.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-tablet-muot-ma-gia-giam-soc-2022.html" title="[Khuyến mại] Máy tính bảng Ưu đãi lớn - Giá giảm đến 1.100.000Đ">
                                                    [Khuyến mại] Máy tính bảng Ưu đãi lớn - Giá giảm đến 1.100.000Đ									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-mua-workstation-nhan-uu-dai-khung-1.html">
                                                <img src="https://phucanh.vn/includes/images/2443.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-mua-workstation-nhan-uu-dai-khung-1.html" title="[Khuyến mãi] Workstation đồng bộ chính hãng | Ưu đãi lớn - Đón năm mới">
                                                    [Khuyến mãi] Workstation đồng bộ chính hãng | Ưu đãi lớn - Đón năm mới									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->
                                    </li><li class="PAC-list-km">
                                        <div class="pac-img-list-km">
                                            <a class="link_post" href="https://www.phucanh.vn/khuyen-mai-may-tinh-all-in-one-ngam-la-sam.html">
                                                <img src="https://phucanh.vn/includes/images/2441.jpg" alt="Xem chi tiết">
                                            </a>
                                        </div><!-- end div pac-img-list-km-->
                                        <div class="pac-caption">

                                            <h4>
                                                <a href="https://www.phucanh.vn/khuyen-mai-may-tinh-all-in-one-ngam-la-sam.html" title="[Khuyến Mãi] Máy tính ALL IN ONE làm việc thông minh - Hiệu năng tuyệt đỉnh - Chào mừng xuân sang - Giảm giá tưng bừng">
                                                    [Khuyến Mãi] Máy tính ALL IN ONE làm việc thông minh - Hiệu năng tuyệt đỉnh - Chào mừng xuân sang - Giảm giá tưng bừng									</a>
                                            </h4>
                                            <div class="pac-market_time">
                                                Từ: 01/01/2024 - Kết thúc: 31/01/2024								</div>
                                        </div><!-- end div pac-caption-->


                                    </li></ul>
                            </div> <!---end data-->
                            <div style="width: 1070px;height: 30px;overflow: hidden;"></div>
                        </div>
                        <div class="clear_fix"></div>
                        <div class="pagination">
                            <table cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                                <tbody>
                                <tr>
                                </tr>
                                </tbody>
                            </table>

                        </div> <!---end pagination-->
                    </div>
                </div>
            </div>
            <div class="clear_fix"></div>
            <div class="paging"></div>
        </div>
    </div>
@endsection
