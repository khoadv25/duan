<?php


if (!function_exists('doanhThuTheoNgay')) {
    function doanhThuTheoNgay()
    {
        try {
            $sql = "SELECT SUM(total_money) AS total
                    FROM bill
                    WHERE status_id = 5
                    AND order_date >= CURDATE() - INTERVAL 1 DAY
                    AND order_date < CURDATE()
                    GROUP BY DATE(order_date);";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


// if (!function_exists('doanhThuTheoThang')) {
//     function doanhThuTheoThang()
//     {
//         try {
//             $sql = "SELECT YEAR(order_date) AS year, MONTH(order_date) AS month, SUM(total_money) AS total
//                     FROM bill
//                     WHERE status_id = 5
//                     AND YEAR(order_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
//                     AND MONTH(order_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
//                     GROUP BY YEAR(order_date), MONTH(order_date)";

//             $stmt = $GLOBALS['conn']->prepare($sql);
//             $stmt->execute();
            
//             return $stmt->fetchAll(PDO::FETCH_ASSOC);
//         } catch (\Exception $e) {
//             debug($e);
//         }
//     }
// }


if (!function_exists('doanhThuTheoThang')) {
    function doanhThuTheoThang()
    {
        try {
            $sql = "SELECT YEAR(order_date) AS year, MONTH(order_date) AS month, SUM(total_money) AS total
                    FROM bill
                    WHERE status_id = 5
                    AND order_date >= DATE_FORMAT(NOW(), '%Y-%m-01')
                    GROUP BY YEAR(order_date), MONTH(order_date)";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('tongUser')) {
    function tongUser()
    {
        try {
            $sql = "SELECT COUNT(id) AS total_users
                    FROM users";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result['total_users'])) {
                return $result['total_users'];
            } else {
                return 0; // Trả về 0 nếu không có bản ghi nào được tìm thấy
            }
        } catch (\Exception $e) {
            debug($e);
            return 0; // Trả về 0 nếu có lỗi xảy ra
        }
    }
}



if (!function_exists('tongBill')) {
    function tongBill()
    {
        try {
            $sql = "SELECT COUNT(id) AS total_bill
                    FROM bill";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result['total_bill'])) {
                return $result['total_bill'];
            } else {
                return 0; // Trả về 0 nếu không có bản ghi nào được tìm thấy
            }
        } catch (\Exception $e) {
            debug($e);
            return 0; // Trả về 0 nếu có lỗi xảy ra
        }
    }
}


if (!function_exists('donHangChoSuLi')) {
    function donHangChoSuLi()
    {
        try {
            $sql = "SELECT COUNT(id) AS total_bills
                    FROM bill
                    WHERE status_id = 1";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result['total_bills'])) {
                return $result['total_bills'];
            } else {
                return 0; // Trả về 0 nếu không có bản ghi nào được tìm thấy
            }
        } catch (\Exception $e) {
            debug($e);
            return 0; // Trả về 0 nếu có lỗi xảy ra
        }
    }
}
