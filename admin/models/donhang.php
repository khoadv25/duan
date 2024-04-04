<?php


if (!function_exists('showDonHang')) {
    function showDonHang()
    {
        try {
            $sql = "SELECT 
                bill.id,
                bill.user_id,
                bill.order_date,
                bill.address,
                bill.total_money,
                bill.status,
                bill.reciver,
                bill.payment_id,
                bill.id_voucher,
                bill.note,
                bill.status_id,
                bill.full_name,
                bill.ma_bill,
                bill.phone,
                users.email as email_user,
                status_bill.status_name

            FROM 
                bill
            JOIN 
                users ON bill.user_id = users.id
            JOIN 
                status_bill ON bill.status_id = status_bill.id
            ORDER BY 
                bill.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả các dòng dữ liệu
        } catch (\Exception $e) {
            debug($e);
        }
    }
}



if (!function_exists('showDetailDonHang')) {
    function showDetailDonHang($id)
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

if (!function_exists('activeDonHang')) {
    function activeDonHang($id)
    {
        try {

            $soluong = getStatusId($id);
            $int = 1;
            if ($soluong == 5) {
                $int = 0;
            }
            
            $sql = "UPDATE bill SET status_id = $soluong + $int WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
function getStatusId($id)
{
    try {
        $sql = "SELECT status_id FROM bill WHERE id = :id";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['status_id'];
    } catch (\Exception $e) {
        debug($e);
    }
}