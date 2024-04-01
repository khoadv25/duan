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
];

middleware_auth_check_client($act, $authenRoute);



match ($act) {
    '/' =>  homeIndex(),

    'login' => authenShowFormLoginClient(),
    'logout' => authenLogoutUser(),

    'chitiet' => productDetailClient($_GET['id'], $dungluong = isset($_GET['dungluong']) ? $_GET['dungluong'] : 2),
    'cart-add' => cartAdd($_GET['productID'], $_GET['quantity']),
    'cart-list' => cartList(),
    'cart-inc' => cartAdd($_GET['id'], $_GET['user']),
    'cart-des' => cartAdd($_GET['id'], $_GET['user']),
    'cart-del' => cartAdd($_GET['id'], $_GET['user']),
};

require_once './commons/disconnect-db.php';
