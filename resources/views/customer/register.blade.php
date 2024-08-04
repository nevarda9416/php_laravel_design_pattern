@extends('layouts.default')
@section('content')
    <div class="container">
        <div id="breadcrumb">
            <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/" itemprop="url" class="nopad-l">
                    <span itemprop="title">Trang chủ</span>
                </a>
            </div>
            <div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                &nbsp;/&nbsp;<a href="" itemprop="url">
                    <span itemprop="title">Đăng ký</span>
                </a>
            </div>
        </div><!--breadcrumb-->
        <div class="clear"></div>
        <div class="line5"></div>

        <h1 style="font-size:18px; font-weight:500;">Tạo tài khoản khách hàng cá nhân</h1>
        <div class="regist_left">
            <form method="post" action="{{url('dang-ky')}}" enctype="multipart/form-data">
                @csrf
                <table>
                    <tbody><tr>
                        <td style="width:140px;"><label>Email đăng ký*</label></td>
                        <td>
                            <input type="text" class="inputText" size="50" name="info[email]" id="email" onkeyup="check_user_email(this.value)" required>
                            <span id="check_user"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Tên*</label></td>
                        <td><input type="text" class="inputText" size="50" name="info[full_name]" id="full_name" required></td>
                    </tr>
                    <tr>
                        <td><label>Số di động*</label></td>
                        <td>
                            <input type="number" class="inputText" size="20" name="info[telephone]" id="telephone" required>
                            <span style="color: #ff0000;" class="mobile-call"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Giới tính</label></td>
                        <td>
                            <input type="radio" name="info[gender]" value="male">Nam
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="info[gender]" value="female">Nữ
                        </td>
                    </tr>
                    <tr>
                        <td><label>Ngày sinh</label></td>
                        <td>
                            <select name="info[birthday]" style="width:100px; float:left; margin-right:10px;">
                                <option value="0">- Ngày - </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
                            </select>
                            <select name="info[birthmonth]" style="width:100px; float:left; margin-right:10px;">
                                <option value="0">- Tháng - </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                            </select>
                            <select name="info[birthyear]" style="width:100px; float:left;">
                                <option value="0">- Năm - </option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Mật khẩu*</label></td>
                        <td>
                            <input type="password" class="inputText" size="50" name="info[password]" id="password" required>
                            <span class="password-call" style="color: #ff0000;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Nhập lại mật khẩu*</label></td>
                        <td><input type="password" name="info[password_confirmation]" id="password_confirmation" class="inputText" size="20" required></td>
                    </tr>
                    <tr>
                        <td><label>Địa chỉ</label></td>
                        <td>
                            <input type="text" class="inputText" size="50" name="info[address]" id="address">
                            <span style="color: #ff0000;" class="address-call"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div style="height: 150px;overflow: auto;padding: 10px;width: 88%;margin: 6px 0;border: 1px solid #ddd;">
                                <h3 style="margin:0px; width:100%; margin-bottom:10px;">Điều khoản đăng ký tài khoản</h3>
                                <p>Khi bạn truy cập vào trang web của chúng tôi có nghĩa là bạn đồng ý với các điều khoản sau. </p>
                                <span style="margin-bottom:7px; width:100%; float:left;">- Trang web có quyền thay đổi, chỉnh sửa, thêm hoặc lược bỏ bất kỳ phần nào trong Quy định và Điều kiện sử dụng, vào bất cứ thời điểm nào.</span> <br>
                                <span style="margin-bottom:7px; width:100%; float:left;">- Khi bạn tiếp tục sử dụng trang web, sau khi các thay đổi về Quy định và Điều kiện được đăng tải, có nghĩa là bạn chấp nhận với những thay đổi đó.</span><br>
                                <span>- Đồng ý với <a style="color:blue;" href="https://www.phucanh.vn/chinh-sach-bao-mat-thong-tin-khach-hang.html
" target="_blank">Chính sách bảo mật thông tin khách hàng</a> .</span><br>
                                <p><i>Quý khách vui lòng kiểm tra thường xuyên để cập nhật những thay đổi của chúng tôi.</i></p>
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
                        <td></td>
                        <td>
                            <div class="form-group">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:center;"><input id="btn_reg" type="submit" value="Đăng ký" style="background:#4267b2; text-transform:uppercase; font-size:15px; font-weight:bold; padding:10px 20px; color:#fff; border:none; margin:auto;cursor: pointer;"></td>
                    </tr>
                    </tbody></table>
            </form>
        </div><!--regis-left-->
        <div class="regist_right">
            <a href="javascript:open_oauth('Google')"><img src="https://www.phucanh.vn/template/2017/images/img_signup_go.jpg" alt="" style="display:block; margin:10px 0; margin-right:5px; float:left;"></a>
            <a href="javascript:open_oauth('Facebook')"><img src="https://www.phucanh.vn/template/2017/images/img_signup_fb.jpg" alt="" style="display:block; margin:10px 0;"></a>
        </div><!--regis-right-->
    </div>
@endsection
