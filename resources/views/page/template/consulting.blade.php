@extends('layouts.default')
@section('content')
    <div class="container">
        <h1 style="margin:15px 0; text-align:center;">Gửi yêu cầu tư vấn sản phẩm</h1>
        <p class="font14" style="max-width:800px; margin:auto; text-align:center;">Khi khách hàng có nhu cầu tư vấn sản phẩm, quý khách vui lòng gửi yêu cầu tới phòng kinh doanh của Phúc Anh. Với kinh nghiệm hơn 20 năm phục vụ, NIIT-ICT sẽ nỗ lực hết mình để làm hài lòng quý khách hàng!</p>
        <br>
        <form method="post" action="/upload/product.php" enctype="multipart/form-data" onsubmit="return check_field();" style="width: 600px;margin: auto;border: solid 1px #ddd;padding: 10px;">
            <table class="tbl-common">
                <tbody><tr>
                    <td>Họ tên <b style="color:Red">*</b><br>
                        <input type="text" size="40" name="name" id="buyer_name" class="inputText" required="">
                    </td>
                </tr>
                <tr>
                    <td>Email<br><input type="text" size="40" name="email" class="inputText"></td>
                </tr>
                <tr>
                    <td>Điện thoại <b style="color:Red">*</b><br>
                        <input type="text" size="40" name="phone" id="buyer_tel" class="inputText" required="">
                    </td>
                </tr>
                <tr>
                    <td>Nội dung yêu cầu<br><textarea style="max-width: 565px;height: 100px;" cols="50" rows="8" name="content" class="inputText"></textarea></td>
                </tr>
                <tr>
                    <td>Mã bảo vệ
                        <span id="check_captcha_ycdh" style="color:#d00; font-size:12px; display:block;"></span>
                        <input type="text" size="10" name="captcha" id="captcha_ycdh" onkeyup="check_user_captcha_contact(this.value,'check_captcha_ycdh')" class="inputText" style="width:100px; float:left;">
                        <img id="captchaimg" src="/includes/captcha/captcha.php?v="><br>
                        (<a id="change-image" onclick="document.getElementById('captchaimg').src='/includes/captcha/captcha.php?'+Math.random();" href="javascript:;">Xem mã khác</a>)</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input name="submit" type="submit" value="Gửi yêu cầu" class="btn btn-blue">
                        <input type="hidden" name="send" id="send" value="yes">
                    </td>
                </tr>
                </tbody></table>
        </form>
    </div>
@endsection
