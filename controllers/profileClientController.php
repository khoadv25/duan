<?php

function thongTinUser(){
    $view = "client/profile";
    $main = "client/user/thongtintaikhoan";
    $cate = listAll('categories');
    $user = $_SESSION['user'];
    require_once PATH_VIEW . 'home.php';
}

function donHangUserClient() {
    $view = "client/profile";
    $cate = listAll('categories');
    $main = "client/user/lichsudonhang";
    $title = "Lịch sử đơn hàng";
    $UserID = $_SESSION['user']['id'];
    $trangthai = listAll('status_bill');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['status'])) {
            $status_id = $_POST['status'];
            $billUser = showBillUserByStatus($status_id);
        } else {
            $billUser = showBillUser($UserID);

        }
    } else {
        $billUser = showBillUser($UserID);

    }
    require_once PATH_VIEW . 'home.php';

}

function detailDonHangUserClient($id){
    $view = "client/profile";
    $cate = listAll('categories');
    $main = "client/user/chitietdonhang";

    $title = 'Chi Tiết Đơn Hàng';
    $detail = chiTietDonHang($id);
    // debug($detail);
    require_once PATH_VIEW . 'home.php';


}

function huyDon($id){
    $UserID = $_SESSION['user']['id'];
    huyDOnHangByStatus($id,$UserID);
    header("location:" . BASE_URL . '?act=lichsudonhang');
}