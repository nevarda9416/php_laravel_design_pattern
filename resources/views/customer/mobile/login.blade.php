@extends('layouts.mobile.default')
@section('content')
    <div id="body_content"> <script>
            function GetURLParameter(sParam)
            {
                var sPageURL = window.location.search.substring(1);
                var sURLVariables = sPageURL.split('&');
                for (var i = 0; i < sURLVariables.length; i++)
                {
                    var sParameterName = sURLVariables[i].split('=');
                    if (sParameterName[0] == sParam)
                    {
                        return sParameterName[1];
                    }
                }
            }


            $(document).ready(function(){
                url = GetURLParameter('return_url');
                if(url !='') $("#return_url").val(url);
            });
        </script>
        <div class="container">
            <div class="page_nav article" style="padding:10px 0;">
                <a href="/" title="Trang chủ">Trang chủ</a>&nbsp;&nbsp;/&nbsp;&nbsp;Đăng nhập
            </div>
            <div class="clear"></div>
            <form action="/ajax/customer_login.php" method="post" name="loginForm" enctype="multipart/form-data" style="border:solid 1px #ddd; padding:8px;">
                <!--important-->
                <input type="hidden" name="return_url" id="return_url" value="">
                <input type="hidden" name="store_id" value="<br />
<b>Notice</b>:  Undefined variable: store_id in <b>/var/www/html/phucanh.vn/public_html/cache/template/mobile_customer_login.82209f8be53b5c0583d35ff02618c2d9.php</b> on line <b>30</b><br />
">
                <input type="hidden" name="secure_key" value="19a8bf39fe2d0d4a7b96bbb511d4b076">


                <table class="shadow cor tbl-common" cellspacing="5" cellpadding="6" style="width:100%; font-size:14px;">
                    <tbody><tr>
                        <td style="width: 50%;" id="login_col">
                            <div id="login_title" style="padding: 5px 0px 10px; font-size: 13px; color: rgb(88, 88, 88);"><b>Thông tin khách hàng đăng nhập hệ thống</b></div>


                            <input type="hidden" name="login" id="login" value="yes">
                            <table cellpadding="5" cellspacing="0" width="96%">
                                <tbody><tr>
                                    <td>Email đăng nhập</td>
                                    <td><input type="text" size="25" name="email" id="email" class="inputText"></td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu</td>
                                    <td><input type="password" size="25" name="password" id="password" class="inputText"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div style="position: relative;">
                                            <input type="submit" value="Đăng nhập" class="btn btn-blue">
                                            <span style=""><a href="/quen-mat-khau">Quên mật khẩu</a></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="javascript:open_oauth('Google')"><img src="https://www.phucanh.vn/template/2019/images/log-in-with-google.jpg" alt="" style="display:block; margin:10px 10%; margin-right:5px; float:left;width: 80%"></a>
                                        <a href="javascript:open_oauth('Facebook')"><img src="https://www.phucanh.vn/template/2019/images/log-in-with-facebook.jpg" alt="" style="display:block; margin:10px 10%;width: 80%"></a>
                                    </td>
                                </tr>
                                </tbody></table>

                        </td>
                    </tr>
                    <tr>
                        <td valign="top" style="line-height: 18px;">


                            <div style="padding: 5px 0px 10px; font-size: 13px; color: rgb(88, 88, 88);"><b>Bạn chưa là thành viên</b></div>
                            Đăng ký là thành viên để hưởng nhiều lợi ích và đặt mua hàng dễ dàng hơn.
                            <p><a title="Click đăng ký tài khoản miễn phí" target="_blank" href="/dang-ky" style="color: rgb(1, 172, 241); font-weight: bold; text-decoration: none;">Đăng ký tài khoản</a></p>


                        </td>
                    </tr>

                    </tbody></table>
                <!--<input type="hidden" name="require_activate" value="1" />-->
            </form>

        </div> </div>
@endsection
