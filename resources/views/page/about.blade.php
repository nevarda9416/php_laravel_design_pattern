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
                    <span itemprop="title">Giới thiệu</span>
                </a>
            </div>
        </div><!--breadcrumb-->
        <div class="line"></div>
        <div class="clear"></div>
        <h1>Giới thiệu</h1>
        <div class="nd"><p style="line-height: 1.38; text-align: center; margin-top: 9pt; margin-bottom: 9pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">GIỚI THIỆU CÔNG TY</span></strong></p>

            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Tên công ty</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">: Công ty TNHH Kỹ Nghệ NIIT-ICT Hà Nội</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Tên giao dịch viết tắt</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">: Phuc Anh Co., Ltd</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Địa chỉ đăng ký kinh doanh</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">: 152 - 154 Trần Duy Hưng, Cầu Giấy, Hà Nội.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Văn phòng giao dịch</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">: 15 Xã Đàn, Đống Đa, Hà Nội</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Lĩnh vực hoạt động kinh doanh</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">: Cung cấp sản phẩm điện thoại, máy tính, linh kiện máy tính, thiết bị văn phòng phần mềm và các giải pháp ứng dụng công nghệ.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Giới thiệu chung về NIIT-ICT Hà Nội</span></strong></p>
            <p style="line-height: 1.38; text-indent: 36pt; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Công ty TNHH Kỹ Nghệ NIIT-ICT Hà Nội (tên viết tắt: PhucAnh Co., Ltd) được thành lập ngày 08/08/2000. Cùng tinh thần phục vụ tận tụy, luôn lấy khách hàng làm trung tâm, </span><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">NIIT-ICT Hà Nội</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> đã từng bước khẳng định và tạo sự tín nhiệm trong lòng khách hàng, trở thành một trong những công ty cung cấp các sản phẩm máy tính, thiết bị kỹ thuật số, thiết bị văn phòng và các giải pháp ứng dụng công nghệ chuyên nghiệp nhất.</span></p>
            <p style="line-height: 1.38; margin-top: 9pt; margin-bottom: 0pt; text-align: center;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><img src="/media/about/2012_Capture.JPG" alt=""></span></p>
            <p style="line-height: 1.38; text-indent: 36pt; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Với gần 20 năm kinh nghiệm chuyên sâu trong lĩnh vực cung cấp điện thoại, máy tính, linh kiện, thiết bị văn phòng và các giải pháp công nghệ, chúng tôi tự hào mang đến những sản phẩm chất lượng nhất đáp ứng mọi nhu cầu của khách hàng</span></p>
            <p style="line-height: 1.38; text-indent: 36pt; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Thế mạnh làm nên vị thế. Ưu điểm của NIIT-ICT Hà Nội không chỉ dừng lại ở sản phẩm chính hãng chất lượng cao, sự chuyên môn hóa trong từng bộ phận mà còn là tính trách nhiệm cao, sự quản lý chuyên nghiệp cùng đội ngũ hỗ trợ kỹ thuật lành nghề, phục vụ tận tâm, uy tín, giá thành hợp lý góp phần tối đa hóa mang lại sự hài lòng cho mọi khách hàng.</span></p>
            <p style="line-height: 1.38; text-indent: 36pt; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Với danh tiếng và uy tín của mình, NIIT-ICT Hà Nội đã thành công trong việc đưa những sản phẩm chất lượng nhất từ những tập đoàn công nghệ hàng đầu thế giới như INTEL, SONY, MICROSOFT, APPLE, SAMSUNG, DELL, LG,... đến với khách hàng thông qua hệ thống showroom hiện đại, chuyên nghiệp khắp Hà Nội.</span></p>
            <p style="line-height: 1.38; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">- </span><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Showroom thứ 1</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> tại 15 Xã Đàn, Đống Đa, Hà Nội.</span></p>
            <p style="line-height: 1.38; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">- </span><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Showroom thứ 2</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> tại 134 Thái Hà, Đống Đa, Hà Nội.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">- </span><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Showroom thứ 3</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> tại 152-154 Trần Duy Hưng, Cầu Giấy, Hà Nội.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">- </span><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Showroom thứ 4 </span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">tại 141-143 Phạm Văn Đồng, Cầu Giấy, Hà Nội.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">- <strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Showroom thứ 5 </span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">tại 89 Lê Duẩn, Cửa Nam, Hoàn Kiếm, Hà Nội.</span></span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">- Phòng bán hàng trực tuyến</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> tại tầng 4, 89 Lê Duẩn, Cửa Nam, Hoàn Kiếm, Hà Nội.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">- Phòng bán hàng dự án &amp; Doanh nghiệp</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> tại tầng 5, tòa nhà 134 Thái Hà, Đống Đa, Hà Nội.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">-</span><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> Phòng kinh doanh phân phối</span></strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> tại tầng 5, tòa nhà 134 Thái Hà, Đống Đa, Hà Nội.</span></p>
            <p style="line-height: 1.38; text-align: justify; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Bên cạnh hệ thống showroom, Công ty NIIT-ICT Hà Nội đã xây dựng một hệ thống bán hàng trực tuyến trên website</span> <a style="text-decoration: none;" href="http://www.phucanh.vn/"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #0000ff; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: underline; -webkit-text-decoration-skip: none; text-decoration-skip-ink: none; vertical-align: baseline; white-space: pre-wrap;">www.phucanh.vn</span></a><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> giúp khách hàng có thể lựa chọn sản phẩm, mua hàng nhanh chóng và thuận tiện ngay tại nhà hoặc văn phòng làm việc.</span></p>
            <p style="line-height: 1.38; text-indent: 36pt; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">NIIT-ICT Hà Nội luôn sẵn sàng hỗ trợ Quý khách hàng trong mọi tình huống với các chính sách dịch vụ mang lại nhiều lợi ích cho khách hàng như miễn phí vận chuyển, bảo hành 1 đổi 1(*), bảo hành, bảo trì tại nơi sử dụng, thời gian bảo hành dài lên tới 36 tháng. Cùng với đội ngũ hơn 300 nhân viên có trình độ cao, phong cách phục vụ chuyên nghiệp và tận tâm, chúng tôi tin chắc rằng khách hàng sẽ có&nbsp; những trải nghiệm vô cùng thú vị khi đến với NIIT-ICT Hà Nội..</span></p>
            <p style="line-height: 1.38; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Quan điểm kinh doanh của NIIT-ICT Hà Nội</span></strong></p>
            <p style="line-height: 1.38; text-indent: 36pt; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Chúng tôi luôn đặt lợi ích của khách hàng lên hàng đầu với phương châm làm việc: “Sự hài lòng của Quý khách chính là thành công của chúng tôi”.</span></p>
            <p style="line-height: 1.38; text-indent: 36pt; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">NIIT-ICT Hà Nội luôn sẵn sàng tiếp nhận và biết ơn mọi ý kiến phản hồi của khách hàng, không ngừng nâng cao chất lượng dịch vụ để mang đến cho khách hàng những trải nghiệm tốt nhất.</span></p>
            <p style="line-height: 1.38; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Cam kết về chất lượng dịch vụ bán hàng</span></strong></p>
            <ul style="margin-top: 0; margin-bottom: 0;">
                <ul style="margin-top: 0; margin-bottom: 0;">
                    <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">NIIT-ICT Hà Nội cam kết chỉ bán hàng chính hãng đúng tiêu chuẩn chất lượng của nhà sản xuất, không bán hàng giả hàng nhái, hàng không rõ xuất xứ</span></li>
                    <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Cung cấp đa dạng các thiết bị, giải pháp công nghệ, không ngừng đổi mới tối ưu mọi nhu cầu của khách hàng</span></li>
                </ul>
            </ul>

            <ul>
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Đáp ứng được những yêu cầu đa dạng của khách hàng về chất lượng và cả số lượng, trong thời gian ngắn nhất</span></strong></li>
            </ul>

            <ul style="margin-top: 0; margin-bottom: 0;">
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Đội ngũ tư vấn nhiệt tình và miễn phí cho Quý khách hàng về các sản phẩm và dịch vụ của chúng tôi.</span></li>
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Mọi sản phẩm công ty chúng tôi cung cấp đều được đi kèm với nhiều ưu đãi và chế độ bảo hành ấn tượng</span></li>
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Sẵn sàng chịu trách nhiệm và xử lý đến cùng với các thiếu sót của công ty trong quá trình bán hàng</span></li>
            </ul>
            <p><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Chính sách Bán hàng và Bảo hành của NIIT-ICT Hà Nội</span></strong></span></p>
            <ul style="margin-top: 0; margin-bottom: 0;">
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="color: #0000ff;"><a style="color: #0000ff;" title="Chính sách mua trả góp." href="{{url('/page/chinh-sach-mua-tra-gop')}}>Mua hàng trả góp lãi suất 0%</a></span></li>
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="color: #0000ff;"><a style="color: #0000ff;" title="Chính sách vận chuyển." href="{{url('/page/van-chuyen-giao-nhan-hang-hoa.html')}}>Giao hàng nhanh 2h và miễn phí giao hàng 500.000 vnđ.</a></span></li>
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="color: #0000ff;"><a style="color: #0000ff;" title="Chính sách ưu đãi cho Doanh nghiệp." href="{{url('/page/chinh-sach-uu-dai-cho-khach-hang-doanh-nghiep.html')}}>Nhiều ưu đãi vàng dành cho Doanh nghiệp.</a></span></li>
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="color: #0000ff;"><a style="color: #0000ff;" title="Chính sách đổi trả." href="{{url('/page/chinh-sach-doi-tra-san-pham')}}>Đổi mới sản phẩm lên đến 30 ngày</a></span></li>
                <li style="list-style-type: disc; font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;"><span style="color: #0000ff;"><a style="color: #0000ff;" title="Chính sách Bảo hành." href="{{url('/page/chinh-sach-bao-hanh')}}>Dịch vụ bảo hành chuyên nghiệp, uy tín. </a></span></li>
            </ul>

            <p style="line-height: 1.38; text-indent: 36pt; text-align: center; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">NIIT-ICT Hà Nội - NGƯỜI BẠN ĐỒNG HÀNH ĐÁNG TIN CẬY</span></strong></p>

            <p style="line-height: 1.38; text-align: right; margin-top: 9pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Trân trọng&nbsp;</span></p>
            <p style="line-height: 1.38; text-align: right; margin-top: 9pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: 'Times New Roman'; color: #000000; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">NIIT-ICT Hà Nội Smart World</span></strong></p>
        </div>
    </div>
@endsection
