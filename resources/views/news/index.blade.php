@extends('layouts.default')
@section('content')
    <style>
        #main-menu ul {
            display: none
        }
        #main-menu:hover ul {
            display: block !important;
            top: 37px;
        }
    </style>
    <div class="container">
        <div id="breadcrumb">
            <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/" itemprop="url" class="nopad-l">
                    <span itemprop="title">Trang chủ</span>
                </a>
            </div>
            <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                &nbsp;/&nbsp;<a href="" itemprop="url">
                    <span itemprop="title"><h1 class="red">Tin tức</h1></span>
                </a>
            </div>
        </div><!--breadcrumb-->
        <div class="clear"></div>
        <div id="nav-news">
            <ul id="ul_news_menu" class="ul">

                <li class="news_tab_item"><a href="/tin-cong-nghe.html-1">Tin công nghệ</a>
                    <div class="sub">


                        <a href="/man-hinh-may-tinh.html-1">Màn hình máy tính</a>

                        <a href="/laptop-bai-viet.html">Laptop</a>

                        <a href="/linh-kien-bai-viet.html">Linh kiện</a>

                        <a href="/gaming-gear-bai-viet.html">Gaming Gear</a>

                        <a href="/mobile-va-tablet.html">Mobile và tablet</a>

                        <a href="/thiet-bi-van-phong-bai-viet.html">Thiết bị văn phòng</a>

                        <a href="/giai-phap-cho-doanh-nghiep-bai-viet.html">Giải pháp cho doanh nghiệp</a>

                        <a href="/camera-bai-viet.html">Camera</a>

                        <a href="/may-cham-cong-bai-viet.html">Máy chấm công</a>

                        <a href="/thiet-bi-ma-so-ma-vach-bai-viet.html">Thiết bị mã số mã vạch</a>


                    </div>
                </li>

                <li class="news_tab_item"><a href="/video-review-san-pham.html">Review</a>
                    <div class="sub">


                        <a href="/review-man-hinh-may-tinh.html">Review màn hình máy tính</a>

                        <a href="/review-laptop.html">Review laptop</a>

                        <a href="/review-camera.html">Review camera</a>

                        <a href="/review-linh-kien.html">Review linh kiện</a>

                        <a href="/review-gaming-gear.html">Review Gaming Gear</a>

                        <a href="/review-mobile-va-tablet.html">Review mobile và tablet</a>

                        <a href="/review-thiet-bi-van-phong.html">Review thiết bị văn phòng</a>

                        <a href="/review-giai-phap-cho-doanh-nghiep.html">Review giải pháp cho doanh nghiệp</a>


                    </div>
                </li>

                <li class="news_tab_item"><a href="/tin-khuyen-mai.html">Tin khuyến mại</a>
                    <div class="sub">


                        <a href="/khuyen-mai-sinh-vien.html">Khuyến mại sinh viên</a>

                        <a href="/khuyen-mai-doanh-nghiep.html">Khuyến mại doanh nghiệp</a>

                        <a href="/khuyen-mai-gaming.html">Khuyến mại Gaming</a>

                        <a href="/khuyen-mai-workstation.html">Khuyến mại Workstation</a>

                        <a href="/khuyen-mai-chung.html">Khuyến mại chung</a>


                    </div>
                </li>

                <li class="news_tab_item"><a href="/huong-dan-meo-vat.html">Tư vấn - Mẹo vặt</a>
                    <div class="sub">



                    </div>
                </li>

                <li class="news_tab_item"><a href="/tin-cong-ty.html">Tin công ty</a>
                    <div class="sub">



                    </div>
                </li>

                <li class="news_tab_item"><a href="/tin-tuyen-dung.html">Tin tuyển dụng</a>
                    <div class="sub">



                    </div>
                </li>

            </ul>
        </div><!--nav-news-->
        <div class="clear"></div>

        <div class="article-col-right">

            <a class="item-news-hot" href="/khuyen-mai-chinh-phuc-dinh-cao-rinh-ngay-steam-code.html" style="height: 234px;">
                <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002233_chinh_phuc_dinh_cao_rinh_ngay_steam_code.jpg" alt="[Khuyến Mại] Chinh Phục Đỉnh Cao - Rinh Ngay Steam Code"></div>
                <div class="info">
                    <b>[Khuyến Mại] Chinh Phục Đỉnh Cao - Rinh Ngay Steam Code</b>
                </div>
            </a><!--item-news-hot-->

            <a class="item-news-hot" href="/khuyen-mai-laptop-sale-khung-tet-rung-rinh-qua.html" style="height: 234px;">
                <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002229_laptop_sale_khung_tet_rung_rinh_qua.jpg" alt="[Khuyến Mại] Laptop Sale Khủng - Tết Rủng Rỉnh Quà"></div>
                <div class="info">
                    <b>[Khuyến Mại] Laptop Sale Khủng - Tết Rủng Rỉnh Quà</b>
                </div>
            </a><!--item-news-hot-->

        </div><!--article-col-right-->

        <div class="article-col-main">

            <a class="item-news-hot" href="{{url('tin-tuc/khuyen-mai-hang-xin-xa-kho-sale-to-don-tet.html')}}">
                <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002254_hang_xin_xa_kho_sale_to_don_tet.jpg" alt="[Khuyến Mại] Hàng Xịn Xả Kho - Sale To Đón Tết"></div>
                <div class="info">
                    <b>[Khuyến Mại] Hàng Xịn Xả Kho - Sale To Đón Tết</b>
                    <span class="time"> 29-01-2024, 10:43 am </span>
                    <span class="summary">Chỉ từ 39K quý khách hàng có thể sở hữu các sản phẩm công nghệ chính hãng, chất lượng từ ngày 27/01 - 07/02 tại các cơ sở của NIIT-ICT Hà Nội</span>
                </div>
            </a><!--item-news-hot-->

        </div><!--article-col-main-->

        <div class="space10"></div>

        <div class="article-col-right">
            <div class="block-news">
                <div class="title-block-news"><p class="h-title"><span>Tin mới nhất</span></p></div>
                <div class="list-news">
                    <a href="/khuyen-mai-hang-xin-xa-kho-sale-to-don-tet.html" class="item first" style="margin-bottom:15px;">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002254_hang_xin_xa_kho_sale_to_don_tet.jpg" alt="[Khuyến Mại] Hàng Xịn Xả Kho - Sale To Đón Tết"></div>
                        </div>
                        <div class="info">
                            <b class="name">[Khuyến Mại] Hàng Xịn Xả Kho - Sale To Đón Tết</b>
                            <span class="time">29-01-2024, 10:43 am</span>
                            <span class="summary">Chỉ từ 39K quý khách hàng có thể sở hữu các sản phẩm công nghệ chính hãng, chất lượng từ ngày 27/01 - 07/02 tại các cơ sở của NIIT-ICT Hà Nội</span>
                        </div>
                    </a>

                    <a href="/khuyen-mai-chinh-phuc-dinh-cao-rinh-ngay-steam-code.html" class="item">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002233_chinh_phuc_dinh_cao_rinh_ngay_steam_code.jpg" alt="[Khuyến Mại] Chinh Phục Đỉnh Cao - Rinh Ngay Steam Code"></div>
                        </div>
                        <div class="info">
                            <b class="name">[Khuyến Mại] Chinh Phục Đỉnh Cao - Rinh Ngay Steam Code</b>
                            <span class="time">23-01-2024, 2:28 pm</span>
                        </div>
                    </a>
                    <a href="/khuyen-mai-laptop-sale-khung-tet-rung-rinh-qua.html" class="item">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002229_laptop_sale_khung_tet_rung_rinh_qua.jpg" alt="[Khuyến Mại] Laptop Sale Khủng - Tết Rủng Rỉnh Quà"></div>
                        </div>
                        <div class="info">
                            <b class="name">[Khuyến Mại] Laptop Sale Khủng - Tết Rủng Rỉnh Quà</b>
                            <span class="time">23-01-2024, 10:28 am</span>
                        </div>
                    </a>
                    <a href="/khuyen-mai-sam-hp-ngay-qua-tet-lien-tay.html" class="item">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002227_sam_hp_ngay_qua_tet_lien_tay.jpg" alt="[Khuyến Mại] Sắm HP ngay - Quà Tết liền tay"></div>
                        </div>
                        <div class="info">
                            <b class="name">[Khuyến Mại] Sắm HP ngay - Quà Tết liền tay</b>
                            <span class="time">23-01-2024, 9:09 am</span>
                        </div>
                    </a>

                </div><!--list-news-->
            </div><!--block-news-->

            <div class="space10"></div>
            <div class="block-news">
                <div class="title-block-news"><p class="h-title"><span>Bài viết nhiều người xem</span></p></div>
                <div class="list-news most-view">
                    <a href="/khuyen-mai-hang-xin-xa-kho-sale-to-don-tet.html" class="item">
                        <b class="name">[Khuyến Mại] Hàng Xịn Xả Kho - Sale To Đón Tết</b>
                        <span class="time">29-01-2024, 10:43 am</span>
                    </a>
                    <a href="/khuyen-mai-chinh-phuc-dinh-cao-rinh-ngay-steam-code.html" class="item">
                        <b class="name">[Khuyến Mại] Chinh Phục Đỉnh Cao - Rinh Ngay Steam Code</b>
                        <span class="time">23-01-2024, 2:28 pm</span>
                    </a>
                    <a href="/khuyen-mai-laptop-sale-khung-tet-rung-rinh-qua.html" class="item">
                        <b class="name">[Khuyến Mại] Laptop Sale Khủng - Tết Rủng Rỉnh Quà</b>
                        <span class="time">23-01-2024, 10:28 am</span>
                    </a>
                    <a href="/khuyen-mai-sam-hp-ngay-qua-tet-lien-tay.html" class="item">
                        <b class="name">[Khuyến Mại] Sắm HP ngay - Quà Tết liền tay</b>
                        <span class="time">23-01-2024, 9:09 am</span>
                    </a>
                    <a href="/khuyen-mai-mua-rog-strix-scar-16-18-nhan-combo-qua-tang-doc-quyen.html" class="item">
                        <b class="name">[Khuyến Mại] Mua ROG Strix SCAR 16/18 - Nhận combo quà tặng độc quyền</b>
                        <span class="time">16-01-2024, 1:38 pm</span>
                    </a>
                </div><!--list-news-->
            </div><!--block-news-->

            <!--  <div class="box-left"><h3 class="title-left h-title" style="font-weight:bold; text-transform:uppercase;">Sản phẩm bán chạy nhất</h3></div>
              <div class="pro-left">
                <ul class="ul" id="collection-bestsale"></ul>
              </div><!--pro-left-->

        </div><!--article-col-right-->


        <div class="article-col-main">

            <div class="block-news">
                <div class="title-block-news"><a href="/tin-cong-nghe.html-1"><h2 class="h-title"><span>Tin công nghệ</span></h2></a></div>
                <div class="list-news home">


                    <a href="/vi-sao-may-tinh-cua-ban-van-tieu-thu-dien-ngay-ca-khi-da-shutdown-hoac-hibernate.html" class="item first">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002252_vi_sao_may_tinh_cua_ban_van_tieu_thu_dien.jpg" alt="Vì sao máy tính của bạn vẫn tiêu thụ điện ngay cả khi đã Shutdown hoặc Hibernate"></div>
                        </div>
                        <div class="info">
                            <h3 class="name">Vì sao máy tính của bạn vẫn tiêu thụ điện ngay cả khi đã Shutdown hoặc Hibernate</h3>
                            <span class="time">26-01-2024, 5:20 pm</span>

                        </div>
                    </a>




















                    <div class="list-right">




                        <a href="/samsung-gioi-thieu-ssd-990-evo-voi-giao-dien-pcie-5.0-x2.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002240_samsung_gioi_thieu_ssd_990_evo_voi_giao_dien_pcie_50_x2_1.jpg" alt="Samsung giới thiệu SSD 990 EVO với giao diện PCIe 5.0 x2"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">Samsung giới thiệu SSD 990 EVO với giao diện PCIe 5.0 x2</h3>
                                <span class="time">24-01-2024, 8:11 am</span>
                            </div>
                        </a>



                        <a href="/tin-tuc-cooler-master-gioi-thieu-bo-nguon-pc-moi-mang-ten-v-platinum-v2.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002238_cooler_masster_v_platinum_v2.jpg" alt="[Tin Tức] Cooler Master giới thiệu bộ nguồn PC mới mang tên V Platinum V2"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Tin Tức] Cooler Master giới thiệu bộ nguồn PC mới mang tên V Platinum V2</h3>
                                <span class="time">23-01-2024, 5:07 pm</span>
                            </div>
                        </a>



                        <a href="/msi-gioi-thieu-loat-laptop-moi-ho-tro-ai-tai-ces-2024.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002171_msi_gioi_thieu_loat_laptop_moi_ho_tro_ai_tai_ces_2024.jpg" alt="MSI giới thiệu loạt laptop mới hỗ trợ AI tại CES 2024"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">MSI giới thiệu loạt laptop mới hỗ trợ AI tại CES 2024</h3>
                                <span class="time">11-01-2024, 5:06 pm</span>
                            </div>
                        </a>














                    </div>
                </div>
            </div>

            <div class="block-news">
                <div class="title-block-news"><a href="/video-review-san-pham.html"><h2 class="h-title"><span>Review</span></h2></a></div>
                <div class="list-news home">


                    <a href="/review-noi-tiep-series-ngon-bo-re-cung-pcpa-g20-va-combo-ryzen-5-5500-gtx-1660-super.html" class="item first">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002251_pcpa_g20_pc_chi___n_game_si__u_r____4.jpg" alt="[Review] Nối tiếp Series Ngon Bổ Rẻ cùng PCPA G20 và Combo Ryzen 5 5500 + GTX 1660 Super"></div>
                        </div>
                        <div class="info">
                            <h3 class="name">[Review] Nối tiếp Series Ngon Bổ Rẻ cùng PCPA G20 và Combo Ryzen 5 5500 + GTX 1660 Super</h3>
                            <span class="time">26-01-2024, 4:30 pm</span>

                        </div>
                    </a>




















                    <div class="list-right">




                        <a href="/danh-gia-viewsonic-vx2780-2k-shdj-man-hinh-do-hoa-2k-gia-chi-5-trieu.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002241_mhhhviewsonic_vx2780_2k_shdj_min.jpg" alt="[Đánh giá] ViewSonic VX2780-2K-SHDJ - Màn hình đồ họa 2K giá chỉ 5 triệu"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Đánh giá] ViewSonic VX2780-2K-SHDJ - Màn hình đồ họa 2K giá chỉ 5 triệu</h3>
                                <span class="time">24-01-2024, 10:03 am</span>
                            </div>
                        </a>



                        <a href="/trai-nghiem-ios-17.3-chinh-thuc-trom-cung-khoc-thet-cap-nhat-ngay-thoi.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002234_trai_nghiem_ios_17_3.jpeg" alt="[Trải nghiệm] iOS 17.3 chính thức: trộm cũng khóc thét, cập nhật ngay thôi!"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Trải nghiệm] iOS 17.3 chính thức: trộm cũng khóc thét, cập nhật ngay thôi!</h3>
                                <span class="time">23-01-2024, 2:55 pm</span>
                            </div>
                        </a>



                        <a href="/tren-tay-asus-zenbook-14-oled-ux3405ma-laptop-ai-tich-hop-cpu-core-ultra-dau-tien-tren-the-gioi..html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002224_tren_tay_asus_zenbook_14_oled_ux3405ma_3.jpeg" alt="[Trên Tay] Asus Zenbook 14 OLED UX3405MA | Laptop AI tích hợp CPU Core Ultra đầu tiên trên thế giới"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Trên Tay] Asus Zenbook 14 OLED UX3405MA | Laptop AI tích hợp CPU Core Ultra đầu tiên trên thế giới</h3>
                                <span class="time">22-01-2024, 11:41 am</span>
                            </div>
                        </a>














                    </div>
                </div>
            </div>

            <div class="block-news">
                <div class="title-block-news"><a href="/tin-khuyen-mai.html"><h2 class="h-title"><span>Tin khuyến mại</span></h2></a></div>
                <div class="list-news home">


                    <a href="/khuyen-mai-hang-xin-xa-kho-sale-to-don-tet.html" class="item first">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002254_hang_xin_xa_kho_sale_to_don_tet.jpg" alt="[Khuyến Mại] Hàng Xịn Xả Kho - Sale To Đón Tết"></div>
                        </div>
                        <div class="info">
                            <h3 class="name">[Khuyến Mại] Hàng Xịn Xả Kho - Sale To Đón Tết</h3>
                            <span class="time">29-01-2024, 10:43 am</span>

                        </div>
                    </a>




















                    <div class="list-right">




                        <a href="/khuyen-mai-chinh-phuc-dinh-cao-rinh-ngay-steam-code.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002233_chinh_phuc_dinh_cao_rinh_ngay_steam_code.jpg" alt="[Khuyến Mại] Chinh Phục Đỉnh Cao - Rinh Ngay Steam Code"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Khuyến Mại] Chinh Phục Đỉnh Cao - Rinh Ngay Steam Code</h3>
                                <span class="time">23-01-2024, 2:28 pm</span>
                            </div>
                        </a>



                        <a href="/khuyen-mai-laptop-sale-khung-tet-rung-rinh-qua.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002229_laptop_sale_khung_tet_rung_rinh_qua.jpg" alt="[Khuyến Mại] Laptop Sale Khủng - Tết Rủng Rỉnh Quà"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Khuyến Mại] Laptop Sale Khủng - Tết Rủng Rỉnh Quà</h3>
                                <span class="time">23-01-2024, 10:28 am</span>
                            </div>
                        </a>



                        <a href="/khuyen-mai-sam-hp-ngay-qua-tet-lien-tay.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002227_sam_hp_ngay_qua_tet_lien_tay.jpg" alt="[Khuyến Mại] Sắm HP ngay - Quà Tết liền tay"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Khuyến Mại] Sắm HP ngay - Quà Tết liền tay</h3>
                                <span class="time">23-01-2024, 9:09 am</span>
                            </div>
                        </a>














                    </div>
                </div>
            </div>

            <div class="block-news">
                <div class="title-block-news"><a href="/huong-dan-meo-vat.html"><h2 class="h-title"><span>Tư vấn - Mẹo vặt</span></h2></a></div>
                <div class="list-news home">


                    <a href="/cach-xoa-du-lieu-he-thong-luu-tru-khac-tren-iphone.html" class="item first">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/1000002262_xoa_dung_luong_bo_nho_khac_iphone_1.jpg" alt="Cách xóa dữ liệu hệ thống/lưu trữ " khác"="" trên="" iphone"=""></div>
                        </div>
                        <div class="info">
                            <h3 class="name">Cách xóa dữ liệu hệ thống/lưu trữ "Khác" trên iPhone</h3>
                            <span class="time">Hôm nay, 4:19 pm</span>

                        </div>
                    </a>




















                    <div class="list-right">




                        <a href="/tin-tuc-cac-tinh-nang-ai-tren-galaxy-s24-tai-trung-quoc-duoc-cho-la-da-loai-bo-google-de-chuyen-sang-baidu.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002260_samsung_galaxy_s24_tai_trung_quoc_1.jpg" alt="[Tin Tức] Các tính năng AI trên Galaxy S24 tại Trung Quốc có thể đã loại bỏ Google để chuyển sang Baidu"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">[Tin Tức] Các tính năng AI trên Galaxy S24 tại Trung Quốc có thể đã loại bỏ Google để chuyển sang Baidu</h3>
                                <span class="time">Hôm nay, 2:13 pm</span>
                            </div>
                        </a>



                        <a href="/cach-dao-nguoc-tim-kiem-hinh-anh-tren-android-hoac-iphone.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002258_tim_kiem_h__nh_anh_nguoc.jpg" alt="Cách đảo ngược tìm kiếm hình ảnh trên Android hoặc iPhone"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">Cách đảo ngược tìm kiếm hình ảnh trên Android hoặc iPhone</h3>
                                <span class="time">29-01-2024, 5:33 pm</span>
                            </div>
                        </a>



                        <a href="/cach-su-dung-bo-loc-anh-sang-xanh-tren-pc-hoac-mac-cua-ban.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000002253_bo_loc_anh_sang_xanh_1.jpg" alt="Cách sử dụng bộ lọc ánh sáng xanh trên PC hoặc Mac của bạn"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">Cách sử dụng bộ lọc ánh sáng xanh trên PC hoặc Mac của bạn</h3>
                                <span class="time">27-01-2024, 12:06 pm</span>
                            </div>
                        </a>














                    </div>
                </div>
            </div>

            <div class="block-news">
                <div class="title-block-news"><a href="/tin-cong-ty.html"><h2 class="h-title"><span>Tin công ty</span></h2></a></div>
                <div class="list-news home">


                    <a href="/tuyen-dung-phuc-anh.html" class="item first">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/7618_anh_tuyen_dung.jpg" alt="NIIT-ICT Hà Nội TUYỂN DỤNG"></div>
                        </div>
                        <div class="info">
                            <h3 class="name">NIIT-ICT Hà Nội TUYỂN DỤNG</h3>
                            <span class="time">01-11-2023, 8:00 am </span>

                        </div>
                    </a>




















                    <div class="list-right">




                        <a href="/thong-bao-lich-phuc-vu-xuyen-le-gio-to-hung-vuong-va-30-4-1-5.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000000978_thong_bao_nghi_le_30.jpg" alt="THÔNG BÁO LỊCH PHỤC VỤ XUYÊN LỄ GIỖ TỔ HÙNG VƯƠNG VÀ 30/4 - 1/5"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">THÔNG BÁO LỊCH PHỤC VỤ XUYÊN LỄ GIỖ TỔ HÙNG VƯƠNG VÀ 30/4 - 1/5</h3>
                                <span class="time">24-04-2023, 2:07 pm</span>
                            </div>
                        </a>



                        <a href="/thong-bao-lich-nghi-tet-nguyen-quy-mao-2023.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_1000000532_thong_bao_nghi_tet.jpg" alt="THÔNG BÁO LỊCH NGHỈ TẾT NGUYÊN ĐÁN QUÝ MÃO 2023"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">THÔNG BÁO LỊCH NGHỈ TẾT NGUYÊN ĐÁN QUÝ MÃO 2023</h3>
                                <span class="time">11-01-2023, 1:14 pm</span>
                            </div>
                        </a>



                        <a href="/tuyen-nhan-vien-kinh-doanh-phan-phoi.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_8118_atto_visa_kinh_doanh_tai_nhat_1.jpg" alt="TUYỂN DỤNG NHÂN VIÊN KINH DOANH PHÂN PHỐI - NGÀNH HÀNG CNTT"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">TUYỂN DỤNG NHÂN VIÊN KINH DOANH PHÂN PHỐI - NGÀNH HÀNG CNTT</h3>
                                <span class="time">27-09-2023, 11:00 am </span>
                            </div>
                        </a>














                    </div>
                </div>
            </div>

            <div class="block-news">
                <div class="title-block-news"><a href="/tin-tuyen-dung.html"><h2 class="h-title"><span>Tin tuyển dụng</span></h2></a></div>
                <div class="list-news home">


                    <a href="/tuyen-dung-phuc-anh.html" class="item first">
                        <div class="img-side">
                            <div class="img-container"><img src="https://phucanhcdn.com/media/news/7618_anh_tuyen_dung.jpg" alt="NIIT-ICT Hà Nội TUYỂN DỤNG"></div>
                        </div>
                        <div class="info">
                            <h3 class="name">NIIT-ICT Hà Nội TUYỂN DỤNG</h3>
                            <span class="time">01-11-2023, 8:00 am </span>

                        </div>
                    </a>




















                    <div class="list-right">




                        <a href="/tuyen-nhan-vien-cham-soc-khach-hang.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_8277_7618_anh_tuyen_dung.jpg" alt="TUYỂN NHÂN VIÊN&nbsp;CHĂM SÓC KHÁCH HÀNG"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">TUYỂN NHÂN VIÊN&nbsp;CHĂM SÓC KHÁCH HÀNG</h3>
                                <span class="time">09-01-2024, 9:30 am </span>
                            </div>
                        </a>



                        <a href="/tuyen-nhan-vien-ke-toan-kiem-ban-hang.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_7585_1201_img_8570.jpg" alt="TUYỂN NHÂN VIÊN KẾ TOÁN KIÊM BÁN HÀNG"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">TUYỂN NHÂN VIÊN KẾ TOÁN KIÊM BÁN HÀNG</h3>
                                <span class="time">05-08-2022, 10:00 am </span>
                            </div>
                        </a>



                        <a href="/tuyen-nhan-vien-kinh-doanh-phan-phoi.html" class="item">
                            <div class="img-side">
                                <div class="img-container"><img src="https://phucanhcdn.com/media/news/120_8118_atto_visa_kinh_doanh_tai_nhat_1.jpg" alt="TUYỂN DỤNG NHÂN VIÊN KINH DOANH PHÂN PHỐI - NGÀNH HÀNG CNTT"></div>
                            </div>
                            <div class="info">
                                <h3 class="name">TUYỂN DỤNG NHÂN VIÊN KINH DOANH PHÂN PHỐI - NGÀNH HÀNG CNTT</h3>
                                <span class="time">27-09-2023, 11:00 am </span>
                            </div>
                        </a>














                    </div>
                </div>
            </div>

        </div><!--article-col-main-->


        <div class="clear"></div>
    </div>
@endsection
