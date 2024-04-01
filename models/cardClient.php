<?php

// function cartAdd(){
    
// }

function updateQuantity($userID, $productID, $quantity){
    try {
        $sql = "UPDATE cart
                SET quantity = :quantity 
                WHERE user_id = :userID
                AND product_id = :productID";
        
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":userID", $userID);
        $stmt->bindParam(":productID", $productID); // Sử dụng tên tham số đúng
        $stmt->bindParam(":quantity", $quantity);

        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}
