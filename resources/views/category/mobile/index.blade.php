@extends('layouts.mobile.default')
@section('content')
    <div id="body_content"> <div class="page_path">
            <div class="page_nav productNav" id="NavChitietSP">
        <span xmlns:v="http://rdf.data-vocabulary.org/#">
            <span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/" title="Trang chủ" class="submenuhome123">Trang chủ </a></span>
            &nbsp;&nbsp;/&nbsp;&nbsp;
            <span typeof="v:Breadcrumb">
                <a rel="v:url" property="v:title" alt="Thiết bị mạng" title="Thiết bị mạng" href="/thiet-bi-mang">
                  <h1 style="font-size:12px;display:inline;">Thiết bị mạng</h1>
              </a>
            </span>
        </span>
            </div>
        </div>
        <ul class="cat-pro-list-container" style="margin-bottom:20px; overflow:hidden;">
            <li class="pac_nav_productlist">
                <a href="/thiet-bi-mang-khuyen-mai"><h2 style="font-size:13px;"> Thiết bị mạng khuyến mại</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/bo-phat-wifi"><h2 style="font-size:13px;"> Bộ phát wifi</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/bo-phat-wifi-di-dong-3g4g"><h2 style="font-size:13px;"> Bộ phát Wi-Fi 4G</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/bo-phat-wi-fi-cong-nghe-mesh"><h2 style="font-size:13px;"> Wi-Fi công nghệ Mesh</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/bo-mo-rong-song"><h2 style="font-size:13px;"> Bộ mở rộng sóng</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/card-mang"><h2 style="font-size:13px;"> Card mạng</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/thiet-bi-chia-mang-switch"><h2 style="font-size:13px;"> Thiết bị chia mạng (Switch)</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/thiet-bi-can-bang-tai"><h2 style="font-size:13px;"> Thiết bị cân bằng tải</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/tu-mang"><h2 style="font-size:13px;"> Tủ mạng</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/phu-kien-thiet-bi-mang"><h2 style="font-size:13px;"> Phụ kiện thiết bị mạng</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/bo-chuyen-doi-quang-dien"><h2 style="font-size:13px;"> Bộ chuyển đổi quang điện</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/thiet-bi-tuong-lua"><h2 style="font-size:13px;"> Thiết bị tường lửa (Firewall)</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/module-quang"><h2 style="font-size:13px;"> Module quang</h2>  </a>
            </li>
            <li class="pac_nav_productlist">
                <a href="/may-in-nhan"><h2 style="font-size:13px;"> Máy in nhãn</h2>  </a>
            </li>
        </ul>
        <div class="clear_fix"></div>
        <div class="product-filter-container" id="js-filter-container">
            <div class="filter-item filter-large-item">
                <a href="javascript:void(0)" class="item-title js-filter-title"><i class="fa fa-filter"></i> Bộ lọc</a>
                <div class="filter-sub filter-large">
                    <div class="filter-large-holder">
                        <a href="javascript:void(0)" class="filter-sub-close" onclick="closePopupLarge();"> Đóng <i class="fa fa-times"></i></a>
                        <div class="item" style="width: 100%">
                            <p class="title">Hãng</p>
                            <div class="filter-list">
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=asus" data-filter_code="brand" data-value="asus" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/asus.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=tp-link" data-filter_code="brand" data-value="tp-link" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/tplink.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=cisco" data-filter_code="brand" data-value="cisco" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/cisco.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=linksys" data-filter_code="brand" data-value="linksys" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/linksys.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=draytek" data-filter_code="brand" data-value="draytek" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/draytek.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=totolink" data-filter_code="brand" data-value="totolink" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/totolink.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=commscope-amp" data-filter_code="brand" data-value="commscope-amp" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/commscopeamp.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=ubiquiti" data-filter_code="brand" data-value="ubiquiti" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/ubiquiti.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=am-tako" data-filter_code="brand" data-value="am-tako" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/amtako.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=brother" data-filter_code="brand" data-value="brother" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/brother.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=dintek" data-filter_code="brand" data-value="dintek" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/dintek.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=hq-rack" data-filter_code="brand" data-value="hq-rack" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/hqrack.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=intel" data-filter_code="brand" data-value="intel" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/intel.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=orico" data-filter_code="brand" data-value="orico" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/orico.jpg" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=planet" data-filter_code="brand" data-value="planet" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/planet.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=sino" data-filter_code="brand" data-value="sino" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/sino.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=ugreen" data-filter_code="brand" data-value="ugreen" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/ugreen.jpg" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=vention" data-filter_code="brand" data-value="vention" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/vention.jpg" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=aruba" data-filter_code="brand" data-value="aruba" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/aruba.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=fortigate" data-filter_code="brand" data-value="fortigate" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/fortigate.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=grandstream" data-filter_code="brand" data-value="grandstream" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/grandstream.png" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=lention" data-filter_code="brand" data-value="lention" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/lention.jpg" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=mercusys" data-filter_code="brand" data-value="mercusys" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/0" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=unirack" data-filter_code="brand" data-value="unirack" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/0" alt="">
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=vcom" data-filter_code="brand" data-value="vcom" class="js-filter-item-2  has-image">
                                    <img src="https://phucanhcdn.com/media/brand/vcom.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <p class="title">Giá</p>
                            <div class="filter-list">
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=duoi-1trieu" data-filter_code="p" data-value="duoi-1trieu" class="js-filter-item-2 ">
                                    Dưới 1 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=1trieu-2trieu" data-filter_code="p" data-value="1trieu-2trieu" class="js-filter-item-2 ">
                                    1 triệu - 2 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=2trieu-3trieu" data-filter_code="p" data-value="2trieu-3trieu" class="js-filter-item-2 ">
                                    2 triệu - 3 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=3trieu-4trieu" data-filter_code="p" data-value="3trieu-4trieu" class="js-filter-item-2 ">
                                    3 triệu - 4 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=4trieu-5trieu" data-filter_code="p" data-value="4trieu-5trieu" class="js-filter-item-2 ">
                                    4 triệu - 5 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=5trieu-6trieu" data-filter_code="p" data-value="5trieu-6trieu" class="js-filter-item-2 ">
                                    5 triệu - 6 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=6trieu-7trieu" data-filter_code="p" data-value="6trieu-7trieu" class="js-filter-item-2 ">
                                    6 triệu - 7 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=7trieu-8trieu" data-filter_code="p" data-value="7trieu-8trieu" class="js-filter-item-2 ">
                                    7 triệu - 8 triệu
                                </a>
                                <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=tren-8trieu" data-filter_code="p" data-value="tren-8trieu" class="js-filter-item-2 ">
                                    Trên 8 triệu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="filter-btn-group">
                        <a href="javascript:;" onclick="BuildFilterUrl.clearFilter('')">Bỏ chọn</a>
                        <a class="js-open-url" href="/thiet-bi-mang">Xem <b class="js-show-total">496</b> kết quả</a>
                    </div>
                </div>
            </div>
            <div class="filter-box-group">
                <div class="filter-item">
                    <a href="javascript:void(0)" class="item-title js-filter-title"> Hãng <i class="fa fa-caret-down"></i> </a>
                    <div class="filter-sub">
                        <p class="title">Hãng</p>
                        <div class="filter-list">
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=asus" data-filter_code="brand" data-value="asus" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/asus.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=tp-link" data-filter_code="brand" data-value="tp-link" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/tplink.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=cisco" data-filter_code="brand" data-value="cisco" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/cisco.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=linksys" data-filter_code="brand" data-value="linksys" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/linksys.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=draytek" data-filter_code="brand" data-value="draytek" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/draytek.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=totolink" data-filter_code="brand" data-value="totolink" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/totolink.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=commscope-amp" data-filter_code="brand" data-value="commscope-amp" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/commscopeamp.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=ubiquiti" data-filter_code="brand" data-value="ubiquiti" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/ubiquiti.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=am-tako" data-filter_code="brand" data-value="am-tako" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/amtako.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=brother" data-filter_code="brand" data-value="brother" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/brother.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=dintek" data-filter_code="brand" data-value="dintek" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/dintek.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=hq-rack" data-filter_code="brand" data-value="hq-rack" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/hqrack.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=intel" data-filter_code="brand" data-value="intel" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/intel.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=orico" data-filter_code="brand" data-value="orico" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/orico.jpg" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=planet" data-filter_code="brand" data-value="planet" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/planet.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=sino" data-filter_code="brand" data-value="sino" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/sino.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=ugreen" data-filter_code="brand" data-value="ugreen" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/ugreen.jpg" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=vention" data-filter_code="brand" data-value="vention" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/vention.jpg" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=aruba" data-filter_code="brand" data-value="aruba" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/aruba.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=fortigate" data-filter_code="brand" data-value="fortigate" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/fortigate.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=grandstream" data-filter_code="brand" data-value="grandstream" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/grandstream.png" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=lention" data-filter_code="brand" data-value="lention" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/lention.jpg" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=mercusys" data-filter_code="brand" data-value="mercusys" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/0" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=unirack" data-filter_code="brand" data-value="unirack" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/0" alt="">
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?brand=vcom" data-filter_code="brand" data-value="vcom" class="js-filter-item-2  has-image">
                                <img src="https://phucanhcdn.com/media/brand/vcom.png" alt="">
                            </a>
                        </div>
                        <br>
                        <div class="filter-btn-group">
                            <a href="javascript:;" onclick="BuildFilterUrl.clearFilter.call(this, 'brand')">Bỏ chọn</a>
                            <a class="js-open-url" href="/thiet-bi-mang.html">Xem <b class="js-show-total">496</b> kết quả</a>
                        </div>
                    </div>
                </div>
                <div class="filter-item">
                    <a href="javascript:void(0)" class="item-title js-filter-title"> Giá <i class="fa fa-caret-down"></i> </a>
                    <div class="filter-sub">
                        <p class="title">Giá</p>
                        <div class="filter-list">
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=duoi-1trieu" data-filter_code="p" data-value="duoi-1trieu" class="js-filter-item-2 ">
                                Dưới 1 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=1trieu-2trieu" data-filter_code="p" data-value="1trieu-2trieu" class="js-filter-item-2 ">
                                1 triệu - 2 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=2trieu-3trieu" data-filter_code="p" data-value="2trieu-3trieu" class="js-filter-item-2 ">
                                2 triệu - 3 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=3trieu-4trieu" data-filter_code="p" data-value="3trieu-4trieu" class="js-filter-item-2 ">
                                3 triệu - 4 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=4trieu-5trieu" data-filter_code="p" data-value="4trieu-5trieu" class="js-filter-item-2 ">
                                4 triệu - 5 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=5trieu-6trieu" data-filter_code="p" data-value="5trieu-6trieu" class="js-filter-item-2 ">
                                5 triệu - 6 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=6trieu-7trieu" data-filter_code="p" data-value="6trieu-7trieu" class="js-filter-item-2 ">
                                6 triệu - 7 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=7trieu-8trieu" data-filter_code="p" data-value="7trieu-8trieu" class="js-filter-item-2 ">
                                7 triệu - 8 triệu
                            </a>
                            <a href="https://www.phucanh.vn/thiet-bi-mang.html?p=tren-8trieu" data-filter_code="p" data-value="tren-8trieu" class="js-filter-item-2 ">
                                Trên 8 triệu
                            </a>
                        </div>
                        <br>
                        <div class="filter-btn-group">
                            <a href="javascript:" onclick="BuildFilterUrl.clearFilter.call(this, 'p')">Bỏ chọn</a>
                            <a class="js-open-url" href="/thiet-bi-mang">Xem <b class="js-show-total">496</b> kết quả</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-popup" onclick="closePopupLarge();" style="position: fixed;inset: 0 0 0 0;background: rgba(0,0,0,0.4);z-index: 9999;display: none;"></div>
        <div class="product_list ">
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-tp-link-archer-c6-v2" title="Bộ phát wifi TP-Link Archer C6 V2 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 35 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_53937_bo_phat_wifi_tp_link_archer_c6_v2_4.jpg" title="Bộ phát wifi TP-Link Archer C6 V2 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 35 User)" alt="">
                    <span class="discount">-29%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-tp-link-archer-c6-v2" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi TP-Link Archer C6 V2 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 35 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               799.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>569.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cap-mang-bam-san-ugreen-11203-cat6-3-met" title="Cáp mạng bấm sẵn Ugreen 11203 Cat6 3 mét" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_33210-c--p-ma--ng-b----m-s----n-ugreen-11203-cat6-3-m--t-1-2.jpg" title="Cáp mạng bấm sẵn Ugreen 11203 Cat6 3 mét" alt="">
                    <span class="discount">-16%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cap-mang-bam-san-ugreen-11203-cat6-3-met" class="pro_name">
                        <h3 style="font-size:12px;">Cáp mạng bấm sẵn Ugreen 11203 Cat6 3 mét</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               65.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>55.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cap-mang-bam-san-ugreen-11202-cat6-2-met" title="Cáp mạng bấm sẵn Ugreen 11202 Cat6 2 mét" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_33209-nea-ugr-11202-1-1.jpg" title="Cáp mạng bấm sẵn Ugreen 11202 Cat6 2 mét" alt="">
                    <span class="discount">-38%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cap-mang-bam-san-ugreen-11202-cat6-2-met" class="pro_name">
                        <h3 style="font-size:12px;">Cáp mạng bấm sẵn Ugreen 11202 Cat6 2 mét</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               79.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>49.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax53u-mimo-ax1800mbps" title="Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_44679_rt_ax53u_4.jpg" title="Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)" alt="">
                    <span class="discount">-19%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax53u-mimo-ax1800mbps" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               1.390.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>1.139.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-khong-day-tp-link-archer-t2u-nano-ac600mbps" title="Cạc mạng không dây TP-Link USB Archer T2U Nano (Chuẩn AC/ AC600Mbps/ Ăng-ten ngầm)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_35867_t2u_nano.jpg" title="Cạc mạng không dây TP-Link USB Archer T2U Nano (Chuẩn AC/ AC600Mbps/ Ăng-ten ngầm)" alt="">
                    <span class="discount">-14%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-khong-day-tp-link-archer-t2u-nano-ac600mbps" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link USB Archer T2U Nano (Chuẩn AC/ AC600Mbps/ Ăng-ten ngầm)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               299.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>259.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax1800hp-mu-mimo-aimesh" title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_46807_rt_ax1800hp_4.jpg" title="Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)" alt="">
                    <span class="discount">-16%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax1800hp-mu-mimo-aimesh" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               1.599.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>1.350.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/thiet-bi-chia-mang-tp-link-ls1008g-gigabit" title="Switch TP-Link LS1008G (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Nhựa)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_41300_ls1008g_h1.jpg" title="Switch TP-Link LS1008G (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Nhựa)" alt="">
                    <span class="discount">-27%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/thiet-bi-chia-mang-tp-link-ls1008g-gigabit" class="pro_name">
                        <h3 style="font-size:12px;">Switch TP-Link LS1008G (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Nhựa)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               499.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>369.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cap-mang-bam-san-ugreen-11204-cat6-5-met" title="Cáp mạng bấm sẵn Ugreen 11204 Cat6 5 mét" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_33211-nea-ugr-11202-1-1.jpg" title="Cáp mạng bấm sẵn Ugreen 11204 Cat6 5 mét" alt="">
                    <span class="discount">-42%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cap-mang-bam-san-ugreen-11204-cat6-5-met" class="pro_name">
                        <h3 style="font-size:12px;">Cáp mạng bấm sẵn Ugreen 11204 Cat6 5 mét</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               129.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>75.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/thiet-bi-chia-mang-tp-link-tl-sg1008d" title="Switch TP-Link TL-SG1008D (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Nhựa)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_2456_thi____t_bi___chia_ma__ng_tp_link_tl_sg1008d_1.jpg" title="Switch TP-Link TL-SG1008D (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Nhựa)" alt="">
                    <span class="discount">-27%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/thiet-bi-chia-mang-tp-link-tl-sg1008d" class="pro_name">
                        <h3 style="font-size:12px;">Switch TP-Link TL-SG1008D (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Nhựa)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               599.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>439.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-tp-link-tl-wr841n-300mbps" title="Bộ phát wifi TP-Link TL-WR841N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_2411_12847_aa655b5272614e9a0d3b1817506f8230.jpg" title="Bộ phát wifi TP-Link TL-WR841N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)" alt="">
                    <span class="discount">-26%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-tp-link-tl-wr841n-300mbps" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi TP-Link TL-WR841N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               399.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>299.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-tp-link-archer-c54-ac1200mbps" title="Bộ phát wifi TP-Link Archer C54 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 25 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_40940_c54.jpg" title="Bộ phát wifi TP-Link Archer C54 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 25 User)" alt="">
                    <span class="discount">-29%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-tp-link-archer-c54-ac1200mbps" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi TP-Link Archer C54 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 25 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               599.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>429.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/thiet-bi-chia-mang-tp-link-tl-sf1008d" title="Switch TP-Link TL-SF1008D (10/100Mbps/ 8 Cổng/ Vỏ Nhựa)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_2426_thiet_bi_chia_mang_tp_link_tl_sf1008d_3.jpg" title="Switch TP-Link TL-SF1008D (10/100Mbps/ 8 Cổng/ Vỏ Nhựa)" alt="">
                    <span class="discount">-31%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/thiet-bi-chia-mang-tp-link-tl-sf1008d" class="pro_name">
                        <h3 style="font-size:12px;">Switch TP-Link TL-SF1008D (10/100Mbps/ 8 Cổng/ Vỏ Nhựa)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               259.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>179.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-tp-link-tl-wr820n-300mbps" title="Bộ phát wifi TP-Link TL-WR820N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_35101_tl_wr820n_ha1.jpg" title="Bộ phát wifi TP-Link TL-WR820N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)" alt="">
                    <span class="discount">-21%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-tp-link-tl-wr820n-300mbps" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi TP-Link TL-WR820N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               299.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>239.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-khong-day-tp-link-tl-wn725n" title="Cạc mạng không dây TP-Link USB TL-WN725N Nano (Chuẩn N/ 150Mbps/ Ăng-ten ngầm)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_11081_wn725n.jpg" title="Cạc mạng không dây TP-Link USB TL-WN725N Nano (Chuẩn N/ 150Mbps/ Ăng-ten ngầm)" alt="">
                    <span class="discount">-28%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-khong-day-tp-link-tl-wn725n" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link USB TL-WN725N Nano (Chuẩn N/ 150Mbps/ Ăng-ten ngầm)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               199.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>145.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-khong-day-tp-link-archer-t2u" title="Cạc mạng không dây TP-Link USB Archer T2U (Chuẩn AC/ AC600Mbps/ Ăng-ten ngầm)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_22785_t2u.jpg" title="Cạc mạng không dây TP-Link USB Archer T2U (Chuẩn AC/ AC600Mbps/ Ăng-ten ngầm)" alt="">
                    <span class="discount">-26%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-khong-day-tp-link-archer-t2u" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link USB Archer T2U (Chuẩn AC/ AC600Mbps/ Ăng-ten ngầm)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               359.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>269.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-tp-link-archer-c50-ac1200mbps" title="Bộ phát wifi TP-Link Archer C50 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 25 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_26368_c50.jpg" title="Bộ phát wifi TP-Link Archer C50 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 25 User)" alt="">
                    <span class="discount">-22%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-tp-link-archer-c50-ac1200mbps" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi TP-Link Archer C50 (Chuẩn AC/ AC1200Mbps/ 4 Ăng-ten ngoài/ 25 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               599.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>469.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-khong-day-tp-link-tl-wn823n" title="Cạc mạng không dây TP-Link USB TL-WN823N (Chuẩn N/ 300Mbps/ Ăng-ten ngầm)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_11082_wn823n.jpg" title="Cạc mạng không dây TP-Link USB TL-WN823N (Chuẩn N/ 300Mbps/ Ăng-ten ngầm)" alt="">
                    <span class="discount">-25%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-khong-day-tp-link-tl-wn823n" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link USB TL-WN823N (Chuẩn N/ 300Mbps/ Ăng-ten ngầm)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               259.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>195.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-khong-day-tp-link-tl-wn722n" title="Cạc mạng không dây TP-Link USB TL-WN722N (Chuẩn N/ 150Mbps/ 1 Ăng-ten ngoài)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_2369_wn722n.jpg" title="Cạc mạng không dây TP-Link USB TL-WN722N (Chuẩn N/ 150Mbps/ 1 Ăng-ten ngoài)" alt="">
                    <span class="discount">-28%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-khong-day-tp-link-tl-wn722n" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link USB TL-WN722N (Chuẩn N/ 150Mbps/ 1 Ăng-ten ngoài)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               259.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>189.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/thiet-bi-chia-mang-tp-link-ls1005g-gigabit" title="Switch TP-Link LS1005G (Gigabit (1000Mbps)/ 5 Cổng/ Vỏ Nhựa)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_41298_ls1005g_h1.jpg" title="Switch TP-Link LS1005G (Gigabit (1000Mbps)/ 5 Cổng/ Vỏ Nhựa)" alt="">
                    <span class="discount">-29%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/thiet-bi-chia-mang-tp-link-ls1005g-gigabit" class="pro_name">
                        <h3 style="font-size:12px;">Switch TP-Link LS1005G (Gigabit (1000Mbps)/ 5 Cổng/ Vỏ Nhựa)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               349.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>249.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-4g-tp-link-m7000-lte-10-user" title="Bộ phát wifi 4G TP-Link M7000 (4G LTE/ Ăng-ten ngầm/ Khe Sim 4G/ 10 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_47808_m7000.jpg" title="Bộ phát wifi 4G TP-Link M7000 (4G LTE/ Ăng-ten ngầm/ Khe Sim 4G/ 10 User)" alt="">
                    <span class="discount">-14%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-4g-tp-link-m7000-lte-10-user" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi 4G TP-Link M7000 (4G LTE/ Ăng-ten ngầm/ Khe Sim 4G/ 10 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               1.090.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>939.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/thiet-bi-chia-mang-tp-link-tl-sg1005d" title="Switch TP-Link TL-SG1005D (Gigabit (1000Mbps)/ 5 Cổng/ Vỏ Nhựa)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_34128_thi____t_bi___chia_ma__ng_tp_link_tl_sg1005d_1.jpg" title="Switch TP-Link TL-SG1005D (Gigabit (1000Mbps)/ 5 Cổng/ Vỏ Nhựa)" alt="">
                    <span class="discount">-23%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/thiet-bi-chia-mang-tp-link-tl-sg1005d" class="pro_name">
                        <h3 style="font-size:12px;">Switch TP-Link TL-SG1005D (Gigabit (1000Mbps)/ 5 Cổng/ Vỏ Nhựa)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               359.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>279.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-wifi-usb-tp-link-archer-t2u-plus-ac600mbps" title="Cạc mạng không dây TP-Link USB Archer T2U Plus (Chuẩn AC/ AC600Mbps/ Ăng-ten ngoài)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_39328_t2u_plus.jpg" title="Cạc mạng không dây TP-Link USB Archer T2U Plus (Chuẩn AC/ AC600Mbps/ Ăng-ten ngoài)" alt="">
                    <span class="discount">-16%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-wifi-usb-tp-link-archer-t2u-plus-ac600mbps" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link USB Archer T2U Plus (Chuẩn AC/ AC600Mbps/ Ăng-ten ngoài)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               329.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>279.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/tui-dau-mang-ugreen-rj45-cat-5-50246-100-chiec/tui" title="Túi đầu mạng Ugreen RJ45 Cat 5 50246 (100 chiếc/túi)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_43554_cat_5_50246_ha1.jpg" title="Túi đầu mạng Ugreen RJ45 Cat 5 50246 (100 chiếc/túi)" alt="">
                    <span class="discount">-33%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/tui-dau-mang-ugreen-rj45-cat-5-50246-100-chiec/tui" class="pro_name">
                        <h3 style="font-size:12px;">Túi đầu mạng Ugreen RJ45 Cat 5 50246 (100 chiếc/túi)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               399.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>270.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/san-pham/bo-phat-wifi-tp-link-tl-wr840n-wifi-300mbps" title="Bộ phát wifi TP-Link TL-WR840N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_14405_b____ph__t_wifi_tp_link_tl_wr840n_wifi_300mbps_1.jpg" title="Bộ phát wifi TP-Link TL-WR840N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)" alt="">
                    <span class="discount">-21%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/san-pham/bo-phat-wifi-tp-link-tl-wr840n-wifi-300mbps" class="pro_name">
                        <h3 style="font-size:12px;">Bộ phát wifi TP-Link TL-WR840N (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài/ 15 User)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               339.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>269.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cap-mang-bam-san-ugreen-11205-cat6-10-met" title="Cáp mạng bấm sẵn Ugreen 11205 Cat6 10 mét" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_33216-" title="Cáp mạng bấm sẵn Ugreen 11205 Cat6 10 mét" alt="">
                    <span class="discount">-24%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cap-mang-bam-san-ugreen-11205-cat6-10-met" class="pro_name">
                        <h3 style="font-size:12px;">Cáp mạng bấm sẵn Ugreen 11205 Cat6 10 mét</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               169.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>130.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-khong-day-tp-link-tl-wn881nd" title="Cạc mạng không dây TP-Link PCI-E TL-WN881ND (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_10986_wn881nd.jpg" title="Cạc mạng không dây TP-Link PCI-E TL-WN881ND (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài)" alt="">
                    <span class="discount">-29%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-khong-day-tp-link-tl-wn881nd" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link PCI-E TL-WN881ND (Chuẩn N/ 300Mbps/ 2 Ăng-ten ngoài)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               399.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>285.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-wifi-usb-tp-link-archer-t3u-plus-ac1300mbps" title="Cạc mạng không dây TP-Link USB Archer T3U Plus (Chuẩn AC/ AC1300Mbps/ Ăng-ten ngoài)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_40956_t3u_plus.jpg" title="Cạc mạng không dây TP-Link USB Archer T3U Plus (Chuẩn AC/ AC1300Mbps/ Ăng-ten ngoài)" alt="">
                    <span class="discount">-31%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-wifi-usb-tp-link-archer-t3u-plus-ac1300mbps" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng không dây TP-Link USB Archer T3U Plus (Chuẩn AC/ AC1300Mbps/ Ăng-ten ngoài)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               499.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>349.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/thiet-bi-chia-mang-tp-link-tl-sg108-gigabit-vo-kim-loai" title="Switch TP-Link TL-SG108 (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Thép)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_37861_thi____t_bi___chia_ma__ng_tp_link_tl_sg108_gigabit__v____kim_lo___i__1_1.png" title="Switch TP-Link TL-SG108 (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Thép)" alt="">
                    <span class="discount">-29%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/thiet-bi-chia-mang-tp-link-tl-sg108-gigabit-vo-kim-loai" class="pro_name">
                        <h3 style="font-size:12px;">Switch TP-Link TL-SG108 (Gigabit (1000Mbps)/ 8 Cổng/ Vỏ Thép)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               759.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>539.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/cac-mang-tp-link-tg-3468" title="Cạc mạng có dây TP-Link PCI-E TG-3468 (10/100/1000Mbps/ 1 Cổng)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_3703_tg3468.jpg" title="Cạc mạng có dây TP-Link PCI-E TG-3468 (10/100/1000Mbps/ 1 Cổng)" alt="">
                    <span class="discount">-24%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/cac-mang-tp-link-tg-3468" class="pro_name">
                        <h3 style="font-size:12px;">Cạc mạng có dây TP-Link PCI-E TG-3468 (10/100/1000Mbps/ 1 Cổng)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               259.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>199.000 ₫
          </span>
                </div>
            </div>
            <div class="pro_item ">
                <a href="/thiet-bi-chia-mang-tp-link-tl-sf1016d" title="Switch TP-Link TL-SF1016D (10/100Mbps/ 16 Cổng/ Vỏ Nhựa)" class="image">
                    <img src="https://phucanhcdn.com/media/product/250_2432_thiet_bi_chia_mang_tp_link_tl_sf1016d_4.jpg" title="Switch TP-Link TL-SF1016D (10/100Mbps/ 16 Cổng/ Vỏ Nhựa)" alt="">
                    <span class="discount">-19%</span>
                    <i class="icon-apple"></i>
                </a>
                <div class="pro_info">
                    <a href="/thiet-bi-chia-mang-tp-link-tl-sf1016d" class="pro_name">
                        <h3 style="font-size:12px;">Switch TP-Link TL-SF1016D (10/100Mbps/ 16 Cổng/ Vỏ Nhựa)</h3>
                    </a>
                    <span class="p-oldprice2">
              <i>Giá niêm yết: </i>
               559.000 ₫
          </span>
                    <span class="p-price2">
              <i>
                Giá bán:
              </i>455.000 ₫
          </span>
                </div>
            </div>
            <script>
                dataLayer.push = ({
                    'event' : 'view_search',
                    'remarketing_data' : {
                        'ecomm_prodid' : ['2432'],
                        'ecomm_pagetype' : 'searchresults'
                    }
                });
            </script>
        </div><!--product_list-->
        <div class="paging_mobile"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="pagingViewed">1</td><td class="pagingSpace"></td><td class="pagingIntact"><a href="/thiet-bi-mang.html?page=2">2</a></td><td class="pagingSpace"></td><td class="pagingIntact"><a href="/thiet-bi-mang.html?page=3">3</a></td><td class="pagingSpace"></td><td class="pagingIntact"><a href="/thiet-bi-mang.html?page=4">4</a></td><td class="pagingSpace"></td><td class="pagingIntact"><a href="/thiet-bi-mang.html?page=5">5</a></td><td class="pagingSpace"></td><td class="pagingIntact"><a href="/thiet-bi-mang.html?page=6">6</a></td><td class="pagingSpace"></td><td class="pagingIntact"><a href="/thiet-bi-mang.html?page=7">7</a></td><td class="pagingSpace"></td><td class="pagingIntact"><a title="Next" href="/thiet-bi-mang.html?page=2"> &gt;&gt; </a></td><td class="pagingSpace"></td></tr></tbody></table></div>
        <input type="hidden" id="view_page" value="2"> </div>
@endsection
