<?php

function cartAdd($productID,$quantity = 0){
    
    // lấy ra user_id theo session
    $userID = $_SESSION['user']['id'];

    $product = showOneProductDetail($productID);

    // 
    $cartUserAndProduct = showCart($userID,$productID);

    if (!$cartUserAndProduct) {
        
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
    if (isset($_SESSION['user']['id'])) {
        $userID = $_SESSION['user']['id'];  
    }
    $cartUserID = showCartUserID($userID);
    
    $view = 'client/cart';
    require_once PATH_VIEW . 'home.php';
}

function cartInc($cartID){
    
    $cart = showOne('cart',$cartID);
    $quantity = $cart['quantity'];
    $quantity += 1;
    updateQuantityBycartID($cartID,$quantity);
    header('location:' .BASE_URL . '?act=cart-list');

}

function cartDes($cartID){
    $cart = showOne('cart',$cartID);
    $quantity = $cart['quantity'];
    $quantity -= 1;
    updateQuantityBycartID($cartID,$quantity);
    header('location:' .BASE_URL . '?act=cart-list');

}


function deleteCartByCartID($cartID){
    delete2('cart',$cartID);
    header('location:' .BASE_URL . '?act=cart-list');

}