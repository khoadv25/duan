<?php 

function homeIndex() {
    $product = listAll('product');
    $view = 'client/index';
    require_once PATH_VIEW . 'home.php';
}



function homeLogin() {
    // $product = listAll('product');
    $view = 'client/login';

    require_once PATH_VIEW . 'home.php';
}


