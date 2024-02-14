@extends('layouts.mobile.default')
@section('content')
    <div id="body_content"> <div class="container">
            <div class="page_nav article" style="padding:10px 0;">
                <a href="/" title="Trang chủ">Trang chủ</a>&nbsp;&nbsp;/&nbsp;&nbsp;Đăng ký
            </div>
            <div class="clear"></div>
            <div class="line5"></div>


            <h1 style="font-size:18px; font-weight:500;">Tạo tài khoản khách hàng cá nhân</h1>
            <div class="regist_left">
                <form method="post" action="/ajax/customer_register.php" enctype="multipart/form-data" onsubmit="return check_field();">
                    <table class="tbl-common">
                        <tbody><tr>
                            <td><label>Email đăng ký*</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="inputText" size="50" name="info[email]" id="email" onkeyup="check_user_email(this.value)">
                                <span id="check_user"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Tên*</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="inputText" size="50" name="info[full_name]" id="full_name"></td>
                        </tr>
                        <tr>
                            <td><label>Số máy bàn</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="inputText" size="20" name="info[tel]" id="tel">
                                <span style="color: #ff0000;" class="tel-call"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Số di động*</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="inputText" size="20" name="info[mobile]" id="mobile">
                                <span style="color: #ff0000;" class="mobile-call"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Giới tính</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="info[sex]" value="male">Nam
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="info[sex]" value="female">Nữ
                            </td>
                        </tr>
                        <tr>
                            <td><label>Ngày sinh</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="info[birthday]" style="width:100px; float:left; margin-right:10px;"><option value="0">- Ngày - </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>  <select name="info[birthmonth]" style="width:100px; float:left; margin-right:10px;"><option value="0">- Tháng - </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select> <select name="info[birthyear]" style="width:100px; float:left;"><option value="0">- Năm - </option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option></select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mật khẩu*</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" class="inputText" size="50" name="info[password]" id="password">
                                <span class="password-call" style="color: #ff0000;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Nhập lại mật khẩu*</label></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="info[password1]" id="password1" class="inputText" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Địa chỉ</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="inputText" size="50" name="info[address]" id="address">
                                <span style="color: #ff0000;" class="address-call"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Tỉnh/TP</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="info[province]">

                                    <option value="1">Hà Nội</option>

                                    <option value="2">TP HCM</option>

                                    <option value="5">Hải Phòng</option>

                                    <option value="4">Đà Nẵng</option>

                                    <option value="6">An Giang</option>

                                    <option value="7">Bà Rịa-Vũng Tàu</option>

                                    <option value="13">Bình Dương</option>

                                    <option value="15">Bình Phước</option>

                                    <option value="16">Bình Thuận</option>

                                    <option value="14">Bình Định</option>

                                    <option value="8">Bạc Liêu</option>

                                    <option value="10">Bắc Giang</option>

                                    <option value="9">Bắc Kạn</option>

                                    <option value="11">Bắc Ninh</option>

                                    <option value="12">Bến Tre</option>

                                    <option value="18">Cao Bằng</option>

                                    <option value="17">Cà Mau</option>

                                    <option value="3">Cần Thơ</option>

                                    <option value="24">Gia Lai</option>

                                    <option value="25">Hà Giang</option>

                                    <option value="26">Hà Nam</option>

                                    <option value="27">Hà Tĩnh</option>

                                    <option value="30">Hòa Bình</option>

                                    <option value="28">Hải Dương</option>

                                    <option value="29">Hậu Giang</option>

                                    <option value="31">Hưng Yên</option>

                                    <option value="32">Khánh Hòa</option>

                                    <option value="33">Kiên Giang</option>

                                    <option value="34">Kon Tum</option>

                                    <option value="35">Lai Châu</option>

                                    <option value="38">Lào Cai</option>

                                    <option value="36">Lâm Đồng</option>

                                    <option value="37">Lạng Sơn</option>

                                    <option value="39">Long An</option>

                                    <option value="40">Nam Định</option>

                                    <option value="41">Nghệ An</option>

                                    <option value="42">Ninh Bình</option>

                                    <option value="43">Ninh Thuận</option>

                                    <option value="44">Phú Thọ</option>

                                    <option value="45">Phú Yên</option>

                                    <option value="46">Quảng Bình</option>

                                    <option value="47">Quảng Nam</option>

                                    <option value="48">Quảng Ngãi</option>

                                    <option value="49">Quảng Ninh</option>

                                    <option value="50">Quảng Trị</option>

                                    <option value="51">Sóc Trăng</option>

                                    <option value="52">Sơn La</option>

                                    <option value="53">Tây Ninh</option>

                                    <option value="56">Thanh Hóa</option>

                                    <option value="54">Thái Bình</option>

                                    <option value="55">Thái Nguyên</option>

                                    <option value="57">Thừa Thiên-Huế</option>

                                    <option value="58">Tiền Giang</option>

                                    <option value="59">Trà Vinh</option>

                                    <option value="60">Tuyên Quang</option>

                                    <option value="61">Vĩnh Long</option>

                                    <option value="62">Vĩnh Phúc</option>

                                    <option value="63">Yên Bái</option>

                                    <option value="19">Đắk Lắk</option>

                                    <option value="22">Đồng Nai</option>

                                    <option value="23">Đồng Tháp</option>

                                    <option value="21">Điện Biên</option>

                                    <option value="20">Đăk Nông</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mã bảo mật*</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" size="10" name="register_captcha" class="inputText" style="width:100px; float:left;" onkeyup="check_user_captcha(this.value)">
                                <img src="https://www.phucanh.vn/includes/captcha/captcha.php?v=" alt="captcha" id="captchaimg" style="float:left; height:50px;">
                                <a id="change-image" onclick="document.getElementById('captchaimg').src='/includes/captcha/captcha.php?'+Math.random();" href="javascript:;" style="float:left; margin-top:10px;">[Xem mã khác]</a>
                                <span id="check_user2" style="color: #ff0000;"></span>
                                <input type="hidden" name="info[return_url]" value="https://www.phucanh.vn/dang-ky">
                                <input type="hidden" name="settings[require_activate]" value="1">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="height: 80px;overflow: auto;padding: 10px;width: 88%;margin: 6px 0;border: 1px solid #ddd;">
                                    Khi bạn truy cập vào trang web của chúng tôi có nghĩa là bạn đồng ý với các điều khoản này. Trang web có quyền thay đổi, chỉnh sửa, thêm hoặc lược bỏ bất kỳ phần nào trong Quy định và Điều kiện sử dụng, vào bất cứ lúc nào. Các thay đổi có hiệu lực ngay khi được đăng trên trang web mà không cần thông báo trước. Và khi bạn tiếp tục sử dụng trang web, sau khi các thay đổi về Quy định và Điều kiện được đăng tải, có nghĩa là bạn chấp nhận với những thay đổi đó.
                                    <br>
                                    Quý khách vui lòng kiểm tra thường xuyên để cập nhật những thay đổi của chúng tôi.
                                </div>
                                <label class="full" for="cb_rules_agree">
                                    <input onclick="agreeTerm()" type="checkbox" value="1" tabindex="1" id="cb_rules_agree" name="agree">
                                    <strong>Tôi đã đọc, và đồng ý theo điều khoản đăng ký.</strong>
                                </label>
                                <div class="space10"></div>
                                <label>
                                    <input type="checkbox" name=""> Đăng ký nhận thông tin khuyến mãi
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"><input id="btn_reg" type="submit" value="Đăng ký" style="background:#4267b2; text-transform:uppercase; font-size:15px; font-weight:bold; padding:10px 20px; color:#fff; border:none; margin:auto;"></td>
                        </tr>
                        </tbody></table>
                </form>
            </div><!--regis-left-->
            <div class="regist_right">
                <a href="javascript:open_oauth('Google')"><img src="https://www.phucanh.vn/template/2019/images/img_signup_go.jpg" alt="" style="display:block; margin:10px 10%; margin-right:5px; float:left;width: 80%"></a>
                <a href="javascript:open_oauth('Facebook')"><img src="https://www.phucanh.vn/template/2019/images/img_signup_fb.jpg" alt="" style="display:block; margin:10px 10%;width: 80%"></a>
            </div><!--regis-right-->

        </div><!--container-->

        <script type="text/javascript">
            function check_field() {
                var error = "";
                var email = document.getElementById('email').value;
                if (email.length < 6) error += "- Mời bạn nhập địa chỉ email\n";
                var password = document.getElementById('password').value;
                if (password.length < 6) error += "- Mật khẩu yếu\n";

                var full_name = document.getElementById('full_name').value;
                if (full_name.length < 6) error += "- Mời bạn nhập đúng tên\n";
                var mobile = document.getElementById('mobile').value;
                if (mobile.length < 9) error += "- Mời bạn nhập đủ số điện thoại\n";
                var address = document.getElementById('address').value;
                if (address.length < 6) error += "- Mời bạn nhập địa chỉ\n";
                var vapt_er = $("#check_user2").text();
                var vapt_trong = $("#capt_tr").val();
                if(vapt_er != "" || vapt_trong == "") error += "- Mời bạn nhập đúng mã bảo mật\n";

                if (document.getElementById("cb_rules_agree").checked == false) error += "- Bạn chưa tích chọn đồng ý với điều khoản của Phúc Anh\n";

                if (error != "") {
                    alert(error);
                    return false;
                }
                return true;
            }

            function agreeTerm() {
                if (document.getElementById("cb_rules_agree").checked == true) {
                    document.getElementById("btn_reg").disabled = false;
                }
                else {
                    document.getElementById("btn_reg").disabled = true;
                }
            }

            function check_user_email(email){
                $('#check_user').html("... đang kiểm tra");
                $.post("/ajax/check_user.php", {action : 'check-email', email : email}, function(data){
                    $('#check_user').html(data);
                    console.log("data user name:" + data);
                });
            }

            function check_user_captcha(captcha){
                $('#check_user2').html("... đang kiểm tra");
                $.post("/ajax/check_user.php", {action : 'check-captcha', captcha : captcha}, function(data){ $('#check_user2').html(data); });
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#password").change(function(){
                    var password = document.getElementById('password').value;
                    if (password.length < 6)
                        $(".password-call").text("Mật khẩu yếu !");
                    else{
                        $(".password-call").text("");
                    }
                });
                $("#repassword").change(function(){
                    var repassword = document.getElementById('repassword').value;
                    var password = document.getElementById('password').value;
                    if (repassword != password)
                        $(".repassword-call").text("Mật khẩu không khớp !");
                    else{
                        $(".repassword-call").text("");
                    }
                });
                $("#full_name").change(function(){
                    var full_name = document.getElementById('full_name').value;
                    if (full_name.length < 6)
                        $(".full_name-call").text("Mời bạn nhập đúng tên !");
                    else{
                        $(".full_name-call").text("");
                    }
                });
                $("#tel").change(function(){
                    var tel = document.getElementById('tel').value;
                    if(!$.isNumeric(tel))
                        $(".tel-call").text("Mời bạn nhập đúng số điện thoại riêng !");
                    else{
                        $(".tel-call").text("");
                    }
                });
                $("#mobile").change(function(){
                    var mobile = document.getElementById('mobile').value;
                    if(!$.isNumeric(mobile))
                        $(".mobile-call").text("Mời bạn nhập đúng số điện thoại di động!");
                    else{
                        $(".mobile-call").text("");
                    }
                });
                $("#address").change(function(){
                    var address = document.getElementById('address').value;
                    if (address.length < 6)
                        $(".address-call").text("Mời bạn nhập đúng địa chỉ !");
                    else{
                        $(".address-call").text("");
                    }
                });

            });

        </script>  </div>
@endsection
