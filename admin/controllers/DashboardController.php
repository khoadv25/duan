<?php

function dashboard()
{

    $view = 'dashboard';
    $script = 'dashboard';
    $doanhThuNgay = doanhThuTheoNgay();
    $totalDoanhThuNgay = 0; // Khởi tạo biến tổng doanh thu

    foreach ($doanhThuNgay as $row) {
        $totalDoanhThuNgay += $row['total']; // Tổng hợp doanh thu từ mỗi đơn hàng
    }


    $doanhThuThang = doanhThuTheoThang();
    // debug($doanhThuThang);
    $totalDoanhThuThang = 0;
    foreach ($doanhThuThang as $row) {
        $totalDoanhThuThang += $row['total']; // Tổng hợp doanh thu từ mỗi đơn hàng
    }


    $user = tongUser();


    $bill = tongBill();


    $donHangChuaXacNhan = donHangChoSuLi();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
