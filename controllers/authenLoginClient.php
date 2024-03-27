<?php 

function authenShowFormLoginClient() {
    if (!empty($_POST)) {
        authenLoginClient();
    }
    $view = 'client/login';
    require_once PATH_VIEW . 'home.php';
}

function authenLoginClient() {
    $user = getUserClientByEmailAndPassword($_POST['email'], $_POST['password']);

    if (empty($user)) {
        $_SESSION['error'] = 'Email hoặc password chưa đúng!';

        header('Location: ' . BASE_URL . '?act=login');
        exit();
    }

    $_SESSION['user'] = $user;
    
    $act = $_GET['act'] ?? '/';
    $authenRoute = [
        'cart',
        // Thêm các tên đường dẫn mà người dùng được phép truy cập khi đã đăng nhập thành công
    ];

    middleware_auth_check_client($act, $authenRoute);

    // Nếu không cần chuyển hướng, chuyển hướng đến trang chính
    header('Location: ' . BASE_URL);
    exit();
}

function authenLogoutUser() {
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    // header('Location: ' . BASE_URL);
    header('Location: ' . BASE_URL . '?act=login');

    exit();
}