<?php 

session_start();

// Require file trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

// Điều hướng
$act = $_GET['act'] ?? '/';
middleware_auth_check($act);

match($act) {
    '/' => dashboard(),
    // login & logout
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),

    // CRUD User
    'users' => userListAll(),
    'user-detail' => userShowOne($_GET['id']),
    'user-create' => userCreate(),
    'user-update' => userUpdate($_GET['id']),
    'user-delete' => userDelete($_GET['id']),

    // CRUD Category
    'categories' => categoryListAll(),
    'category-detail' => categoryShowOne($_GET['id']),
    'category-create' => categoryCreate(),
    'category-update' => categoryUpdate($_GET['id']),
    'category-delete' => categoryDelete($_GET['id']),

    // CRUD product
    'product' => productsListAll(),
    'product-detail' => productShowOne($_GET['id']),
    'product-create' => productCreate(),
    'product-update' => productUpdate($_GET['id']),
    'product-delete' => productDelete($_GET['id']),


    // CRUD product
    'product-s' => productsDetailListAll($_GET['id']),
    // 'product-s-detail' => productsDetailShowOne($_GET['id']),
    'product-s-create' => productsDetailCreate(),
    'product-s-update' => productsDetailUpdate($_GET['id']),
    'product-s-delete' => productsDetailtDelete($_GET['id']),


    // CRUD size
    'size' => sizeListAll(),
    'size-detail' => sizeShowOne($_GET['id']),
    'size-create' => sizeCreate(),
    'size-update' => sizeUpdate($_GET['id']),
    'size-delete' => sizeDelete($_GET['id']),

    // CRUD brand
    'brand' => brandListAll(),
    'brand-detail' => brandShowOne($_GET['id']),
    'brand-create' => brandCreate(),
    'brand-update' => brandUpdate($_GET['id']),
    'brand-delete' => brandDelete($_GET['id']),

    // CRUD color
    'color' => colorListAll(),
    'color-detail' => colorShowOne($_GET['id']),
    'color-create' => colorCreate(),
    'color-update' => colorUpdate($_GET['id']),
    'color-delete' => colorDelete($_GET['id']),
    
    // CRUD donhang
    'donhang' => listAllDonHang(),
    'donhang-detail' => detailDonHang($_GET['id']),
    'donhang-active' => activeDon($_GET['id']),
    // thong ke
    'thongke' => tongQuat(),



};

require_once '../commons/disconnect-db.php';