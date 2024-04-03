var d = new Date();
d.setTime(d.getTime() + 86400000);
var expires = "expires=" + d.toUTCString();
var totalClick = 0;
var cId = 0;
(function ($) {
    $(document ).ready(function() {
        $('#select-loyatyl').select2({
            minimumResultsForSearch: -1
        }).on('change', function (e) {
            var pointC = this.value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/cart-point',
                data: {point: pointC},
                success: function (response) {
                    window.location.href = '/thong-tin'
                }
            });
        });
        $('.back-to-top').click();
        $('.box-select-subject').select2({
            minimumResultsForSearch: -1
        });

        if (window.location.pathname.indexOf('hoan-tat') >= 0) {
            if ($('#shopping-total-price').length > 0) {
                $('#shopping-info-total-price').html($('#shopping-total-price').html());
            }
        }
        getShoppingCart();
        $('.select2-select').select2({
            maximumInputLength: 20
        });

        if ($('#body-highlight-product').length > 0) {
            highlightProduct();
        }

        if ($('#post-related').length > 0) {
            highlightPost();
        }

        $("#discount_code").keypress(function (e) {
            if (e.keyCode == 13) {
                $('#apply_discount_code').click();
            }
        });

        $(document).on("click", "#apply_discount_code", function(e) {
            e.preventDefault();
            $('#apply_discount_code_error').hide();
            var discountCode = $("#discount_code").val();
            if(discountCode != '') {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                if ($('input[name="shipping_fee"]').length > 0) {
                    var dataPost = {
                        _token: CSRF_TOKEN,
                        discount_code: discountCode,
                        current_url: window.location.href,
                        shipping_fee: $('input[name="shipping_fee"]').val(),
                    }
                } else {
                    var dataPost = {
                        _token: CSRF_TOKEN,
                        discount_code: discountCode,
                        current_url: window.location.href,
                        shipping_fee: 0,
                    }
                }
                $.ajax({
                    type: 'POST',
                    url: '/giam-gia',
                    data: dataPost,
                    dataType: 'JSON',
                    success: function (response) {
                        if(response.status == 200) {
                            if($('#content-box-receipt').length > 0) {
                                $('#content-box-receipt').html(response.html);
                            } else {
                                $('#shipping-cart-list-promotion-apply').html(response.html);
                            }
                            $('#promotion-code-modal-body').html(response.promotionHtml);
                            $("#discount_code").val('');
                            $('#promotionCodeModal').modal('hide');
                        } else {
                            $('#apply_discount_code_error .error').html('Mã khuyến mại ' + discountCode + ' không có hiệu lực!');
                            $('#apply_discount_code_error').show();
                        }
                    }
                });
            }
        });

        $(document).on("click", ".shopping-cart-delete-coupon",function() {
            var coupon = $(this).attr('data-coupon');
            if(coupon != '') {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '/delete-coupon',
                    data: {
                        _token: CSRF_TOKEN,
                        discount_code: coupon,
                        current_url: window.location.href,
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        if(response.status == 200) {
                            $('#shipping-cart-list-promotion-apply').html(response.html);
                            $('#promotion-code-modal-body').html(response.promotionHtml);
                        }
                    }
                });
            }
        });

        $(document).on("click", "#promotion_check_out",function() {
            var promotionId = parseInt($('input[name="promotion_check_out"]:checked').val());
            if(promotionId > 0) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                if ($('input[name="shipping_fee"]').length > 0) {
                    var dataPost = {
                        _token: CSRF_TOKEN,
                        promotion_id: promotionId,
                        current_url: window.location.href,
                        shipping_fee: $('input[name="shipping_fee"]').val(),
                    }
                } else {
                    var dataPost = {
                        _token: CSRF_TOKEN,
                        promotion_id: promotionId,
                        current_url: window.location.href,
                        shipping_fee: 0,
                    }
                }
                $.ajax({
                    type: 'POST',
                    url: '/apply-promotion',
                    data: dataPost,
                    dataType: 'JSON',
                    success: function (response) {
                        if(response.status == 200) {
                            if($('#content-box-receipt').length > 0) {
                                $('#content-box-receipt').html(response.html);
                            } else {
                                $('#shipping-cart-list-promotion-apply').html(response.html);
                            }

                            $('#promotion-code-modal-body').html(response.promotionHtml);
                            $('#promotionCodeModal').modal('hide');
                        }
                    }
                });
            } else {
                $('#promotionCodeModal').modal('hide');
            }
        });

        // Second, get list districts by province id
        $("#province_id_delivery").change(function () {
            $.ajax({
                type: 'GET',
                url: '/location/district/' + $(this).val(),
                dataType: 'json',
                success: function (response) {
                    $("#district_id_delivery").html('<option value="">Chọn Quận/Huyện</option>');
                    $("#district_id_delivery").removeAttr('disabled');
                    $('input[name="province_name_delivery"]').val($("#province_id_delivery option:selected").text());
                    var data = response.data;
                    for (var i=0;i<data.length;i++) {
                        $("#district_id_delivery").append('<option value="'+data[i]['districtCode']+'">'+data[i]['districtName']+'</option>');
                    }

                    $('#district_id_delivery').select2({
                        maximumInputLength: 20
                    });

                }
            });
        });

        // Third, get list sub districts by district id
        $("#district_id_delivery").change(function () {
            $.ajax({
                type: 'GET',
                url: '/location/subdistrict/' + $(this).val(),
                dataType: 'json',
                success: function (result, status, xhr) {
                    $("#sub_district_id_delivery").html('<option value="">Chọn Phường/Xã</option>');
                    $("#sub_district_id_delivery").removeAttr('disabled');
                    $('input[name="district_name_delivery"]').val($("#district_id_delivery option:selected").text());
                    var data=result.data;
                    for (var i=0;i<data.length;i++) {
                        $("#sub_district_id_delivery").append('<option value="'+data[i]['subDistrictCode']+'">'+data[i]['subDistrictName']+'</option>');
                    }

                    $('#sub_district_id_delivery').select2({
                        maximumInputLength: 20
                    });
                }
            });
        });

        $("#sub_district_id_delivery").change(function () {
            $('input[name="sub_district_name_delivery"]').val($("#sub_district_id_delivery option:selected").text());
        });

        $('#submit-shipping-address').click(function () {
            var formA = $('#frm_add_delivery');
            formA.find('.error').css({'display': 'none'});
            if ($('#fullname_delivery').val().trim() == '') {
                $('#fullname_delivery').parent().find('.error').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#telephone_delivery').val().trim() == '') {
                $('#telephone_delivery').parent().find('.error').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#province_id_delivery').val() == 0 || $('#province_id_delivery').val() == '') {
                $('.province_id_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#district_id_delivery').val() == 0 || $('#district_id_delivery').val() == '') {
                $('.district_id_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#sub_district_id_delivery').val() == 0 || $('#sub_district_id_delivery').val() == '') {
                $('.sub_district_id_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#address_delivery').val().trim() == '') {
                $('.address_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            $.ajax({
                type: 'POST',
                url: formA.attr('action'),
                data: formA.serialize(),
                dataType: 'json',
                success: function (response) {
                    if(response.responseCode == '00') {
                        var html = '<li>\n' +
                            '<div class="group-radio">\n' +
                            '<input type="radio" id="address-' + response.data.shippingAddressId + '" value="' + response.data.shippingAddressId + '" name="shipping_address_id" class="shipping_address_id">\n' +
                            '<label for="address-' + response.data.shippingAddressId + '">\n' +
                            '<span class="cr"></span>\n'+
                            '<span class="big-text">\n'+
                            '<b>' + response.data.fullName + '</b><br/>' +
                            'Địa chỉ : ' + response.data.address + ', ' + response.data.subDistrictName + ', ' + response.data.districtName + ', ' + response.data.provinceName + '<br/>\n' +
                            'Điện thoại: ' + response.data.phone + '\n'+
                            '</span></label>\n' +
                            '</div></li>';
                        $('#btn_add_delivery').parent().before(html);
                        $('#address-' + response.data.shippingAddressId).click();
                        $('#calcel-shipping-address').click();
                    } else {
                        alert('Có lỗi trong quá trình thêm địa chỉ, bạn vui lòng kiểm tra lại!');
                    }
                }
            });
        });

        $(document).on("click","#add-new-shipping-address",function() {
            var formA = $('#form-add-new-shipping-address');
            formA.find('.error').css({'display': 'none'});
            if ($('.shipping-address-telephone').val() == '') {
                $('.shipping-address-telephone').parents('.form-group').find('.error').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('.shipping-address-telephone-code').val() == '') {
                $('.shipping-address-telephone-code').parents('.form-group').find('.error').css({'display': 'block', 'margin-top': '10px'});
                $('.shipping-address-telephone-code').parents('.form-group').find('.error').html('Bạn hãy nhập mã xác thực');
                return false;
            }

            if ($('#fullname_delivery').val() == '') {
                $('#fullname_delivery').parent().find('.error').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#telephone_delivery').val() == '') {
                $('#telephone_delivery').parent().find('.error').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#province_id_delivery').val() == 0 || $('#province_id_delivery').val() == '') {
                $('.province_id_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#district_id_delivery').val() == 0 || $('#district_id_delivery').val() == '') {
                $('.district_id_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#sub_district_id_delivery').val() == 0 || $('#sub_district_id_delivery').val() == '') {
                $('.sub_district_id_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }

            if ($('#address_delivery').val() == '') {
                $('.address_delivery').css({'display': 'block', 'margin-top': '10px'});
                return false;
            }


            if ($('#checkOTPTelephone').length > 0) {
                var url = '/otp/check/' + formA.find('.shipping-address-telephone').val().trim() + '/' + formA.find('.shipping-address-telephone-code').val().trim();
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        result = JSON.parse(response);
                        formA.find('.error.telephone_code').hide();
                        if (result.responseCode == '00') {
                            // Bắt buộc add số điện thoại vào customer trong TH account đó chưa lưu số điện thoại
                            if ($('input[name="telephone"]').val().trim() != '' && $('input[name="telephone_code"]').val().trim() != '') {
                                $.ajax({
                                    url: '/merge/' + $('input[name="customer_id"]').val().trim() + '/' + $('input[name="telephone"]').val().trim() + '/' + $('input[name="telephone_code"]').val().trim(),
                                    type: 'GET',
                                    success: function (result, status, xhr) {
                                        result = JSON.parse(result);
                                        if (result.error == 0 && result.exist == 0)
                                            $('.error.telephone_code').hide();
                                        if ((result.error == 0 && result.exist == 1) || result.error == 1)
                                            $('.error.telephone_code').show().text(result.message);
                                        if (result.error == 0) {
                                            $('#checkOTPTelephone').remove();
                                            $('input[name="telephone_code"]').after('<button class="btn btn-transparent btn-status"><img src="'+base_url+'/v2/images/icon-check.svg"></button>');
                                        }
                                    }
                                });
                            }
                            $('#form-add-new-shipping-address').submit();
                        } else {
                            formA.find('.error.telephone_code').html('Mã xác thực không chính xác.');
                            formA.find('.error.telephone_code').show();
                        }
                    }
                });
            } else {
                $('#form-add-new-shipping-address').submit();
            }
        });

        $('.shipping_address_id').click(function () {
            $('#form_add_delivery').hide();
            $('input[name="fullname_delivery"]').removeAttr('required');
            $('input[name="telephone_delivery"]').removeAttr('required');
            $('select[name="province_id_delivery"]').removeAttr('required');
            $('select[name="district_id_delivery"]').removeAttr('required');
            $('select[name="sub_district_id_delivery"]').removeAttr('required');
            $('input[name="address_delivery"]').removeAttr('required');

            var item_id = $(this).val();
            $('input[name="shippingAddressId"]').val(item_id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/shipping-default',
                data: {
                    _token: CSRF_TOKEN,
                    shipping_address_id: item_id
                },
                dataType: 'JSON',
                success: function (response) {
                    if(response.status == 200) {
                        $('#content-box-receipt').html(response.html);
                        $('#promotion-code-modal-body').html(response.promotionHtml);
                    }
                }
            });
        });

        $('.shipping_method_input').change(function () {
            $('input[name="shipping_fee"]').val($(this).attr('data-fee'));
            $('input[name="shipping_method"]').val($(this).attr('data-shipmentMethodId'));
            $('input[name="shipmentMethodCode"]').val($(this).attr('data-shipmentMethodCode'));
            $('input[name="shipmentMethodName"]').val($(this).attr('data-shipmentMethodName'));
            $('input[name="shipmentVendorId"]').val($(this).attr('data-shipmentVendorId'));
            $('input[name="shipmentVendorName"]').val($(this).attr('data-shipmentVendorName'));
            $('input[name="shipmentVendorCode"]').val($(this).attr('data-shipmentVendorCode'));
            var shippingFee = parseInt($(this).attr('data-fee'));
            document.cookie = "shipping_method=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "shipping_method=" + $(this).val() + ";" + expires + ";path=/";
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/apply-shipping',
                data: {
                    _token: CSRF_TOKEN,
                    shipping_fee: shippingFee
                },
                dataType: 'JSON',
                success: function (response) {
                    if(response.status == 200) {
                        $('#content-box-receipt').html(response.html);
                        $('#promotion-code-modal-body').html(response.promotionHtml);
                    }
                }
            });
        });

        $('#btn_add_delivery').click(function () {
            $('.shipping_address_id').removeAttr('checked');
            $(this).addClass('disabled');
            $('input[name="fullname_delivery"]').attr('required', 'required');
            $('input[name="telephone_delivery"]').attr('required', 'required');
            $('select[name="province_id_delivery"]').attr('required', 'required');
            $('select[name="district_id_delivery"]').attr('required', 'required');
            $('select[name="sub_district_id_delivery"]').attr('required', 'required');
            $('input[name="address_delivery"]').attr('required', 'required');
            $.ajax({
                type: 'GET',
                url: '/location/province',
                dataType: 'json',
                success: function (response) {
                    var data = response.data;
                    for (var i=0;i<data.length;i++) {
                        $("#province_id_delivery").append('<option value="'+data[i]['provinceCode']+'">'+data[i]['provinceName']+'</option>');
                    }

                    $('#province_id_delivery').select2({
                        maximumInputLength: 20
                    });
                }
            });

            $('#form_add_delivery').show();
        });

        $('#calcel-shipping-address').click(function () {
            $('#form_add_delivery').hide();
        });

        $("#chooseReceipt").change(function () {
            if (this.checked) {
                $('input[name="fullname_delivery"]').val($('input[name="fullname"]').val());
                $('input[name="telephone_delivery"]').val($('input[name="telephone"]').val());
            } else {
                $('input[name="fullname_delivery"]').val('');
                $('input[name="telephone_delivery"]').val('');
            }
        });

        $('input[name="address_type"]').change(function () {
            switch($(this).val()) {
                case '1':
                    $('textarea[name="customer_note"]').val($('textarea[name="customer_note"]').val() + ' & giao hàng tại nhà riêng');
                    break;
                case '2':
                    $('textarea[name="customer_note"]').val($('textarea[name="customer_note"]').val() + ' & giao hàng tại công ty');
                    break;
                case '3':
                    $('textarea[name="customer_note"]').val($('textarea[name="customer_note"]').val() + ' & giao hàng ở địa chỉ khác');
                    break;
            }
        });

        $(document).on("click",".cart_minus_product",function() {
            var productId = parseInt($(this).attr('data-product'));
            var quantityInfo =  parseInt($(this).parent().find('.product_quantity').val());
            if (quantityInfo > 1) {
                quantityInfo = quantityInfo - 1;
                $('.product_' + productId + ' .product_quantity').val(quantityInfo);
                $('.product_' + productId + ' input[name="qty-add"]').val(quantityInfo);
            }
        });

        $(document).on("click",".cart_plus_product",function() {
            var productId = parseInt($(this).attr('data-product'));
            var quantityInfo =  parseInt($(this).parent().find('.product_quantity').val());
            quantityInfo = quantityInfo + 1;
            $('.product_' + productId + ' .product_quantity').val(quantityInfo);
            $('.product_' + productId + ' input[name="qty-add"]').val(quantityInfo);
        });

        $(document).on("change",".inline-add-cart .quantity",function() {
            var productId = parseInt($(this).attr('data-product'));
            totalClick++;
            let tt = totalClick;
            setTimeout(function () { updateCart(productId, tt) }, 200);
        });

        $(document).on('click', '#sendOTPTelephone', function() {
            if ($('input[name="telephone"]').val().trim() != '') {
                $.ajax({
                    url: '/otp/send/' + encodeURIComponent(window.btoa($('input[name="telephone"]').val().trim())) + '?otp_type=register',
                    type: 'GET',
                    success: function (result, status, xhr) {
                        result = JSON.parse(result);
                        if (result.responseCode == '00') {
                            var data = JSON.parse(result.data);
                            if (data.Count >= 3) {
                                $('.error.telephone').text('Gửi mã xác thực thành công. Vui lòng kiểm tra tin nhắn (Bạn đã nhận mã xác thực 3 lần, hãy thử lại sau 3 giờ)').show();
                            } else {
                                $('.error.telephone').text('Gửi mã xác thực thành công. Vui lòng kiểm tra tin nhắn.').show();
                            }

                            $('#checkOTPTelephone').removeClass('btn-gray').addClass('btn-default');
                            $('#sendOTPTelephone').css({'display': 'none'});
                            countdownCartRegister();
                        } else if (result.responseCode == '02') {
                            $('.error.telephone').text('Gửi mã xác thực thành công. Vui lòng kiểm tra tin nhắn (Bạn đã nhận mã xác thực 3 lần, hãy thử lại sau 3 giờ)').show();
                        } else {
                            $('.error.telephone').text(result.message).show();
                        }
                    }
                });
            }
        });

        // Click gửi lại mã xác thực
        $(document).on('click', '#send_telephone_code_cart_register_again', function() {
            if ($('input[name="telephone"]').val().trim() != '') {
                $.ajax({
                    url: '/otp/send/' + encodeURIComponent(window.btoa($('input[name="telephone"]').val().trim())) + '?otp_type=register',
                    type: 'GET',
                    success: function (result, status, xhr) {
                        result = JSON.parse(result);
                        if (result.responseCode == '00') {
                            var data = JSON.parse(result.data);
                            if (data.Count >= 3) {
                                $('.error.telephone').text('Bạn đã nhận mã xác thực 3 lần. Vui lòng thử lại sau 3 giờ.').show();
                            } else if (result.responseCode == '02') {
                                $('.error.telephone').text('Bạn đã nhận mã xác thực 3 lần. Vui lòng thử lại sau 3 giờ.').show();
                            } else {
                                $('.error.telephone').text('Gửi mã xác thực thành công. Vui lòng kiểm tra tin nhắn.').show();
                                countdownCartRegister();
                            }
                        } else {
                            $('.error.telephone').text(result.message).show();
                        }
                    }
                });
            }
        });

        $(document).on('click', '#checkOTPTelephone', function() {
            if ($('input[name="telephone"]').val().trim() == '') {
                $('.error.telephone').show().text('Số điện thoại không được để trống');
                return false;
            }
            if ($('input[name="telephone_code"]').val().trim() == '') {
                $('.error.telephone_code').show().text('Mã xác thực không được để trống');
                return false;
            }
            if ($('input[name="telephone"]').val().trim() != '' && $('input[name="telephone_code"]').val().trim() != '') {
                $.ajax({
                    url: '/merge/' + $('input[name="customer_id"]').val().trim() + '/' + $('input[name="telephone"]').val().trim() + '/' + $('input[name="telephone_code"]').val().trim(),
                    type: 'GET',
                    success: function (result, status, xhr) {
                        result = JSON.parse(result);
                        if (result.error == 0 && result.exist == 0)
                            $('.error.telephone_code').hide();
                        if ((result.error == 0 && result.exist == 1) || result.error == 1)
                            $('.error.telephone_code').show().text(result.message);
                        if (result.error == 0) {
                            $('#checkOTPTelephone').remove();
                            $('input[name="telephone_code"]').after('<button class="btn btn-transparent btn-status"><img src="'+base_url+'/v2/images/icon-check.svg"></button>');
                        }
                    }
                });
            }
        });

        $(document).on('click', '#show-promotion-modal', function() {
            $('#promotionCodeModal').modal('show');
            $('#discount_code').val('');
            $('#apply_discount_code_error').hide();
            $('#promotion-' + $('#check-pro-id').val()).click();
        });

        $(document).on('click', '#button-resgister-ticket', function() {
            let that = $(this);
            let check = true;
            let formTicket = that.parents('form');
            formTicket.find('.error').hide().html('');
            that.attr('disabled', 'disabled');
            if (formTicket.find('.full_name').val().trim() == '') {
                $('.e_full_name').show().html('Họ và tên không được để trống!');
                check = false;
            }

            if (formTicket.find('.phone').val().trim() == '') {
                $('.e_phone').show().html('Số điện thoại không được để trống!');
                check = false;
            }

            if (check) {
                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/create-ticket',
                    data: formTicket.serialize(),
                    dataType: 'json',
                    success: function (result) {
                        that.removeAttr('disabled');
                        if (result.status == 200) {
                            $('#modal-resgister-ticket').modal('hide');
                            $("#contentSuccessFormDeal").html(result.message);
                            $("#modalSuccessFormDeal").modal('show');
                            $(window).on('click', function (e) {
                                $("#modalSuccessFormDeal").modal('hide');
                                window.location.href='/';
                            });
                        }
                    },
                    error: function (xhr) {
                        that.removeAttr('disabled');
                    },
                });
            } else {
                that.removeAttr('disabled');
            }
        });

        $(document).on("click","#buy-now-product-on-post",function() {
            let productId = parseInt($(this).attr('data-product'));
            if (productId > 0) {
                addItemToCart({item_id: productId, item_quantity: 1});
                let dataC = window.localStorage.getItem('shopping-cart-' + cId);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/cart-update',
                    data: {content: dataC},
                    success: function (response) {
                        window.location.href = '/gio-hang'
                    }
                });
            }
        });
    });
})(jQuery);

/**
 * @param timeleft
 */
function countdownCartRegister(timeleft) {
    if (timeleft === undefined) {
        var timeleftCartRegister = 30;
    } else {
        var timeleftCartRegister = timeleft;
    }
    var downloadTimer = setInterval(function () {
        if (timeleftCartRegister > 0) {
            $('#send_telephone_code_cart_register_again').css({'display': 'none'});
            $('#text_telephone_code_cart_register_again').css({'display': 'block'});
            $('#text_telephone_code_cart_register_again').text('Gửi lại mã 0:' + timeleftCartRegister);
        }
        timeleftCartRegister -= 1;
        if (timeleftCartRegister < 0) {
            clearInterval(downloadTimer);
            $('#text_telephone_code_cart_register_again').css({'display': 'none'});
            $('#send_telephone_code_cart_register_again').css({'display': 'block'});
            $('#send_telephone_code_cart_register_again').text('Gửi lại mã');
        }
    }, 1000);
}

function quick_view_product(product_id) {
    $.ajax({
        type: 'GET',
        url: '/san-pham/detail/popup/' + product_id,
        dataType: 'json',
        success: function (response) {
            $("#view-product_popup").html(response.html);
            if ($('#quickView').find('.btnMobile').css('display') === 'block') {
                $('#quickView').find('.modal-body').css({'height' : $('#quickView').height() - 40 + 'px'});
            }
            $('input[name="product_quantity"]').inputFilter(function (value) {
                return /^\d*$/.test(value) && (parseInt(value) > 0);
            });
            $('.cta-quick-view .btn-modal-add-cart').click(function () {
                var productCard = $(this).parents('.quick-view-ct');
                var position = productCard.offset();
                var productImg = $(productCard).find('.carousel-product img');

                $('body').append('<div class="floating-cart floating-cart-quick-view"></div>');
                var cart = $('div.floating-cart');
                productImg.clone().appendTo(cart);
                $(cart).css({
                    'top': position.top + 'px',
                    'left': position.left + 'px',
                    'opacity': '0.5',
                    'zIndex': '3000'
                }).fadeIn('slow').addClass('moveToCart');
                setTimeout(function () {
                    $('div.floating-cart').remove();
                }, 150000);
            });
        }
    });
}

function cart_minus_item(element) {
    var productId = parseInt($(element).attr('data-product'));
    var quantity = parseInt($('.product_' + productId + ' .quantity').val());
    if(quantity > 1) {
        $('.product_' + productId + ' .quantity').val(quantity - 1);
        totalClick++;
        let tt = totalClick;
        addItemToCart({item_id: productId, item_quantity: 1}, 1);
        setTimeout(function () { updateCartData(tt) }, 500);
    }
}

function cart_plus_item(element) {
    var productId = parseInt($(element).attr('data-product'));
    var quantity = parseInt($('.product_' + productId + ' .quantity').val());
    $('.product_' + productId + ' .quantity').val(quantity + 1);
    totalClick++;
    let tt = totalClick
    addItemToCart({item_id: productId, item_quantity: 1});
    setTimeout(function () { updateCartData(tt) }, 500);
}

function cart_delete_item(productId) {
    $('.product_' + productId).remove();
    let cartData = getCart();
    delete cartData[productId];
    setCart(JSON.stringify(cartData));
    totalClick = 1;
    updateCartData(1)
    updateCartView('delete');
}

function updateCart(productId, totalQ) {
    let cartData = getCart();
    var quantity = parseInt($('.product_' + productId + ' .quantity').val());
    if(quantity == 0) {
        $('.product_' + productId).remove();
        delete cartData[productId];
    } else {
        cartData[productId] = {item_id: productId, item_quantity: quantity}
    }

    setCart(JSON.stringify(cartData));
    updateCartData(totalQ)
    updateCartView();
}

function updateCartData(totalQ, redirect = 0) {
    if (totalQ == totalClick) {
        let dataC = window.localStorage.getItem('shopping-cart-' + cId);
        totalClick = 0;
        if (dataC != undefined && dataC != null) {
            updateCartView();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/cart-update',
                data: {content: dataC},
                success: function (response) {
                    updateCartView();
                    updatePromotion();
                    if (redirect == 1) {
                        window.location.href = '/gio-hang'
                    }
                }
            });
            $('#badge-cart').html(getTotalItemCart);
        }
    }
}

function updateCartView(action = 'other') {
    let total = 0;
    let ttItem = 0;

    $('.ul-cart .quantity').each(function() {
        let tt = parseInt($(this).val()) * parseInt($(this).attr('data-price'));
        $(this).parents(".qty-quick-cart").find('.product-money').html(formatCurrency(tt));
        total += tt;
        ttItem++;
    });
    if (ttItem > 0) {
        $('#badge-cart').html(ttItem);
        $('#shopping-total-product').html(formatCurrency(total));
        $('#shopping-total-price').html(formatCurrency(total));
    } else {
        if (action === 'delete') {
            window.localStorage.removeItem('shopping-cart-' + cId);
            setTimeout(function () {
                window.location.href = '/gio-hang';
            }, 500);
        }
    }

}

function updatePromotion(){
    $.ajax({
        url: base_url + '/ajax-show-promotion',
        type: 'GET',
        success: function (result, status, xhr) {
            $('#shipping-cart-list-promotion-apply').replaceWith(result.html);

        },
        error: function (xhr, status, error) {
            $('#shipping-cart-list-promotion-apply').replaceWith('');
        }
    });
}
function addCartInList(productId, quantity = 1) {
    if (quantity > 1)
        totalClick = quantity;
    else
        totalClick++;
    let tt = totalClick;
    addItemToCart({item_id: productId, item_quantity: (quantity > 1 ? quantity : 1)});
    setTimeout(function () {updateCartData(tt)}, 500);
}

function add_to_cart(productId, popup,  allow_redirect, device) {
    if (popup == 1) {
        var form = $('.cta-quick-view #product_info_' + productId);
    } else {
        if (device == 'mobile')
            var form = $('#product_info_mobile_' + productId);
        else
            var form = $('#product_info_' + productId);
    }

    let quantity = form.find('input[name="product_quantity"]').val();
    totalClick++;
    let tt = totalClick
    addItemToCart({item_id: productId, item_quantity: parseInt(quantity)});
    setTimeout(function () { updateCartData(tt, allow_redirect) }, 300);
}

function getCart() {
    let dataC =  window.localStorage.getItem('shopping-cart-' + cId);
    if (dataC != undefined && dataC != null && dataC !== '') {
        return JSON.parse(dataC);
    } else {
        return {};
    }

}

function setCart(data) {
    window.localStorage.setItem('shopping-cart-' + cId, data);
}

function addItemToCart(data, type = 0) {
    let cartData = getCart();
    if (cartData[data.item_id] != undefined) {
        if (type == 1) {
            cartData[data.item_id]['item_quantity'] = parseInt(cartData[data.item_id]['item_quantity']) - parseInt(data.item_quantity);
        } else {
            cartData[data.item_id]['item_quantity'] = parseInt(cartData[data.item_id]['item_quantity']) + parseInt(data.item_quantity);
        }
    }  else {
        cartData[data.item_id] = data;
    }

    setCart(JSON.stringify(cartData));
}

function getTotalItemCart() {
    let total = 0;
    let cartData = getCart()
    $.each(cartData, function (i, v) {
        if (v !== null)
            total++;
    });

    return total;
}

function getShoppingCart() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        url: '/list-products',
        success: function (response) {
            setCart(response.content);
            if (response.totalItem > 0) {
                $('#badge-cart').html(response.totalItem);
            }
        }
    });
}

function highlightPost() {
    let postId = $('#detail_post_id').val() !== undefined ? parseInt($('#detail_post_id').val()) : '';
    $.ajax({
        url: base_url + '/post/' + postId + '/related',
        type: 'GET',
        success: function (result, status, xhr) {
            $('#post-related').replaceWith(result.html);
            createPostRelatedRight(result.data);
        },
        error: function (xhr, status, error) {
            $('#post-related').replaceWith('');
        }
    });
}

function highlightProduct() {
    let postId = $('#detail_post_id').val() !== undefined ? parseInt($('#detail_post_id').val()) : '';
    $.ajax({
        type: 'GET',
        url: '/san-pham/highlight/product/' + postId,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                $("#body-highlight-product").html(response.html);
                sliderBlock();
                if ($("#body-highlight-product-right").length > 0 && response.data.length > 0) {
                    createHighlightProductRight(response.data);
                }
            } else {
                $('.related-products').remove();
            }
        }
    });
}

function createHighlightProductRight(data) {
    let html = '';
    for (let i = 0; i < data.length; i =  i + 3) {
        html += '<div class="item">';
        if (data[i] != null && data[i] != undefined) {
            html += '<div class="item-row">\n' +
                '       <span class="thumb"><img class="img-fluid" src="' + resizeImage(data[i]['ThumbnailUrl']) + '"/></span>\n' +
                '       <div class="info">\n' +
                '           <h4 class="name">' + data[i]['Name'] + '</h4>\n' +
                '           <span class="text-price">' + formatCurrency(data[i]['SalePrice']) + '</span>\n' +
                '           <a href="' + data[i]['url_detail'] + '" class="btn-detail">Chi tiết</a>\n' +
                '       </div>\n' +
                '   </div>';
        }
        if (data[i] != null && data[i+1] != undefined) {
            html += '<div class="item-row">\n' +
                '       <span class="thumb"><img class="img-fluid" src="' + resizeImage(data[i+1]['ThumbnailUrl']) + '"/></span>\n' +
                '       <div class="info">\n' +
                '           <h4 class="name">' + data[i+1]['Name'] + '</h4>\n' +
                '           <span class="text-price">' + formatCurrency(data[i+1]['SalePrice']) + '</span>\n' +
                '           <a href="' + data[i+1]['url_detail'] + '" class="btn-detail">Chi tiết</a>\n' +
                '       </div>\n' +
                '   </div>';
        }
        if (data[i] != null && data[i+2] != undefined) {
            html += '<div class="item-row">\n' +
                '       <span class="thumb"><img class="img-fluid" src="' + resizeImage(data[i+2]['ThumbnailUrl']) + '"/></span>\n' +
                '       <div class="info">\n' +
                '           <h4 class="name">' + data[i+2]['Name'] + '</h4>\n' +
                '           <span class="text-price">' + formatCurrency(data[i+2]['SalePrice']) + '</span>\n' +
                '           <a href="' + data[i+2]['url_detail'] + '" class="btn-detail">Chi tiết</a>\n' +
                '       </div>\n' +
                '   </div>';
        }
        html += '</div>';
    }

    if (html != '') {
        $("#body-highlight-product-right").html(html);
        $('#body-highlight-product-right').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false
        });
    }
}

function resizeImage(img, type= 'medium') {
    if (img != '' && img != undefined) {
        let datas = img.split('.');
        datas[0] = datas[0] + '_' + type;
        return IMGURLPRODUCT + datas.join('.');
    } else {
        return '';
    }

}

function createPostRelatedRight(data) {
    let html = '';
    for (let i = 0; i < data.length; i =  i + 3) {
        html += '<div class="item">';
        if (data[i] != null && data[i] != undefined) {
            html += '<div class="item-row">\n' +
                '       <span class="thumb"><img class="img-fluid" src="' + resizePostImage(data[i]['thumbnail_url']) + '"/></span>\n' +
                '       <div class="info">\n' +
                '           <h4 class="name">' +
                '               <a href="' + data[i]['share_url'] + '">' + data[i]['title'] + '</a>' +
                '           </h4>\n' +
                '       </div>\n' +
                '   </div>';
        }
        if (data[i] != null && data[i+1] != undefined) {
            html += '<div class="item-row">\n' +
                '       <span class="thumb"><img class="img-fluid" src="' + resizePostImage(data[i+1]['thumbnail_url']) + '"/></span>\n' +
                '       <div class="info">\n' +
                '           <h4 class="name">' +
                '               <a href="' + data[i + 1]['share_url'] + '">' + data[i+1]['title'] + '</a>' +
                '           </h4>\n' +
                '       </div>\n' +
                '   </div>';
        }
        if (data[i] != null && data[i+2] != undefined) {
            html += '<div class="item-row">\n' +
                '       <span class="thumb"><img class="img-fluid" src="' + resizePostImage(data[i+2]['thumbnail_url']) + '"/></span>\n' +
                '       <div class="info">\n' +
                '           <h4 class="name">' +
                '               <a href="' + data[i + 2]['share_url'] + '">' + data[i+2]['title'] + '</a>' +
                '           </h4>\n' +
                '       </div>\n' +
                '   </div>';
        }
        html += '</div>';
    }

    if (html != '') {
        $("#post-related-right").html(html);
        $('#post-related-right').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false
        });
    }
}

function resizePostImage(img, type= '400x250') {
    let datas = img.split('.');
    datas[0] = datas[0] + '_' + type;
    return IMGURL + datas.join('.');
}
