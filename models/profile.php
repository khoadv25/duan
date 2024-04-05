<?php

if (!function_exists('showBillUser')) {
    function showBillUser($userID)
    {
        try {
            $sql = "SELECT bill.*, status_bill.status_name
                    FROM bill
                    JOIN status_bill ON status_bill.id = bill.status_id
                    WHERE user_id = :user_id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":user_id", $userID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('chiTietDonHang')) {
    function chiTietDonHang($id)
    {
        try {
            $sql = "SELECT 
                bill_detail.quantity,
                bill.id,
                bill.status_id,
                bill.ma_bill,
                status_bill.status_name,
                product_detail.price,
                color.name as mau_name,
                size.name as size_name,
                image.image_url,
                product.name
            FROM 
                bill_detail
            JOIN 
                bill ON bill_detail.bill_id = bill.id
            JOIN 
                users ON bill.user_id = users.id
            JOIN 
                status_bill ON bill.status_id = status_bill.id
            JOIN
                product_detail ON bill_detail.product_id = product_detail.id
            JOIN
                color ON product_detail.color_id = color.id
            JOIN
                size ON product_detail.size_id = size.id
            JOIN
                image ON product_detail.image_id = image.id
            JOIN
                product ON product_detail.product_id = product.id
            WHERE bill_id = :bill_id
            ORDER BY 
                bill_detail.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':bill_id',$id);
            $stmt->execute();
            
            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('huyDOnHangByStatus')) {
    function huyDOnHangByStatus($id,$userID)
    {
        try {
            $sql = " UPDATE bill SET status_id = 6
                    WHERE user_id = :user_id
                    ANd id =:id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":user_id", $userID);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}