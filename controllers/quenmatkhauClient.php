<?php

use function App\YourNamespace\guiMail;

function resetPass()
{
    $view = 'client/quenMatKhau';
    

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!empty($_POST)) {
            $data = [
                'email' => $_POST['email'] ?? '',
            ];
        }
        $checkUserResetPassword = getMailResetPassword($data['email']);
       
       
        if (!empty($checkUserResetPassword)) {
            $xacNhan = randomMa();
            $_SESSION['maXacThuc'] = $xacNhan;
            $_SESSION['data'] = $data;
            $_SESSION['user'] = $checkUserResetPassword;
            guiMail($_SESSION['data']['email'], $checkUserResetPassword['fullname'], $_SESSION['maXacThuc']);

            header('Location: ' . BASE_URL . '?act=veriRessetPassword');
            exit();
        }



        // sau khi gửi mail kèm mã random trên 
        // done
        // hiển thị ô input cho người dùng nhập vào 


        header('location:' . BASE_URL . '?act=veriRessetPassword');
        exit;
        // done


        // nếu đúng mã người dùng nhập trùng với $_SESSION['maXacThuc']
        // thì sẽ bắt đầu insert vào db //
        // nếu nhập sai thì cho họ nhập lại 

    }


    require_once PATH_VIEW . 'home.php';
}



function veriResetPassword() {
    
    if (!isset($_SESSION['maXacThuc'])) {
        header('location:' . BASE_URL . '?act=resetpassword');
        exit;
    }

    $maXacThuc = $_SESSION['maXacThuc'];

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ma'])) {
        $maNhap = $_POST['ma'];
        if ($maNhap == $maXacThuc) {
            unset($_SESSION['maXacThuc']);
            unset($_SESSION['data']);
            $password = $_SESSION['user']['password']; // Giả sử mật khẩu được lưu trong $_SESSION['user']['password']
            echo "<script>alert('Mật khẩu của bạn là: " . $password . "'); window.location.href = '" . BASE_URL . "';</script>";
            exit;
        } else {
            // Mã xác thực không khớp, hiển thị thông báo lỗi và yêu cầu nhập lại
            $error = "Mã xác thực không đúng. Vui lòng nhập lại.";
        }

    }

    // Hiển thị trang xác thực với ô input cho người dùng nhập mã
    $view = 'client/veriUser';
    require_once PATH_VIEW . 'home.php';
}