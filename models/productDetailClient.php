<?php

if (!function_exists('showProductDetail')) {
    function showProductDetail($id, $size)
    {
        try {
            $sql = "SELECT 
                product_detail.id,
                product_detail.product_id,
                product_detail.size_id,
                size.name AS size_name,
                product_detail.quantity,
                product_detail.color_id,
                color.name AS color_name,
                product_detail.price,
                product_detail.image_id,
                image.image_url,
                product_detail.sale
            FROM 
                product_detail

                
            JOIN 
                size ON size.id = product_detail.size_id
            JOIN 
                color ON color.id = product_detail.color_id
            JOIN 
                image ON image.id = product_detail.image_id
            WHERE 
                product_detail.product_id = :id AND product_detail.size_id = :size";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":size", $size);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showALLDetail')) {
    function showALLDetail($id)
    {
        try {
            $sql = "SELECT 
                product_detail.id,
                product_detail.product_id,
                product_detail.size_id,
                size.name AS size_name,
                product_detail.quantity,
                product_detail.color_id,
                color.name AS color_name,
                product_detail.price,
                product_detail.image_id,
                image.image_url,
                product_detail.sale
            FROM 
                product_detail

                
            JOIN 
                size ON size.id = product_detail.size_id
            JOIN 
                color ON color.id = product_detail.color_id
            JOIN 
                image ON image.id = product_detail.image_id
            WHERE 
                product_detail.product_id = :id ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}





if (!function_exists('showOneProductDetail')) {
    function showOneProductDetail($id)
    {
        try {
            $sql = "SELECT 
                product_detail.id AS product_detail_id,
                product_detail.product_id,
                product_detail.size_id,
                size.name AS size_name,
                product_detail.quantity,
                product_detail.color_id,
                color.name AS color_name,
                product_detail.price,
                product_detail.image_id,
                image.image_url,
                product_detail.sale,
                product.id AS product_id, 
                product.description, 
                product.name AS product_name, 
                brand.name AS brand_name, 
                product.brand_id , 
                categories.name AS category_name, 
                product.category_id , 
                product.thumbnail
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
            JOIN 
                brand ON brand.id = product.brand_id
            JOIN 
                categories ON categories.id = product.category_id
            WHERE 
                product_detail.id = :id ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
