<?php


function tongQuat()
{
    $view = 'thongke/index';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Kiểm tra xem ngày đã chọn có tồn tại không
        if (isset($_POST['star_date'])) {
            // Lấy ngày đã chọn từ biểu mẫu
            $star_date = $_POST['star_date'];
            $end_date = $_POST['end_date'];
    
            // Thực hiện truy vấn để lấy các đơn hàng theo ngày đã chọn
            $donHangTheoNgay = getDonHangByDateRange($star_date,$end_date);
        } else {
            // Nếu không có ngày được chọn, lấy tất cả các đơn hàng
            $donHangTheoNgay = showDonHang();
        }
    } else {
        // Nếu không có phương thức POST được gửi, mặc định là hiển thị tất cả các đơn hàng
        $donHangTheoNgay = showDonHang();
    }
    
    $totalRevenue = 0;
    foreach ($donHangTheoNgay as $item) {
        // Tính tổng từ các mục trong danh sách
        $totalRevenue += $item['total_money'];
    }
    // debug($totalRevenue);
    
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function doanhthu()
{
    $view = 'thongke/doanhthu';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
