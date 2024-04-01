<?php


function productDetailClient($id,$dungluong) {
    
    $view = 'client/productDetail';

    $product = showProductOne($id);
    $idDetail = $product['id'];
    $idCate = $product['category_id'];
    $productDetail = showProductDetail($idDetail,$dungluong);

    $allProductDetail = showALLDetail($idDetail);

    $productCate = showProductCate($idCate);
    require_once PATH_VIEW . 'home.php';
}


// function proDungLuong($dungluong) {
//     $view = 'client/productDetail';
//     $id = $_GET['id'];
//     $dungluong = $_GET['dungluong'];

//     productDetailClient($id);
//     $productDetail = showProductDetail($id,$dungluong);
//     require_once PATH_VIEW . 'home.php';
// }