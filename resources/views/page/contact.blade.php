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
                    <span itemprop="title">THÔNG TIN LIÊN HỆ</span>
                </a>
            </div>
        </div><!--breadcrumb-->
        <div class="line"></div>
        <div class="clear"></div>
        <div class="nd"><p style="text-align: center;"><strong><span style="font-size: 18pt;">THÔNG TIN LIÊN HỆ</span></strong></p>

            <p><span style="font-size: 11pt;">Thành lập vào ngày 08/08/2000 và trải qua hơn 20 năm hoạt động &amp; phát triển, Phúc Anh đã từng bước khẳng định và tạo sự tín nhiệm trong lòng khách hàng, trở thành một trong những công ty chuyên nghiệp nhất cung cấp điện thoại, máy tính, thiết bị văn phòng và các giải pháp, ứng dụng công nghệ. Với đội ngũ nhân viên trình độ cao, tận tâm cùng hệ thống showroom, trung tâm bảo hành hiện đại trên khắp Hà Nội, Phúc Anh sẽ mang đến cho khách hàng sự hài lòng cao nhất khi lựa chọn sản phẩm, sử dụng dịch vụ.</span></p>
            <p><span style="font-size: 11pt;">Để được phục vụ tốt nhất, Quý khách vui lòng liên hệ với chúng tôi theo các thông tin sau:</span></p>

            <p style="text-align: center;"><strong><span style="font-size: 18pt;">&nbsp;HỆ THỐNG SHOWROOM</span></strong></p>
            <table class="contact-table" style="font-size: 11pt; width: 100%;">
                <tbody>
                <tr>
                    <td style="width: 50%; border-bottom: 1px solid #dddddd; vertical-align: top;">
                        <p><strong><span class="number-footer">1</span><span class="title-footer">PHÚC ANH 15 XÃ ĐÀN</span></strong></p>
                        <p>&nbsp; &nbsp;<br><strong>&nbsp; &nbsp;* Địa chỉ</strong>: Số 15, Xã Đàn, Phương Liên, Đống Đa, Hà Nội</p>
                        <p>&nbsp; &nbsp;<strong>* Điện thoại</strong>: (024) 39.68.99.66 (ext 1)</p>
                        <p>&nbsp; &nbsp;<strong>* Thời gian làm việc</strong>: 8h00 - 21h00</p>
                        <p>&nbsp; &nbsp;<strong>* Quản lý cơ sở:</strong>&nbsp;Anh Lê Hoài Sơn</p>
                        <p>&nbsp; &nbsp; &nbsp; - Email: <a href="mailto:phucanh.xadan@phucanh.com.vn">phucanh.xadan@phucanh.com.vn</a></p>
                        <p>&nbsp; &nbsp; &nbsp; - Mobile: 0902.298.094</p>
                    </td>
                    <td style="width: 50%; border-bottom: 1px solid #ddd;">

                        <p><iframe style="border: 0px; float: right;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5312063344636!2d105.83518421774775!3d21.011420855883173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab871916eb05%3A0x696fde03613dd134!2zUGjDumMgQW5oIFNtYXJ0V29ybGQtIDE1IFjDoyDEkMOgbg!5e0!3m2!1svi!2s!4v1626687461144!5m2!1svi!2s" width="100%" height="360" allowfullscreen="allowfullscreen"></iframe></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; border-bottom: 1px solid #dddddd; vertical-align: top;">
                        <p><strong><span class="number-footer">2</span><span class="title-footer">PHÚC ANH 152&nbsp;TRẦN DUY HƯNG</span></strong></p>
                        <p>&nbsp; <br>&nbsp; &nbsp;<strong>* Địa chỉ</strong>: Số 152 Trần Duy Hưng,&nbsp;Cầu Giấy, Hà Nội</p>
                        <p>&nbsp; &nbsp;<strong>* Điện thoại</strong>: (024) 39.68.99.66 (ext 2)</p>
                        <p>&nbsp; &nbsp;<strong>* Thời gian làm việc</strong>: 8h00 - 21h00</p>
                        <p>&nbsp; &nbsp;<strong>* Quản lý cơ sở:</strong>&nbsp;Anh&nbsp;Trần Viết Mạnh</p>
                        <p>&nbsp; &nbsp; &nbsp; - Email: <a href="mailto:phucanh.thaiha@phucanh.com.vn">phucanh.tranduyhung@phucanh.com.vn</a></p>
                        <p>&nbsp; &nbsp; &nbsp; - Mobile: 039.688.9936</p>

                    </td>
                    <td style="width: 50%; border-bottom: 1px solid #ddd;">

                        <p><iframe style="border: 0; float: right;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232.78548928944025!2d105.7984525011463!3d21.009954042216457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca7247ba4db%3A0x7b8299b80fc526b5!2sPh%C3%BAc%20Anh%20Computer%20World!5e0!3m2!1svi!2s!4v1626689582383!5m2!1svi!2s" width="100%" height="360" allowfullscreen="allowfullscreen"></iframe></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; border-bottom: 1px solid #dddddd; vertical-align: top;">
                        <p>&nbsp;<strong><span class="number-footer">3</span><span class="title-footer">PHÚC ANH 134&nbsp;THÁI HÀ</span></strong></p>
                        <p>&nbsp; <br>&nbsp; &nbsp;<strong>* Địa chỉ</strong>: Số 134 Thái Hà, Đống Đa, Hà Nội</p>
                        <p>&nbsp; &nbsp;<strong>* Điện thoại</strong>: (024) 39.68.99.66 (ext 3)</p>
                        <p>&nbsp; &nbsp;<strong>* Thời gian làm việc</strong>: 8h00 - 21h00</p>
                        <p>&nbsp; &nbsp;<strong>* Quản lý cơ sở:</strong>&nbsp;Anh Nguyễn Xuân Thái</p>
                        <p>&nbsp; &nbsp; &nbsp; - Email: <a href="mailto:phucanh.tranduyhung@phucanh.com.vn">phucanh.thaiha@phucanh.com.vn</a></p>
                        <p>&nbsp; &nbsp; &nbsp; - Mobile: 086.550.5555</p>
                    </td>
                    <td style="width: 50%; border-bottom: 1px solid #ddd;">

                        <p><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d391.4914972309917!2d105.82107890692468!3d21.012038218474675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab534a6c9bc1%3A0x4ab60470210947cc!2sPh%C3%BAc%20Anh%20SmartWorld!5e0!3m2!1svi!2s!4v1626765495994!5m2!1svi!2s" width="100%" height="360" allowfullscreen="allowfullscreen"></iframe></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; border-bottom: 1px solid #dddddd; vertical-align: top;">
                        <p><strong><span class="number-footer">4</span><span class="title-footer">PHÚC ANH 141 PHẠM VĂN ĐỒNG</span></strong></p>
                        <p>&nbsp; <br>&nbsp; &nbsp;<strong>* Địa chỉ</strong>: Số 141 - 143 Phạm Văn Đồng, Cầu Giấy, Hà Nội</p>
                        <p>&nbsp; &nbsp;<strong>* Điện thoại</strong>: (024) 39689966 (ext 5)</p>
                        <p>&nbsp; &nbsp;<strong>* Thời gian làm việc</strong>: 8h00 - 21h00</p>
                        <p>&nbsp; &nbsp;<strong>* Quản lý cơ sở:</strong>&nbsp;Anh Lê Doãn Tuấn</p>
                        <p>&nbsp; &nbsp; &nbsp; - Email: <a href="mailto:phucanh.phamvandong@phucanh.com.vn">phucanh.phamvandong@phucanh.com.vn</a></p>
                        <p>&nbsp; &nbsp; &nbsp; - Mobile: 0946.83.6161&nbsp;</p>
                    </td>
                    <td style="width: 50%; border-bottom: 1px solid #ddd;">

                        <p><iframe style="border: 0; float: right;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d930.9221376143646!2d105.78042836383109!3d21.04514434857649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345561b67bebbb%3A0xbdf01afb8f719353!2sPh%C3%BAc%20Anh%20Smart%20World!5e0!3m2!1svi!2s!4v1626701322033!5m2!1svi!2s" width="100%" height="360" allowfullscreen="allowfullscreen"></iframe></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; border-bottom: 1px solid #dddddd; vertical-align: top;">
                        <p><strong><span class="title-footer">5PHÚC ANH 89 LÊ DUẨN</span></strong></p>
                        <p>&nbsp; &nbsp;<br><strong>&nbsp; &nbsp;* Địa chỉ</strong>: Số 89, Lê Duẩn, Cửa Nam, Hoàn Kiếm, Hà Nội</p>
                        <p>&nbsp; &nbsp;<strong>* Điện thoại</strong>: (024) 39.68.99.66 (ext 6)</p>
                        <p>&nbsp; &nbsp;<strong>* Thời gian làm việc</strong>: 8h00 - 21h00</p>
                        <p>&nbsp; &nbsp;<strong>* Quản lý cơ sở:</strong>&nbsp;Anh Lê Nhật Hoàng</p>
                        <p>&nbsp; &nbsp; &nbsp; - Email:&nbsp;<a href="mailto:phucanh.thaiha@phucanh.com.vn">phucanh.leduan@phucanh.com.vn</a></p>
                        <p>&nbsp; &nbsp; &nbsp; - Mobile: 0945.352.379</p>
                    </td>
                    <td style="width: 50%; border-bottom: 1px solid #ddd;">

                        <p><iframe style="border: 0; float: right;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.18333497964!2d105.83943211540226!3d21.025349093269533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abc2e3b4f2cb%3A0xd1ca4e678c137707!2sPh%C3%BAc%20Anh%20SmartWorld!5e0!3m2!1svi!2s!4v1651893973392!5m2!1svi!2s" width="100%" height="360" allowfullscreen="allowfullscreen"></iframe></p>
                    </td>
                </tr>
                </tbody>
            </table>




            <p style="text-align: center;"><strong><span style="font-size: 18pt;">LIÊN HỆ VỚI CÁC PHÒNG BAN</span></strong></p>
            <table class="contact-table" style="font-size: 11pt; width: 100%;" border="1">
                <tbody>
                <tr>
                    <td style="width: 50%; text-align: left; vertical-align: top;">
                        <p><span class="number-footer">1</span><span class="title-footer">PHÒNG BÁN HÀNG TRỰC TUYẾN<br></span></p>
                        <p><strong>&nbsp; <br>&nbsp; &nbsp;* Địa chỉ</strong>: Tầng 4,&nbsp;Số 89, Lê Duẩn, Cửa Nam, Hoàn Kiếm, Hà Nội</p>
                        <p><strong>&nbsp; &nbsp;* Tổng đài</strong>: 1900 2164 (Máy lẻ 1)&nbsp;<strong>Hoặc</strong>&nbsp;0974 55 88 11</p>
                        <p><strong>&nbsp; &nbsp;* Thời gian làm việc</strong>: 8h00 - 21h00</p>
                        <p><strong>&nbsp; &nbsp;* Trưởng phòng:</strong>&nbsp;Anh Nguyễn Tuấn Anh</p>
                        <p>&nbsp; &nbsp; &nbsp; - Email: banhangonline@phucanh.com.vn</p>
                        <p>&nbsp; &nbsp; &nbsp; - Mobile: 091.714.66.11</p>
                    </td>
                    <td style="width: 50%; border-bottom: none; text-align: left; vertical-align: top;">
                        <p><span class="number-footer">4</span><span class="title-footer">TRUNG TÂM BẢO HÀNH<br></span></p>
                        <p><strong>&nbsp; &nbsp;<br>&nbsp; &nbsp;* Địa chỉ:&nbsp;</strong>Tầng 4 số 134 Thái Hà, Đống Đa, Hà Nội</p>
                        <p><strong>&nbsp; &nbsp;*&nbsp;</strong>Để tạo điều kiện thuận lợi cho Quý khách hàng, Phúc Anh tiếp nhận và trả bảo hành tại tất cả các showroom.</p>
                        <p><strong>&nbsp; &nbsp;* Tổng đài</strong>: 1900 2173</p>
                        <p>&nbsp; &nbsp; &nbsp; - Yêu cầu dịch vụ: Máy lẻ&nbsp;2</p>
                        <p>&nbsp; &nbsp; &nbsp; - Tra cứu bảo hành: Máy lẻ&nbsp;1</p>
                        <p><strong>&nbsp; &nbsp;* Thời gian làm việc</strong>: Từ 8h00 - 17h30 (Thứ 2 - Thứ 7)</p>

                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; text-align: left; vertical-align: top;">
                        <p><span class="number-footer">2</span><span class="title-footer">PHÒNG DỰ ÁN VÀ KHÁCH HÀNG DOANH NGHIỆP</span></p>
                        <p><strong>&nbsp; &nbsp;<br>&nbsp; &nbsp;* Địa chỉ</strong>: Tầng 5, số 134 Thái Hà, Đống Đa, Hà Nội</p>
                        <p><strong>&nbsp; &nbsp;* Tổng đài</strong>: 1900 2164 (Máy lẻ 2)&nbsp;<strong>Hoặc</strong>:&nbsp;038 658 6699&nbsp;&nbsp;</p>
                        <p><strong>&nbsp; &nbsp;* Thời gian làm việc</strong>: 8h00 - 17h30 (Thứ 2 - Thứ 7)</p>
                        <p><strong>&nbsp; &nbsp;* Trưởng phòng:</strong>&nbsp;Anh Nguyễn Đăng Tân</p>
                        <p>&nbsp; &nbsp; &nbsp; - Email: kdda@phucanh.com.vn</p>
                        <p>&nbsp; &nbsp; &nbsp; - Mobile: 0917.922.022</p>
                    </td>
                    <td style="width: 50%; border-top: none; text-align: left; vertical-align: top;">
                        <p><span class="title-footer">HỖ TRỢ KỸ THUẬT</span></p>
                        <p><strong>&nbsp; <br>&nbsp; &nbsp;* Địa chỉ:&nbsp;</strong>Tại tất cả các showroom của Phúc Anh</p>
                        <p>&nbsp; &nbsp;*&nbsp;<strong>Tổng đài</strong>: 1900 2165</p>
                        <p>&nbsp; &nbsp;<strong>* Thời gian làm việc:&nbsp;</strong>8h00 -&nbsp;20h30</p>
                        <p>&nbsp; &nbsp;*&nbsp;<strong>Email</strong>:&nbsp;helpdesk@phucanh.com.vn</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <p><span class="number-footer">3</span><span class="title-footer">PHÒNG KINH DOANH PHÂN PHỐI</span></p>
                        <p><strong>&nbsp; &nbsp;<br>&nbsp; &nbsp;* Địa chỉ</strong>: Tầng 5, số 134 Thái Hà, Đống Đa, Hà Nội</p>
                        <p><strong>&nbsp; &nbsp;* Điện thoại</strong>: 0973.22.77.11</p>
                        <p><strong>&nbsp; &nbsp;* Thời gian làm việc</strong>: 8h00 - 17h30 (Thứ 2 - Thứ 7)</p>
                        <p><strong>&nbsp; &nbsp;* Trưởng phòng:&nbsp;</strong>Chị&nbsp;Nguyễn Đặng Quỳnh Anh</p>
                        <p>&nbsp; &nbsp;- Email: kdpp@phucanh.com.vn</p>
                        <p>&nbsp; &nbsp;- Mobile:&nbsp;093 222 6490</p>
                    </td>
                    <td style="width: 50%; vertical-align: top;">
                        <p><span class="number-footer">5</span><span class="title-footer">CHĂM SÓC KHÁCH HÀNG</span></p>
                        <p><strong>&nbsp; &nbsp;<br>&nbsp; &nbsp;* Tổng đài</strong>: 1900 2174</p>
                        <p><strong>&nbsp; &nbsp;* Hotline</strong>: 098 656 2424</p>
                        <p><strong>&nbsp; &nbsp;* Thời gian làm việc</strong>: 8h00 -&nbsp;20h30 (Trừ ngày lễ, tết)</p>
                        <p>&nbsp; &nbsp;<strong>* Email</strong>: ykienkhachhang@phucanh.com.vn</p>
                    </td>
                </tr>
                </tbody>
            </table></div>
    </div>
@endsection
