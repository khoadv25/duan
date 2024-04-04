<?php

// function cartAdd(){

// }

function updateQuantity($userID, $productID, $quantity)
{
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



function showCart($userID, $productID)
{
    try {
        $sql = "SELECT * FROM cart
                WHERE user_id = :userID
                AND product_id = :productID";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":userID", $userID);
        $stmt->bindParam(":productID", $productID); // Sử dụng tên tham số đúng
        // $stmt->bindParam(":quantity", $quantity);

        $stmt->execute();
        return $stmt->fetch();
    } catch (\Exception $e) {
        debug($e);
    }
}

function showCartUserID($userID)
{
    try {
        $sql = "SELECT
            cart.id AS cart_id,
            cart.quantity AS cart_quantity,
            cart.product_id,
            product_detail.id AS product_detail_id,
            product_detail.size_id,
            size.name,
            product_detail.quantity AS product_quantity,
            product_detail.color_id,
            color.name,
            product_detail.price AS product_price,
            product_detail.image_id AS product_detail_image_id,
            image.image_url,
            product.id AS product_detail_product_id,
            product_detail.sale as product_detail_sale,
            product.description AS product_description,
            product.name AS product_name,
            product.brand_id AS brand_id,
            brand.name AS brand_name,
            product.category_id AS category_id,
            categories.name AS category_name,
            product.thumbnail AS thumbnail
        FROM
            cart
        JOIN
            product_detail ON cart.product_id = product_detail.id
        JOIN
            size ON product_detail.size_id = size.id
        JOIN
            color ON product_detail.color_id = color.id
        JOIN
            image ON product_detail.image_id = image.id
        JOIN
            product ON product_detail.product_id = product.id
        JOIN
            brand ON product.brand_id = brand.id
        JOIN
            categories ON product.category_id = categories.id
        WHERE
            cart.user_id = :userID";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":userID", $userID);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}



if (!function_exists('updateQuantityBycartID')) {
    function updateQuantityBycartID($cartID,$quantity) {
        try {
            $sql = "UPDATE cart SET quantity = :quantity WHERE id = :id";
            
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $cartID);
            $stmt->bindParam(":quantity", $quantity);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
