<?php

if (!function_exists('showDetail')) {
    function showDetail($tableName, $id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE product_id  = :id ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showBienThe')) {
    function showBienThe($id)
    {
        try {
            $sql = "SELECT 
                product_detail.id,
                product_detail.product_id,
                product.name AS product_name,
                product.thumbnail AS image_product,
                size.name AS size_name,
                product_detail.quantity,
                color.name AS color_name,
                product_detail.price,
                image.image_url,
                product_detail.sale
            FROM 
                product_detail
            JOIN 
                product ON product.id = product_detail.product_id
            JOIN 
                size ON size.id = product_detail.size_id
            JOIN 
                color ON color.id = product_detail.color_id
            JOIN 
                image ON image.id = product_detail.image_id
            WHERE 
                product_detail.product_id = :id
            ORDER BY 
                product_detail.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}