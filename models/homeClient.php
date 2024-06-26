<?php



if (!function_exists('showListpro')) {
    function showListpro()
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
                product.category_id AS product_category_id, 
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
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showAllProduct')) {
    function showAllProduct()
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
                product.category_id AS product_category_id, 
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
           ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showAllProducByName')) {
    function showAllProducByName($search)
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
                product.category_id AS product_category_id, 
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
            WHERE  product.name LIKE :search";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $searchTerm = '%' . $search . '%';
            $stmt->bindParam(':search', $searchTerm);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showAllProducByPrice')) {
    function showAllProducByPrice($min,$max)
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
                product.category_id AS product_category_id, 
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
                WHERE product_detail.price BETWEEN :min_value AND :max_value";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':min_value', $min);
            $stmt->bindParam(':max_value', $max);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showProductDetailByCate')) {
    function showProductDetailByCate($cate)
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
                product.category_id AS product_category_id, 
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
                product.category_id = :category_id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':category_id',$cate);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('showProductDetailByCateHome')) {
    function showProductDetailByCateHome($cate)
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
                product.category_id AS product_category_id, 
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
                product.category_id = :category_id LIMIT 3 ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':category_id',$cate);
            $stmt->execute();

            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}