<?php

function homeIndex()
{
    $product = showListpro();
    $cate = listAll('categories');

    $view = 'client/index';

    $productByCate = showProductDetailByCate(2);
    $iphone = showProductDetailByCateHome(2);
    $samsung = showProductDetailByCateHome(1);
    $oppo = showProductDetailByCateHome(3);
    $xiaomi = showProductDetailByCateHome(8);
    // debug($productByCate);
    require_once PATH_VIEW . 'home.php';
}



function homeLogin()
{
    // $product = listAll('product');
    $view = 'client/login';

    require_once PATH_VIEW . 'home.php';
}


function allProduct()
{
    $view = 'client/listproduct';
    $cate = listAll('categories');
    $productAll = showAllProduct();


        if (isset($_POST['searchpro'])) {
            $search = $_POST['searchpro'];
            $productAll = showAllProducByName($search);
        } elseif (isset($_POST['price-range'])) {
            // Chuỗi giá trị
            $string = $_POST['price-range'];
            
            // Loại bỏ ký tự không cần thiết và dấu cách
            $string = str_replace(array('$', ' '), '', $string);

            // Tách chuỗi thành giá trị tối thiểu và tối đa
            $values = explode('-', $string);

            // Lấy giá trị tối thiểu và tối đa
            $min_value = intval($values[0]); // int(22894)
            $max_value = intval($values[1]); // int(100000)

            $productAll = showAllProducByPrice($min_value, $max_value);
        } else {
            $productAll = showAllProduct();
        }

    require_once PATH_VIEW . 'home.php';
}


function dsspByCate($id)
{
    $view = 'client/productByCate';
    $cate = listAll('categories');

    $dsspBycate = showProductDetailByCate($id);
    require_once PATH_VIEW . 'home.php';
}
