<?php

use function App\YourNamespace\guiMail;

function register(){
    $view = 'client/register';
        
        
        if ($_SERVER['REQUEST_METHOD']== "POST") {

            if (!empty($_POST)) {
                $data = [
                    'fullname' => $_POST['fullname'] ?? '',
                    'address' => $_POST['address'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'phone' => $_POST['phone'] ?? '',
                    'password' => $_POST['password'] ?? ''
                ];
            }
            validateRegister($data);

            

            $checkUser = getMailRegister($data['email']);
            if (!empty($checkUser)) {
                $_SESSION['error'] = 'Email đã tồn tại !';
        
                header('Location: ' . BASE_URL . '?act=register');
                exit();
            }
           
           

            $data['status'] = 1;
            $data['role'] = 0;
            
           $_SESSION['data'] = $data;


           $xacNhan = randomMa();
            $_SESSION['maXacThuc'] = $xacNhan;

            guiMail($_SESSION['data']['email'],$_SESSION['data']['fullname'],$_SESSION['maXacThuc']);
            // sau khi gửi mail kèm mã random trên 
            // done
            // hiển thị ô input cho người dùng nhập vào 
            
 
            header('location:' . BASE_URL . '?act=veriUser');
            exit;
            // done


            // nếu đúng mã người dùng nhập trùng với $_SESSION['maXacThuc']
            // thì sẽ bắt đầu insert vào db //
            // nếu nhập sai thì cho họ nhập lại 
            
        }
        
       
    require_once PATH_VIEW . 'home.php';
    
}



function randomMa() {
    // Tạo một mã xác thực ngẫu nhiên 6 chữ số
    return mt_rand(100000, 999999);
}

function veriUser() {
    
    if (!isset($_SESSION['maXacThuc'])) {
        header('location:' . BASE_URL . '?act=register');
        exit;
    }

    $maXacThuc = $_SESSION['maXacThuc'];

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ma'])) {
        $maNhap = $_POST['ma'];
        if ($maNhap == $maXacThuc) {
            $userId = insert('users', $_SESSION['data']);
            $_SESSION['user'] = $_SESSION['data'];
            $_SESSION['user']['id'] = $userId;
            unset($_SESSION['maXacThuc']);
            unset($_SESSION['data']);
            echo "<script>alert('Đăng ký thành công!'); window.location.href = '" . BASE_URL . "';</script>";
            // header('Location: ' . BASE_URL . '?act=client');
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




function validateRegister($data){
    $errors = []; // Mảng chứa thông báo lỗi

    // Kiểm tra trường Full Name
    if (empty($_POST['fullname'])) {
        $errors['fullname'] = 'Vui lòng nhập họ và tên.';
    }

    // Kiểm tra trường Address  
    if (empty($_POST['address'])) {
        $errors['address'] = 'Vui lòng nhập địa chỉ của bạn.';
    }

    // Kiểm tra trường Email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Vui lòng nhập địa chỉ email.';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Địa chỉ email không hợp lệ.';
    }

    // Kiểm tra trường Phone
    if (empty($_POST['phone'])) {
        $errors['phone'] = 'Vui lòng nhập số điện thoại.';
    } elseif (!preg_match('/^[0-9]{10}$/', $_POST['phone'])) {
        $errors['phone'] = 'Số điện thoại không hợp lệ.';
    }

    // Kiểm tra trường Password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Vui lòng nhập mật khẩu.';
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = 'Mật khẩu phải chứa ít nhất 6 ký tự.';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL . '?act=register');
        exit();
    }

    return $errors;
}

