<?php


// if (!function_exists('doanhThuTheoNgay')) {
//     function doanhThuTheoNgay()
//     {
//         try {
//             $sql = "SELECT SUM(total_money) AS total
//                     FROM bill
//                     WHERE status_id = 5
//                     AND order_date >= CURDATE() - INTERVAL 1 DAY
//                     AND order_date < CURDATE()
//                     GROUP BY DATE(order_date);";

//             $stmt = $GLOBALS['conn']->prepare($sql);
//             $stmt->execute();
            
//             return $stmt->fetchAll(PDO::FETCH_ASSOC);
//         } catch (\Exception $e) {
//             debug($e);
//         }
//     }
// }

if (!function_exists('doanhThuTheoNgay')) {
    function doanhThuTheoNgay()
    {
        try {
            $today = date('Y-m-d');
            $startOfDay = $today . ' 00:00:00';
            $endOfDay = $today . ' 23:59:59';

            $sql = "SELECT SUM(total_money) AS total
                    FROM bill
                    WHERE pay_date BETWEEN :startOfDay AND :endOfDay";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":startOfDay", $startOfDay);
            $stmt->bindParam(":endOfDay", $endOfDay);
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
//                     AND order_date >= DATE_FORMAT(NOW(), '%Y-%m-01')
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
            $currentMonth = date('Y-m-01');
            $nextMonth = date('Y-m-d', strtotime('first day of next month'));

            $sql = "SELECT SUM(total_money) AS total
                    FROM bill
                    WHERE pay_date >= :start_date
                    AND pay_date < :end_date";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':start_date', $currentMonth);
            $stmt->bindParam(':end_date', $nextMonth);
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



function getDonHangByDateRange($start_date, $end_date) {
    try {
        // Nếu $end_date rỗng, gán cho nó giá trị ngày hiện tại
        if (empty($end_date)) {
            $end_date = date('Y-m-d');
        }

        // Chuẩn bị truy vấn SQL để lấy các đơn hàng trong khoảng từ ngày đến ngày
        $sql = "SELECT * FROM bill WHERE pay_date BETWEEN :start_date AND :end_date";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->execute();

        // Trả về kết quả của truy vấn
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        debug($e);
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['selected_date'])) {
        $start_date = $_POST['selected_date'];
        $end_date = $_POST['selected_date_on'];
        $donHang = getDonHangByDateRange($start_date, $end_date);
    }
}




function getDoanhThuByDate($date) {
    try {
        // Lấy doanh thu cho ngày đã chọn
        $sql = "SELECT SUM(total_money) AS total
                FROM bill
                WHERE DATE(order_date) = :date";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        debug($e);
    }
}


function getDoanhThuByMonth($month, $year) {
    try {
        // Lấy doanh thu cho tháng và năm đã chọn
        $sql = "SELECT SUM(total_money) AS total
                FROM bill
                WHERE YEAR(order_date) = :year
                AND MONTH(order_date) = :month";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':month', $month);
        $stmt->bindParam(':year', $year);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        debug($e);
    }
}