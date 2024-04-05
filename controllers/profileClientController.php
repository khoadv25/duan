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
    $billUser = showBillUser($UserID);
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