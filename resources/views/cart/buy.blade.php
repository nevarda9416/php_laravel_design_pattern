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
                    <span itemprop="title">Gửi đơn hàng</span>
                </a>
            </div>
        </div><!--breadcrumb-->
        <div class="clear"></div>
        <div id="bannerorder">
            Kính chào quý khách <b style="font-weight: 700;"></b>, <br><br>
            &nbsp;&nbsp; &nbsp;&nbsp; Công ty TNHH Kỹ nghệ NIIT-ICT Hà Nội vừa nhận được đơn đặt hàng của quý khách trên website <a href="{{url('/')}}">hanet.vn</a> <br>
            &nbsp;&nbsp; &nbsp;&nbsp;Đơn hàng này đang được xử lý. Trong vòng 30 phút (giờ làm việc), bộ phận bán hàng trực tuyến sẽ liên hệ lại Quý khách để xác nhận thời gian và địa điểm giao hàng. <br>
            &nbsp;&nbsp; &nbsp;&nbsp;Chúng tôi xác nhận lại thông tin đơn đặt hàng của Quý khách như sau:<br><br>
        </div>
        <div id="noidungorder" style="border: solid 1px #ddd;padding: 5px;">
            <h3 style="font-weight: 700;">Thông tin khách hàng</h3>
            <table>
                <tbody><tr>
                    <td>Tên khách hàng</td><td>Đào Tiến Tú</td>
                </tr>
                <tr>
                    <td>Địa chỉ email</td><td>daotu@gmail.com</td>
                </tr>
                <tr>
                    <td>Điện thoại liên hệ</td><td>0987654321</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td><td>Hai Bà Trưng, Hà Nội</td>
                </tr>
                <tr>
                    <td>Thông tin hóa đơn</td>
                    <td>
                        - Công ty: TNHH Niit-Ict Hà Nội <br>
                        - Địa chỉ: Trung Kính, Cầu Giấy, Hà Nội <br>
                        - Mã số thuế: 34251031
                    </td>
                </tr>
                </tbody></table>
            <h3 style="font-weight: 700;">Nội dung đặt hàng</h3>
            <table style="border-collapse: collapse;width: 100%;" border="1" bordercolor="#CCCCCC">
                <tbody><tr style="background-color:#365899;color:#FFF;font-weight:bold">
                    <td>STT</td>
                    <td>Sản phẩm</td>
                    <td>Đơn giá</td>
                    <td>Số lượng</td>
                    <td>Tổng tiền</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax1800hp-mu-mimo-aimesh.html"><b> Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)</b></a>
                    </td>
                    <td>1.350.000 <u>đ</u> </td>
                    <td>1</td>
                    <td>
                        1.350.000 <u>đ</u>
                    </td>
                </tr>
                <script>
                    dataLayer.push({
                        'event' : 'Event_RegisterOrTransaction',
                        'remarketing_data' : {
                            'ecomm_prodid' : '89361',
                            'ecomm_totalvalue' : 1350000
                        }
                    });
                    fbq('track', 'Purchase', {value: 1.099.000, currency: 'VND'});
                </script>
                <tr>
                    <td>2</td>
                    <td>
                        <a href="/san-pham/bo-phat-wifi-6-asus-rt-ax53u-mimo-ax1800mbps.html"><b> Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)</b></a>
                    </td>
                    <td>1.099.000 <u>đ</u> </td>
                    <td>1</td>
                    <td>
                        1.099.000 <u>đ</u>
                    </td>
                </tr>
                <script>
                    dataLayer.push({
                        'event' : 'Event_RegisterOrTransaction',
                        'remarketing_data' : {
                            'ecomm_prodid' : '89362',
                            'ecomm_totalvalue' : 2449000
                        }
                    });
                    fbq('track', 'Purchase', {value: 1.099.000, currency: 'VND'});
                </script>
                <tr class="txt_16">
                    <td class="txt0" colspan="4" align="right"> Tổng tiền </td>
                    <td class="txt_right"> 2.449.000 <u>đ</u> </td>
                </tr>
                </tbody></table>
            <br>
            <p>Khách hàng ghi chú: Giao hàng cuối tuần</p>
        </div>
        <div id="footerorder">
            <br> Một lần nữa, cám ơn quý khách đã mua sắm tại niitict.hn. Hi vọng chúng tôi đã mang lại cho quý khách những trải nghiệm mua sắm thật tuyệt vời.<br><br>
            Trân trọng,cảm ơn<br>
            <b style="font-weight: 700;">Đội ngũ bán hàng trực tuyến niitict.hn. </b><br><br>
            <img src="{{asset('/images/log_636686424391527334.png')}}">
        </div>
        <!-- code tracking 19122019-->
        <script>
            dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
            dataLayer.push({
                event: "purchase",
                ecommerce: {
                    transaction_id: "125066",
                    value: 2449000,
                    tax: 0,
                    shipping: 0,
                    currency: "VND",
                    coupon: "",
                    items: [
                        {
                            item_id: "ROW.ASU.RT-AX1800HP",
                            item_name: "Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)",
                            affiliation: "Asus",
                            coupon: "",
                            discount: 0,
                            index: 0,
                            item_brand: "",
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
                        },
                        {
                            item_id: "ROW.ASU.RT-AX53U",
                            item_name: "Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)",
                            affiliation: "Asus",
                            coupon: "",
                            discount: 0,
                            index: 0,
                            item_brand: "",
                            item_category: "",
                            item_category2: "",
                            item_category3: "",
                            item_category4: "",
                            item_category5: "",
                            item_list_id: "",
                            item_list_name: "",
                            item_variant: "",
                            location_id: "",
                            price: 1099000,
                            quantity: 1
                        },
                    ]
                }
            });
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                'event': 'ectracking',
                'transactionId': '125066',
                'transactionTotal': 2449000,
                'transactionProducts': [
                    {
                        'sku': 'ROW.ASU.RT-AX1800HP',
                        'name': 'Bộ phát wifi 6 Asus RT-AX1800HP MU-MIMO (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)',
                        'category': 'Bộ phát wifi',
                        'price': 1350000,
                        'quantity': 1
                    },
                    {
                        'sku': 'ROW.ASU.RT-AX53U',
                        'name': 'Bộ phát wifi 6 Asus RT-AX53U (Chuẩn AX/ AX1800Mbps/ 4 Ăng-ten ngoài/ Wifi Mesh/ 35 User)',
                        'category': 'Thiết bị mạng khuyến mại',
                        'price': 1099000,
                        'quantity': 1
                    },
                ]
            });
        </script>
    </div>
@endsection
