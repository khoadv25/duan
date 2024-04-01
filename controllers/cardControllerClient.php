<?php

function cartAdd($productID,$quantity = 0){
    
    // lấy ra user_id theo session
    $userID = $_SESSION['user']['id'];

    $product = showOneProductDetail($productID);

    // 

    if (!isset($_SESSION['cart'][$productID])) {
        
        $_SESSION['cart'][$productID] = $product;
        // echo '<pre>';
        // print_r($_SESSION);
        // die;
        $_SESSION['cart'][$productID]['quantity'] = $quantity ;
        $data = [
            'user_id' =>  $userID,
            'product_id' => $productID,
            'quantity' => $quantity,
        ];
        insert('cart',$data);
    }else{
        
        $soluong = $_SESSION['cart'][$productID]['quantity'] += $quantity;
        // echo '<pre>';
        // print_r($soluong);
        // die;
        updateQuantity($userID,$productID,$soluong);

        
    }
    header('location:' .BASE_URL . '?act=cart-list');
}


function cartList(){
    // debug($_SESSION['cart']);
    // lấy ra user_id ở session
    // rồi truy vấn đến cart where user_id
    // lấy dữ liểu trả về fetchAll
    $view = 'client/cart';
    require_once PATH_VIEW . 'home.php';
}