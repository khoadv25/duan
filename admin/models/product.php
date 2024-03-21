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
            categories.name AS category_name, 
            product.thumbnail, 
            product_detail.quantity, 
            product_detail.price, 
            size.name AS size_name, 
            color.name AS color_name, 
            image.image_url AS image_name
        FROM 
            product
        JOIN 
            brand ON brand.id = product.brand_id 
        JOIN 
            product_detail ON product_detail.product_id = product.id
        JOIN 
            size ON size.id = product_detail.size_id
        JOIN 
            color ON color.id = product_detail.color_id
        JOIN 
            image ON image.id = product_detail.image_id
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



