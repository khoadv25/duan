<?php 

function homeIndex() {
    $product = listAll('product');
    $cate = listAll('categories');
    $view = 'client/index';
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
    
    $dsspBycate = showSpByCate($id);
    require_once PATH_VIEW . 'home.php';
}




