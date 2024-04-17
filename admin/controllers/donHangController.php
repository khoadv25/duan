<?php

function listAllDonHang()
{
    $view = 'donhang/index';
    $title = 'Danh sách Đơn Hàng';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['status'])) {
            $status_id = $_POST['status'];
            $listAllDonHang = showDonHangByStatus($status_id);
        } else {
            $listAllDonHang = showDonHang();
        }
    } else {
        $listAllDonHang = showDonHang();
    }
    $trangthai = listAll('status_bill');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function detailDonHang($id)
{
    $view = 'donhang/show';
    $title = 'Chi Tiết Đơn Hàng';
    $detail = showDetailDonHang($id);
    // debug($detail);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function activeDon($id)
{
    $detail = showDetailDonHang($id);
    foreach ($detail as $dt) {
        if ($dt['status_id'] < 5) {
            activeDonHang($id);
        }
    }
    
    header("location:" . BASE_URL_ADMIN . "?act=donhang");
    exit;
}
