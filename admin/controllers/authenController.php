<?php 

function authenShowFormLogin() {
    if (!empty($_POST)) {
        authenLogin();
    }

    require_once PATH_VIEW_ADMIN . 'authen/login.php';
}

function authenLogin() {
    $admin = getUserAdminByEmailAndPassword($_POST['email'], $_POST['password']);

    if (empty($admin)) {
        $_SESSION['error'] = 'Email hoặc password chưa đúng!';

        header('Location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    }

    $_SESSION['admin'] = $admin;

    header('Location: ' . BASE_URL_ADMIN);
    exit();
}

function authenLogout() {
    if (!empty($_SESSION['admin'])) {
        unset($_SESSION['admin']);
    }

    // header('Location: ' . BASE_URL);
    header('Location: ' . BASE_URL_ADMIN . '?act=login');

    exit();
}