@extends('layouts.mobile.default')
@section('content')
    <div id="body_content"> <br>
        <h3>Cảm ơn quý khách đã đặt hàng</h3>
        <p>Đơn hàng của quý khách đã được gửi thành công. Bộ phận chăm sóc khách hàng của website sẽ liên hệ lại với quý khách thông qua đơn hàng để có hướng dẫn thêm. </p>
        <p>Cảm ơn quý khách !</p>
        <br>
        <!-- code tracking 19122019-->
        <script>
            dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
            dataLayer.push({
                event: "purchase",
                ecommerce: {
                    transaction_id: "125328",
                    value: 4399000,
                    tax: 0,
                    shipping: 0,
                    currency: "VND",
                    coupon: "",
                    items: [
                        {
                            item_id: "GHE.EDR.EGC230FRESHPLUS.BLACK",
                            item_name: "Ghế game E-Dra Fresh EGC230 Plus Black Grey",
                            affiliation: "E-Dra",
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
                            price: 4399000,
                            quantity: 1					  },
                    ]
                }
            });
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                'event': 'ectracking',
                'transactionId': '125328',
                'transactionTotal': 4399000,
                'transactionProducts': [
                ]
            });
        </script>

        <input id="id_order" type="hidden" rel="125328" value="125328" size="2">
        <script>
            $(document).ready(function(){

                id = 125328;

                $.ajax({
                    "url"   : "https://www.phucanh.vn/upload/apibitrix.php",
                    "type"  : "post",
                    "data"  : "id="+id,
                    "async" : "false",
                    success : function(result_val){

                    }
                });
            });
        </script> </div>
@endsection
