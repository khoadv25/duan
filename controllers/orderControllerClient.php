<?php


function checkout()
{
    $view = 'client/checkout';
    $cate = listAll('categories');

    if (isset($_SESSION['user']['id'])) {
        $userID = $_SESSION['user']['id'];
    }
    $cartByUserID = showCartUserID($userID);
    // print_r($cartByUserID);
    require_once PATH_VIEW . 'home.php';
}


function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}


function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}




function oderTrucTiep()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tructiep'])) {
        if (isset($_SESSION['user']['id'])) {
            $userID = $_SESSION['user']['id'];
            $fullname = $_SESSION['user']['fullname'];
            $phone = $_SESSION['user']['phone'];
        }

        $cartByUserID = showCartUserID($userID);

        $date = date('Y-m-d H:i:s');

        $totalPrice = 0;

        // Lặp qua từng sản phẩm trong giỏ hàng
        foreach ($cartByUserID as $key => $value) {
            // Tính tổng số tiền cho từng sản phẩm và cộng vào tổng
            $subtotal = $value['cart_quantity'] * $value['product_price'];
            $totalPrice += $subtotal;
        }
        
        // Sử dụng hàm để tạo mã ngẫu nhiên có chứa cả chữ và số
        $maBill = generateRandomString(10);


        $data  = [
            'user_id' => $userID,
            'order_date' =>  $date ?? "",
            'Address' => $_POST['Address'] ?? "",
            'total_money' => $totalPrice ?? "",
            'status' => 1 ?? "",
            'reciver' => $_POST['fullname'] ?? $fullname,
            'payment_id' => 0 ?? "",
            'id_voucher' => 0,
            'note' => $_POST['note'] ?? "",
            'status_id' => 1 ?? "",
            'full_name' => $_POST['fullname'] ?? $fullname,
            'ma_bill' => $maBill,
            'Phone' => $_POST['Phone'] ?? $phone,
        ];

        // $billByUserCheckStatus = checkBillByUserId($userID);
        // if (isset($billByUserCheckStatus)) {
        //     $data['status_id'] = 2;
        // }

        $billID = insert('bill', $data);
        // cần làm sau khi insert thành công
        // tiến hành thêm bill_detail
        // lấy ra billid
        // lấy ra tất cả sản phẩm cart where user_id
        // tiến hành insert tất cả vào bill_detail
        // id	bill_id	 quantity	product_id
        foreach ($cartByUserID as $key => $pro) {
            $productID = $pro['product_id'];
            $quantityCartPro = $pro['cart_quantity'];




            $data2  = [
                'bill_id' => $billID,
                'quantity' => $quantityCartPro,
                'product_id' => $productID,
            ];


            insert('bill_detail', $data2);
        }


        // sau khi thêm tất cả thành công thì phải xóa cart thuộc userID đó 
        deleteCartWhereUserID('cart', $userID);

        header('Location: ' . BASE_URL . '?act=lichsudonhang');
        die;

    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payUrl'])) {

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        // Các thông tin cần thiết cho giao dịch được cấp từ momo
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_SESSION['total']; // có thể thêm $_SESSION['total'] session tạo ở checkout
        $orderId = rand(00, 9999);
        $redirectUrl = "http://localhost/duan/?act=checkttMomo"; // ?act=oder
        $ipnUrl = "http://localhost/duan/";
        $extraData = "";

        if (!empty($_POST)) {
            $partnerCode = $partnerCode;
            $accessKey = $accessKey;
            $serectkey = $secretKey;
            $orderId = $orderId;
            $orderInfo = $orderInfo;
            $amount = $amount;
            $ipnUrl = $ipnUrl;
            $redirectUrl = $redirectUrl;
            $extraData = $extraData;

            $requestId = time() . "";
            $requestType = "payWithATM";
            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");

            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            // Thực hiện yêu cầu POST đến MoMo API
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // Giải mã JSON
            ////
            // Chuyển hướng đến trang thanh toán MoMo
            header('Location: ' . $jsonResult['payUrl']);
            exit;
          
        }
        
        // Phản hồi từ MoMo
        
    }
}



function checkttMomo($resultCode){
    // $resultCode = $_GET['resultCode'];
    if ($resultCode == 0) {


        if (isset($_SESSION['user']['id'])) {
            $userID = $_SESSION['user']['id'];
            $fullname = $_SESSION['user']['fullname'];
            $phone = $_SESSION['user']['phone'];
            $address = $_SESSION['user']['address'];
        }

        $cartByUserID = showCartUserID($userID);

        $date = date('Y-m-d H:i:s');

        $totalPrice = $_SESSION['total'];
        // Sử dụng hàm để tạo mã ngẫu nhiên có chứa cả chữ và số
        $maBill = generateRandomString(10);


        $data  = [
            'user_id' => $userID,
            'order_date' =>  $date ?? "",
            'Address' => $_POST['address'] ?? $address,
            'total_money' => $totalPrice ?? "",
            'status' => 1 ?? "",
            'reciver' => $_POST['fullname'] ?? $fullname,
            'payment_id' => 2 ?? "",
            'id_voucher' => 0,
            'note' => $_POST['note'] ?? "",
            'status_id' => 1 ?? "",
            'full_name' => $_POST['fullname'] ?? $fullname,
            'ma_bill' => $maBill,
            'Phone' => $_POST['Phone'] ?? $phone,
            'pay_date' => $date ?? date('Y-m-d H:i:s'),
        ];


        $billID = insert('bill', $data);
        // cần làm sau khi insert thành công
        // tiến hành thêm bill_detail
        // lấy ra billid
        // lấy ra tất cả sản phẩm cart where user_id
        // tiến hành insert tất cả vào bill_detail
        // id	bill_id	 quantity	product_id
        foreach ($cartByUserID as $key => $pro) {
            $productID = $pro['product_id'];
            $quantityCartPro = $pro['cart_quantity'];




            $data2  = [
                'bill_id' => $billID,
                'quantity' => $quantityCartPro,
                'product_id' => $productID,
            ];


            insert('bill_detail', $data2);
        }


        // sau khi thêm tất cả thành công thì phải xóa cart thuộc userID đó 
        deleteCartWhereUserID('cart', $userID);
        if ($_SESSION['total']) {
            unset($_SESSION['total']);
        }
        header('Location: ' . BASE_URL . "?act=lichsudonhang");
        die;
    }
}
