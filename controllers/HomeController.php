<?php 

function homeIndex() {
    $product = showListpro();
    $cate = listAll('categories');
    
    $view = 'client/index';
    
    $productByCate =showProductDetailByCate(2) ;
    // debug($productByCate);
    require_once PATH_VIEW . 'home.php';
}



function homeLogin() {
    // $product = listAll('product');
    $view = 'client/login'; 
    
    require_once PATH_VIEW . 'home.php';
}



function dsspByCate($id){
    $view = 'client/productByCate';
    $cate = listAll('categories');
    
    $dsspBycate = showProductDetailByCate($id);
    require_once PATH_VIEW . 'home.php';
}




