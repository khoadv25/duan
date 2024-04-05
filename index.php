<?php
session_start();
// Require file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);


// Điều hướng
$act = $_GET['act'] ?? '/';
$authenRoute = [
    'login',
    'cart-add',
    'cart-list',
    'cart-inc',
    'cart-des',
    'cart-del',
    'checkout',
    'oder',
    'donhang',
    'checkttMomo',
];

middleware_auth_check_client($act, $authenRoute);



match ($act) {
    '/' =>  homeIndex(),

    'login' => authenShowFormLoginClient(),
    'logout' => authenLogoutUser(),
    'register' => register(),
    'resetpassword' => resetPass(),
    'veriUser' => veriUser(),
    'veriRessetPassword' => veriResetPassword(),

    'dsspdm' => dsspByCate($_GET['cateID']),

    // list-cart
    'chitiet' => productDetailClient($_GET['id'], $dungluong = isset($_GET['dungluong']) ? $_GET['dungluong'] : 2),
    'cart-add' => cartAdd($_GET['productID'], $_GET['quantity']),
    'cart-list' => cartList(),
    'cart-inc' => cartInc($_GET['cartID']),
    'cart-des' => cartDes($_GET['cartID']),
    'cart-del' => deleteCartByCartID($_GET['cartID']),

    'checkout' => checkout(),
    // 'guimail' => checkmail(),
    'oder' => oderTrucTiep(),
    'donhang' => allDonHang(),
    'checkttMomo' => checkttMomo($_GET['resultCode']),
    
    /// profile
    'profile' => thongTinUser(),
    'changepassword' => thongTinUser(),
    'lichsudonhang' => donHangUserClient(),
    'chitietdonhang' => detailDonHangUserClient($_GET['id']),
    'huydon' => huyDon($_GET['id']),
};

require_once './commons/disconnect-db.php';
