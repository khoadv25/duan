<?php


// lấy dữ liệu join

if (!function_exists('showList')) {
    function showList($tableName) {
        try {
            $sql = "SELECT 
            product.id, 
            product.description, 
            product.name AS product_name, 
            brand.name AS brand_name, 
            product.brand_id , 
            categories.name AS category_name, 
            product.category_id , 
            product.thumbnail
        FROM 
            product
        JOIN 
            brand ON brand.id = product.brand_id 

        JOIN 
            categories ON categories.id = product.category_id
        ORDER BY 
            product.id DESC";


            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}



if (!function_exists('showUp')) {
    function showUp($tableName, $id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}